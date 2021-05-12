<?php

namespace App\Controllers;

class Cargo extends BaseController
{
    public function request()
    {
        $data = [
            'title' => 'Request Cargo Delivery',
            'page'  =>  'request',
        ];
        return view('cargo/main', $data);
    }

    public function pickup()
    {
        $data = [
            'title' => 'Our Pick-Up Centers',
            'page'  =>  'pickup',
            'centers'   =>  $this->pickup->findAll(),
        ];
        return view('cargo/main', $data);
    }

    public function orders()
    {
        $data = [
            'title' => 'My Orders',
            'page'  =>  'orders',
            'orders' =>  $this->cargo->where('user_id', user_id())->findAll()
        ];
        return view('cargo/main', $data);
    }

    public function calculator()
    {
        $data = [
            'title' => 'Channels',
            'page'  =>  'calculator',
        ];

        if($this->request->getMethod() == 'post')
        {
        	$cargo_weight 	=	$this->request->getPost('cargo_weight');
        	$cargo_value 	=	$this->request->getPost('cargo_value');
        	$delivery_state	=	$this->request->getPost('delivery_state');
            $handling_fee   =   $this->cal->handling_fee($cargo_weight);
            $delivery_fee   =   $this->cal->delivery_fee($cargo_weight);
            $waybill        =   $this->cal->waybill($cargo_weight, $delivery_state);
            $i_price        =   $waybill + $delivery_fee + $handling_fee;

            // VAT Calculation 7.5% 
            $percentage = 7.5;
            $vat = ($percentage / 100) * $i_price;

            // Insurance fee calculation 1%
            $insuranceP = 1;
            $insurance = ($insuranceP / 100) * $cargo_value;

            // Total Payable price by the customer.

            $price          =   $waybill + $delivery_fee + $handling_fee + $insurance + $vat;

            $data['price']	=	$price;
            $data['vat']	=	$vat;
            $data['insur']	=	$insurance;
            $data['delivery_state']	=	$delivery_state;

        }
        return view('cargo/main', $data);
    }

    function dashboard()
    {
        $data = [
            'title' => 'Dashboard',
            'page'  =>  'dashboard',
        ];
        return view('cargo/main', $data);
    }

    function check_date($future_date)
    {
        $today_date = date('dd/mm/yyyy');
        $current_date = strtotime($today_date);
        $future_date = strtotime($future_date); //retrieved from user's input

        // check which is greater

        if ($current_date < $future_date) {
            //show the user that they have selected a date in the future.
            $result = "future";
            return $result;
        } elseif ($current_date == $future_date) {
            //show the user that they have selected a date in the past.
            $result = "today";
            return $result;
        } else {
            //show the user that they have selected a date in the past.
            $result = "past";
            return $result;
        }
    }

    function pending_arrival()
    {
        $data = [
            'title' => 'Cargo Pending Arrival',
            'page'  =>  'pending_arrival',
        ];

        
        if ($this->request->getMethod() == 'post') {
            $arrival_date       =   $this->request->getPost('arrival_date');
            $cargo_state        =   $this->request->getPost('cargo_state');
            $cargo_name         =   $this->request->getPost('cargo_name');
            $cargo_location     =   $this->request->getPost('cargo_location');
            $cargo_content      =   $this->request->getPost('cargo_content');
            $cargo_numbers      =   $this->request->getPost('cargo_numbers');
            $cargo_weight       =   $this->request->getPost('cargo_weight');
            $cargo_value        =   $this->request->getPost('cargo_value');
            $delivery_state     =   $this->request->getPost('state');
            $delivery_lga       =   $this->request->getPost('lga');
            $delivery_town      =   $this->request->getPost('delivery_town');
            $phone              =   $this->request->getPost('phone');
            $delivery_type      =   $this->request->getPost('delivery_type');
            // $cargo_state   =   $this->request->getPost('cargo_state');
            $handling_fee   =   $this->cal->handling_fee($cargo_weight);
            $delivery_fee   =   $this->cal->delivery_fee($cargo_weight);
            $waybill        =   $this->cal->waybill($cargo_weight, $delivery_state);
            $i_price          =   $waybill + $delivery_fee + $handling_fee;

            // VAT Calculation 7.5%
            $percentage = 7.5;
            $vat = ($percentage / 100) * $i_price;

            // Insurance fee calculation 1%
            $insuranceP = 1;
            $insurance = ($insuranceP / 100) * $cargo_value;

            // Total Payable price by the customer.

            $price          =   $waybill + $delivery_fee + $handling_fee + $insurance + $vat;

            $idata = [
                'user_id'          =>      $this->user_id,
                'asap_type'        =>      'cargo',
                'cargo_state'      =>      $cargo_state,
                'cargo_name'       =>      $cargo_name,
                'cargo_location'   =>      $cargo_location,
                'cargo_content'    =>      $cargo_content,
                'cargo_numbers'    =>      $cargo_numbers,
                'cargo_weight'     =>      $cargo_weight,
                'cargo_value'      =>      $cargo_value,
                'delivery_state'   =>      $delivery_state,
                'delivery_lga'     =>      $delivery_lga,
                'delivery_town'    =>      $delivery_town,
                'phone'            =>      $phone,
                'delivery_type'    =>      $delivery_type,
                'price'            =>      $price,
                'insurance'        =>      $insurance,
                'arrival_date'     =>      $arrival_date,
                'vat'              =>      $vat,
                'cargo_model'      =>      'pending_arrival'
            ];

            $resp = $this->cargo->insert($idata);
            if($resp){
                session()->setFlashdata('success', 'Cargo PickUp Added Successfully');
                return redirect()->to(base_url("cargo/payment/$resp"));
            } else {
                session()->setFlashdata('error', 'Failed, Please Retry');
                return redirect()->back();
            }
        }

        return view('cargo/main', $data);
    }

