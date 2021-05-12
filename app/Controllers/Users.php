<?php namespace App\Controllers;

use App\ThirdParty\endroid\src\QrCode;


class Users extends BaseController
{
	public function index()
	{
		return view('welcome_message');
    }
    
	public function profile()
	{
		$data = [
            'title' => 'My Profile',
            'page'  =>  'profile'
        ];
        return view('gen/main', $data);
	}
    
	public function test()
	{
		$data = [
            'title' => 'Blank Page',
            'page'  =>  'blank'
        ];
        return view('inc/main', $data);
    }
    
	public function reports()
	{
		$data = [
            'title' => 'My Reports',
            'page'  =>  'reports',
            'history'   =>  $this->history->findAll()
        ];
        return view('gen/main', $data);
    }
    
    function settings()
    {
        //Users settings, profile, API key, change password & otheres
        
        $data = [
            'title' => 'Settings',
            'page'  => 'settings'
        ];

        return view('gen/main', $data);
    }
    
	public function bills()
	{
		$data = [
            'title' => 'My Bills',
            'page'  =>  'bills'
        ];
        return view('gen/main', $data);
    }
    
	public function waybill($slug = null)
	{
		$data = [
            'title' => 'Generate WayBills',
            'page'  =>  'waybill'
        ]; 
        // $url = "bills";
        // $qrCode = new QrCode(base_url("track/$url"));
        // header('Content-Type: '.$qrCode->getContentType());
        // $data['xo'] = $qrCode->writeString();

        if ($slug) {
            

            // $qrCode = new QrCode(base_url("track/$url"));
            // header('Content-Type: '.$qrCode->getContentType());
            // echo $qrCode->writeString();
        }

        return view('gen/main', $data);
    }
    
	public function help()
	{
		$data = [
            'title' =>  'Help & Supports',
            'page'  =>  'help',
            'faqs'  =>  $this->faqs->findAll()
        ];
        return view('gen/main', $data);
    }

    function env($incoming)
    {
        if($incoming){
            $data = [
                'uri' => $incoming
            ];
            session()->set($data);
            return redirect()->to(base_url("dashboard/$incoming"));
        }
    }

    function verify_paystack()
    {
        // Verify User Payment and update Payment Status
        $curl = curl_init();
        $ref = $_GET['ref'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$ref",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer $this->paystack_sec",
            "Cache-Control: no-cache",
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
            return redirect()->back()->with('error', "Payment Failed, please try again later");
        } else {
            // Record date in ::DB -> Just change order payment_status to 1 //
            // echo $response;
            // $resp   =   json_decode($response, true);
            // $ref    =   $resp['data']['reference'];
            print_r(user_id());
            // $this->twillo(user()->name, $ref);
            // return redirect()->to(base_url('bills'))->with('success', "Thanks, your Payment has been received successfully");
        }
    }

    function verify_flutterwave()
    {
        //FlutterWave Payment verification
    }

    function twillo($name,$order_id)
    {
        
        $name = "Nameless";
        $date = date('d/m/Y H:i:s');
        $order_id = "DELIVERASAP90398";

        $conversation = $this->twilio->messages 
                            ->create("whatsapp:+19203751431", // to 
                 array( 
                     "from" => "whatsapp:+14155238886",       
                     "body" => "Hi $name, thanks for your order with reference $order_id placed on $date. Your order has shipped. You can get a tracking update any time by replying TRACK." 
                 ) 
        ); 

        print($conversation->sid);

        if ($conversation) {
            session()->setFlashdata('success','Sent Successfully');
            return redirect()->to(base_url('cargo/dashboard'));
        } else {
            session()->setFlashdata('error','Oops we hit a snag');
            echo "Oops we hit a snag";
        }
    }
}