    /*
     *  Controller for Request Cargo and store in warehouse
     *  @params: 
     */
    function warehouse_store()
    {
        $data = [
            'title' => 'Pick & Store Cargo',
            'page'  =>  'warehouse_store',
        ];

        if ($this->request->getMethod() == 'post') {
            $arrival_date       =   $this->request->getPost('arrival_date');
            $cargo_name         =   $this->request->getPost('cargo_name');
            $cargo_location     =   $this->request->getPost('cargo_location');
            $delivery_state     =   $this->request->getPost('delivery_state'); // same as state to keep the cargo item.
            $cargo_content      =   $this->request->getPost('cargo_content');
            $cargo_numbers      =   $this->request->getPost('cargo_numbers');
            $cargo_weight       =   $this->request->getPost('cargo_weight');
            $cargo_value        =   $this->request->getPost('cargo_value');
            $phone              =   $this->request->getPost('phone');

        
            // calculate vat by calling $this->vat(); with required @params// $cargo_state   =   $this->request->getPost('cargo_state');
            $handling_fee	=	$this->store->handling_fee($cargo_weight);
            $delivery_fee	=	$this->store->delivery_fee($cargo_weight);
            $waybill		=	$this->store->waybill($cargo_weight, $delivery_state);
            $i_price        =   $waybill + $delivery_fee + $handling_fee;

            // VAT Calculation 7.5%
            $percentage = 7.5;
            $vat = ($percentage / 100) * $i_price;

            // Insurance fee calculation 1%
            $insuranceP = 1;
            $insurance = ($insuranceP / 100) * $cargo_value;

            // Total Payable price by the customer.

            $price          =   $waybill + $delivery_fee + $handling_fee + $insurance + $vat;

            if($this->user_id == null || !isset($this->user_id)){
                $this->user_id = 0;
            }

            $idata = [
                'user_id'          =>      $this->user_id,
                'asap_type'        =>      'cargo',
                'cargo_name'       =>      $cargo_name,
                'cargo_location'   =>      $cargo_location,
                'cargo_content'    =>      $cargo_content,
                'cargo_numbers'    =>      $cargo_numbers,
                'cargo_weight'     =>      $cargo_weight,
                'cargo_value'      =>      $cargo_value,
                'phone'            =>      $phone,
                'price'            =>      $price,
                'insurance'        =>      $insurance,
                'vat'              =>      $vat,
                'cargo_model'      =>      'warehouse_store'
            ];

            $resp = $this->cargo->insert($idata);
            if($resp){
                session()->setFlashdata('success', 'Cargo PickUp Added Successfully');
                return redirect()->to(base_url("cargo/payment/$resp"));
            } else {
                session()->setFlashdata('error', 'Failed, Please Retry');
                return redirect()->to(base_url(cargo/request/warehouse_store));
            }

            // If we are sending SMS or & email. then code goes here with a call to SMS Model.
        }

        return view('cargo/main', $data);
    }

    function has_arrived()
    {
        $data = [
            'title' => 'Pick & Send Cargo',
            'page'  =>  'has_arrived',
        ];

        if ($this->request->getMethod() == 'post') {
            $cargo_state        =   $this->request->getPost('cargo_state');
            $cargo_name         =   $this->request->getPost('cargo_name');
            $cargo_location     =   $this->request->getPost('cargo_location');
            $cargo_content      =   $this->request->getPost('cargo_content');
            $cargo_numbers      =   $this->request->getPost('cargo_numbers');
            $cargo_weight       =   $this->request->getPost('cargo_weight');
            $cargo_value        =   $this->request->getPost('cargo_value');
            $delivery_state     =   $this->request->getPost('state');
            $delivery_lga       =   $this->request->getPost('lga');
            $delivery_town      =   $this->request->getPost('delivery_town');
            $phone              =   $this->request->getPost('phone');
            $delivery_type      =   $this->request->getPost('delivery_type');
            // $cargo_state   =   $this->request->getPost('cargo_state');
            $handling_fee	=	$this->cal->handling_fee($cargo_weight);
            $delivery_fee	=	$this->cal->delivery_fee($cargo_weight);
            $waybill		=	$this->cal->waybill($cargo_weight, $delivery_state);
            $i_price          =   $waybill + $delivery_fee + $handling_fee;

            // VAT Calculation 7.5%
            $percentage = 7.5;
            $vat = ($percentage / 100) * $i_price;

            // Insurance fee calculation 1%
            $insuranceP = 1;
            $insurance = ($insuranceP / 100) * $cargo_value;

            // Total Payable price by the customer.

            $price          =   $waybill + $delivery_fee + $handling_fee + $insurance + $vat;

            $idata = [
                'user_id'          =>      $this->user_id,
                'asap_type'        =>      'cargo',
                'cargo_state'      =>      $cargo_state,
                'cargo_name'       =>      $cargo_name,
                'cargo_location'   =>      $cargo_location,
                'cargo_content'    =>      $cargo_content,
                'cargo_numbers'    =>      $cargo_numbers,
                'cargo_weight'     =>      $cargo_weight,
                'cargo_value'      =>      $cargo_value,
                'delivery_state'   =>      $delivery_state,
                'delivery_lga'     =>      $delivery_lga,
                'delivery_town'    =>      $delivery_town,
                'phone'            =>      $phone,
                'delivery_type'    =>      $delivery_type,
                'price'            =>      $price,
                'insurance'        =>      $insurance,
                'vat'              =>      $vat,
                'cargo_model'      =>      'has_arrived'
            ];

            $resp = $this->cargo->insert($idata);
            if($resp){
                session()->setFlashdata('success', 'Cargo PickUp Added Successfully');
                return redirect()->to(base_url("cargo/payment/$resp"));
            } else {
                session()->setFlashdata('error', 'Failed, Please Retry');
                return redirect()->back();
            }
        }
        return view('cargo/main', $data);
    }

    function payment()
    {
		$this->uri  = 	service('uri');
        // Make payment for selected Cargo. Pull detals from ::DB
        $id    =   $this->uri->getSegment(3);
        $data = [
            'title' =>  'Make Payment',
            'page'  =>  'payment',
            'paystack_public'   =>  $this->paystack_pub,
            'item'  =>  $this->cargo->where('id', $id)->where('user_id', $this->user_id)->first()
        ];
        // create needed data for payment ::Flutterwave && ::Paystack
        if($this->request->getMethod() == 'post'){
            $order_id   =   $this->request->getVar('order_id');
            $address    =   $this->request->getVar('address');
            $item       =   $this->cargo->where('id', $order_id)->where('user_id', user_id())->first();
            
            $email      =   user()->email;
            $item_id    =   $item['id'];
            $price      =   $item['price'];

            $pay_data = [
                "email" => "<?= $email ?>",
                "amount" => "<?= $price ?>",
                'callback_url'  =>  base_url('payment/verify/paystack'),
                'redirect_url'  =>  base_url('payment/verify/rave'),
                'reference' =>  "DELIVERASAP".uniqid(rand(), true),
                'tx_ref' =>  "DELIVERASAP".uniqid(rand(), true),
                'metadata'  =>  [
                    'order_id'  =>  "<?= $order_id ?>",
                    'delivery_address'  =>  "<?= $address ?>"
                ],
                'channels'  =>  ['card', 'bank', 'ussd', 'qr', 'mobile_money', 'bank_transfer'],
            ];
        }

        if($this->request->getPost('gateway') == 'rave'){
            $data   =     [
                    'tx_ref' => "DELIVERASAP".uniqid(rand(), true),
                    'amount' => '100',
                    'currency' => 'NGN',
                    'redirect_url' => 'https://webhook.site/9d0b00ba-9a69-44fa-a43d-a82c33c36fdc',
                    'payment_options' => 'card',
                    'meta' => [
                    'consumer_id' => 23,
                    'consumer_mac' => '92a3-912ba-1192a',
                ],
                'customer' => [
                    'email' => 'user@gmail.com',
                    'phonenumber' => '080****4528',
                    'name' => 'Yemi Desola',
                ],
                'customizations' => [
                    'title' => 'Pied Piper Payments',
                    'description' => 'Middleout isn\'t free. Pay the price',
                    'logo' => 'https://assets.piedpiper.com/logo.png',
                ],
            ];
            $resp = $this->cal->rave($pay_data);
            print_r($resp);

            if($resp['status'] === "success"){
                return redirect()->to($resp['data']['link']);
            }
        }

        if($this->request->getPost('gateway') == 'paystack'){
            // $this->cal->paystack($pay_data, $this->paystack_pub);
            $url = "https://api.paystack.co/transaction/initialize";
            
            $fields_string = http_build_query($pay_data);
            //open connection
            $ch = curl_init();
            
            //set the url, number of POST vars, POST data
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_POST, true);
            curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($pay_data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Authorization: Bearer pk_test_63e447556cf922cf45d8a226e7fc56321078aa3c",
                "User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36",
                "Cache-Control: no-cache",
            ));
            
            //So that curl_exec returns the contents of the cURL; rather than echoing it
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
            
            //execute post
            $result = curl_exec($ch);
            echo $result;
            }
        return view('cargo/main',$data);
    }
}
