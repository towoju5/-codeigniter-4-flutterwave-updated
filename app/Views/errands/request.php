<?php namespace App\Controllers;

use App\Models\Deposit;
use App\Models\Payment;
use App\Models\Plans;
use App\Models\UserModel;
use App\Controllers\CI_Email as CI_Email;
// use CodeIgniter\Email\Email;
use App\Models\MPlans;

class Admin extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $data       =   [
            'title'     =>  'User Dashboard',
            'wall_bal'  =>  $db->query("SELECT * FROM accounts ")->getRow(),
            'title' =>  'PageTitle',
            'page'  =>  'dashboard',
            'tranx' =>  $this->deposit->findAll(8),
            'deposit'   =>  $this->my_plans->where('status', 0)->findAll(5),
            'withdraw'  =>  $this->deposit->where('type', 'withdraw')->where('status', 0)->findAll(5),
            'users'     =>  $this->users->findAll(),
            't_wal_bal' =>  $this->wallet_balance,
            't_total'   =>  $this->depo,
            'w_total'   =>  $this->withd
        ];
        
        if($this->request->getPost('amount') && $this->request->getPost('mod_type'))
        {
            // Modify User Balance
            $amount     =   filter_var($this->request->getPost('amount'), FILTER_SANITIZE_STRING);
            $user_id    =   filter_var($this->request->getPost('user'), FILTER_SANITIZE_STRING);
            $mod_type   =   filter_var($this->request->getPost('mod_type'), FILTER_SANITIZE_STRING);
            $user_email =   $this->users->where('id', $user_id)->first();

            if($mod_type == 'deposit')
            {
                //Increase user balance
                
                (new CI_Email())->deposit_notif($user_email['email']);  // $i = Send_mail::deposit_notif($user_id);
                

                $_db = $this->account->set('wallet_bal', "wallet_bal+" . $amount, FALSE)->where('user_id', $user_id)->update();
                return redirect()->back()->with('success', 'Deposit Successfully processed');
            } elseif($mod_type == 'withdraw'){
                // Charged User Negatively
                (new CI_Email())->withdrawal_notif($user_email['email']);   // $i = Send_mail::deposit_notif($user_id);
                $_db = $this->account->set('wallet_bal', "wallet_bal-" . $amount, FALSE)->where('user_id', $user_id)->update();
                return redirect()->back()->with('success', 'Withdrawal Successfully processed');
            } else {
                return redirect()->back()->with('error', 'Invalid action type selected');
            }
        }

        if($this->request->getPost('name') && $this->request->getPost('method'))
        {
            // Create New Payment Type for user deposit.
            return redirect()->back()->with('error', 'Please use the payment settings page');
        }
        return view('admin/inc', $data);
    }
    
    public function users($id = null)
    {
        $data = [
            'title' =>  'All Uses',
            'page'  =>  'users',
            'users' =>  $this->users->findAll()
        ];
        
        // $del = $this->users->where('id', $id)->delete();
        
        // if($del){
        //  return redirect()->back()->with('success', 'Users Removed Successfully');
        // } else {
        //  return redirect()->back()->with('success', 'Failed to remove user');
        // }
        return view('admin/inc', $data);
    }
    
    public function deposit()
    {
        $model = new MPlans();
        $data = [
            'title' =>  'Pending Deposit',
            'page'  =>  'deposit',
            'deposit'   => $this->deposit->where('status', 0)->where('type', 'deposit')->findAll(),
            'depo'      => $this->deposit->where('type', 'deposit')->findAll(),
            'plans'     =>  $model->findAll()
        ];

        if($this->request->getPost('action') == 'delete'){
            // Delete Deposit -> using soft delete // 
            $deposit_id = $this->request->getPost('id');
            // $resp = $this->my_plans->delete(['id' => $deposit_id]);
            $model = new Deposit();
            if($this->my_plans->delete(['id' => $deposit_id])){
                return redirect()->back()->with('success', 'Deleted Successfully');
            } else {
                return redirect()->back()->with('error', 'We hit a snag Please try again later');
            }
        } elseif($this->request->getPost('action') == 'approve'){
            // Approve Deposit
            $deposit_id = $this->request->getVar('id');
            $user_email = $this->request->getVar('email');
            $user_id    = $this->request->getVar('user_id');
            $amount     = $this->request->getVar('amount');
            
            if($this->my_plans->set('status', 1)->where('id', $deposit_id)->update()){
                $_db = $this->account->set('wallet_bal', "wallet_bal+" . $amount, FALSE)->where('user_id', $user_id)->update();

                $resp_email = $this->findUser($user_id);
                (new CI_Email())->deposit_notif($user_email);   // $i = Send_mail::deposit_notif($user_id);
                return redirect()->back()->with('success', 'Updated Successfully');
            } else {
                return redirect()->back()->with('error', 'We hit a snag Please try again later');
            }
        }
        return view('admin/inc', $data);
    }
    
    public function withdrawal()
    {
        $data = [
            'title' =>  'PageTitle',
            'page'  =>  'withdraw',
            'iwithdraw' =>  $this->deposit->where('type', 'withdraw')->where('status', 0)->findAll(),
            'withdraw'  =>  $this->deposit->where('type', 'withdraw')->findAll()
        ];

        if($this->request->getPost('action') == 'delete'){
            // Delete Deposit -> using soft delete // 
            $deposit_id = $this->request->getPost('id');
            $user_id    = $this->request->getVar('user_id');
            
            $model = new Deposit();
            if($model->delete($deposit_id)){
                return redirect()->back()->with('success', 'Deleted Successfully');
            } else {
                return redirect()->back()->with('error', 'We hit a snag Please try again later');
            }
        } elseif($this->request->getPost('action') == 'approve'){
            // Approve Deposit
            $deposit_id = $this->request->getPost('id');

            $resp_email = $this->findUser($user_id);
            (new CI_Email())->withdrawal_notif($user_email['email']);   // $i = Send_mail::deposit_notif($user_id);
            if($this->deposit->set('status', "1")->where('id', $deposit_id)->update()){
                return redirect()->back()->with('success', 'Updated Successfully');
            } else {
                return redirect()->back()->with('error', 'We hit a snag Please try again later');
            }
        }
        return view('admin/inc', $data);
    }
    
    public function profile()
    {
        $data = [
            'title' =>  'My Account',
            'page'  =>  'profile',
            'profile'=> $this->users->where('id', $this->user_id)->first()
        ];
        
        if($this->request->getPost('password') != null )
        {
            if($this->request->getPost('password') == $this->request->getPost('passconf'))
            {
                // get the inputted password and update it.
                $idata  =   [
                    'password' => $this->request->getPost('password')     
               ];
               
               if($this->users->where('id', $this->user_id)->set($idata)->update()){
                   return redirect()->back()->with('success', 'Password updated successfully');
               } else {
                   return redirect()->back()->with('success', 'Password update failed.');
               }
            } else {
                return redirect()->back()->with('success', 'Password does not match.');
            }
        }
        
        if($this->request->getPost('address') != null)
        {
            $idata  =   [
                'address'   =>  $this->request->getVar('address'),
                'addres_s'  =>  $this->request->getVar('addres'),
                'country'   =>  $this->request->getVar('country'),
                'state'     =>  $this->request->getVar('state'),
                'city'      =>  $this->request->getVar('city'),
                'zip_code'  =>  $this->request->getVar('zip')
          ];
          // Update user inforations
          if($this->users->where('id', $this->user_id)->set($idata)->update()){
               return redirect()->back()->with('success', 'Profile updated successfully');
           } else {
               return redirect()->back()->with('success', 'Profile update failed.');
           }
        }
        return view('admin/inc', $data);
    }
    
    public function settings()
    {
        $data = [
            'title' =>  'System Settings',
            'page'  =>  'settings',
            'set'   =>  $this->db->query("SELECT * FROM settings WHERE id=1")->getRow(),
        ];
        if($this->request->getMethod() == 'post')
        {
            // Update System settings. => Address, Email & Phone Number //
            $email      =   $this->request->getPost('email');
            $name       =   $this->request->getPost('name');
            $phone      =   $this->request->getPost('phone');
            $address    =   $this->request->getPost('address');
            $idata = [
                'email'     =>  $email,
                'name'      =>  $name,
                'phone'     =>  $phone,
                'address'   =>  $address
            ];
            if($this->settings->set($idata)->where('id', 1)->update()){
                return redirect()->back()->with('success', 'Updated Successfully');
            } else {
                return redirect()->back()->with('error', 'We hit a snag Please try again later');
            }
        }
        return view('admin/inc', $data);
    }
    
    public function payments()
    {
        $model = new Payment();
        $data = [
            'title' =>  'Payments Settings',
            'page'  =>  'payment',
            'pay'   =>  $model->findAll(),
        ];
        if($this->request->getPost('name') && $this->request->getPost('payment') )
        {
            // Update System settings. => Address, Email & Phone Number //
            $name           =   $this->request->getVar('name');
            $payment        =   $this->request->getVar('payment');
            $idata = [
                'name'          =>  $name,
                'payment'       =>  $payment,
            ];
            if($this->payments->insert($idata)){
                return redirect()->back()->with('success', 'Added Successfully');
            } else {
                return redirect()->back()->with('error', 'We hit a snag Please try again later');
            }
        }

        if($this->request->getPost('action') === 'delete')
        {
            $del_id =   $this->request->getPost('id');
            
            if($model->delete($del_id)){
                return redirect()->back()->with('success', 'Deleted Successfully');
            } else {
                return redirect()->back()->with('error', 'We hit a snag Please try again later');
            }
        }

        if($this->request->getPost('action') === 'ban')
        {
            $del_id =   $this->request->getPost('id');
            
            if($model->set(['status' => 0])->where('id', $del_id)->update()){
                return redirect()->back()->with('success', 'Gateway Disabled');
            } else {
                return redirect()->back()->with('error', 'We hit a snag Please try again later');
            }
        }

        if($this->request->getPost('action') === 'enable')
        {
            $del_id =   $this->request->getPost('id');
            
            if($model->set(['status' => 1])->where('id', $del_id)->update()){
                return redirect()->back()->with('success', 'Gateway Enabled');
            } else {
                return redirect()->back()->with('error', 'We hit a snag Please try again later');
            }
        }
        return view('admin/inc', $data);
    }
    
    public function plans()
    {
        $model = new Plans();
        $data = [
            'title' =>  'Investment Plans',
            'page'  =>  'plans',
            'plans' =>  $model->findAll(),
        ];
        
        if($this->request->getPost('name') && $this->request->getPost('max_deposit') )
        {
            // Update System settings. => Address, Email & Phone Number //
            $name           =   $this->request->getVar('name');
            $min_deposit    =   $this->request->getVar('min_deposit');
            $max_deposit    =   $this->request->getVar('max_deposit');
            $min_return     =   $this->request->getVar('min_return');
            $max_return     =   $this->request->getVar('max_return');
            $bonus          =   $this->request->getVar('bonus');
            $duration       =   $this->request->getVar('duration');
            $price          =   $this->request->getVar('price');

            $idata = [
                'min_deposit'   => $min_deposit, 
                'max_deposit'   => $max_deposit, 
                'min_return'    => $min_return, 
                'max_return'    => $max_return, 
                'bonus'         => $bonus, 
                'duration'      => $duration, 
                'name'          => $name, 
                'price'         => $price, 
            ];
            if($model->insert($idata)){
                return redirect()->back()->with('success', 'Added Successfully');
            } else {
                return redirect()->back()->with('error', 'We hit a snag Please try again later');
            }
        }

        if($this->request->getPost('action') === 'delete')
        {
            $del_id =   $this->request->getPost('id');
            
            if($model->delete($del_id)){
                return redirect()->back()->with('success', 'Deleted Successfully');
            } else {
                return redirect()->back()->with('error', 'We hit a snag Please try again later');
            }
        }

        return view('admin/inc', $data);
    }
    
    function email()
    {
        $data = [
            'title' =>  'Email Configuration',
            'page'  =>  'email',
            'email' =>  $this->send_email->where('id', 1)->first()
        ];
        // Email settings
        if($this->request->getMethod() == 'post')
        {
            $new_user_notif         =   $this->request->getPost('new_user_notif');
            $login_alert            =   $this->request->getPost('login_alert');
            $psw_reset              =   $this->request->getPost('psw_reset');
            $withdrawal_notif       =   $this->request->getPost('withdrawal_notif');
            $deposit_notif          =   $this->request->getPost('deposit_notif');
            $withdrawal_approved    =   $this->request->getPost('withdrawal_approved');
            $deposit_approve        =   $this->request->getPost('deposit_approve');
            
            $mail = [
                'new_user_notif'        =>  $new_user_notif,
                'login_alert'           =>  $login_alert, 
                'psw_reset'             =>  $psw_reset,
                'withdrawal_notif'      =>  $withdrawal_notif,
                'deposit_notif'         =>  $deposit_notif,
                'withdrawal_approved'   =>  $withdrawal_approved,
                'deposit_approve'       =>  $deposit_approve,
            ];
            
            $resp   =   $this->send_email->where('id', 1)->set($mail)->update();
            
            if($resp){
                return redirect()->back()->with('success', 'Email Message Updated Successfully');
            } else {
                return redirect()->back()->with('error', 'We hit a snag Please try again later');
            }
        }
        
        return view('admin/inc', $data);
        
    }

    function findUser($id)
    {
        // Get user id and pass to find user function 
        // Accessible via $resp_email = $this->findUser();
        $resp = $this->users->find($id);
        return $resp['email'];
    }
    //--------------------------------------------------------------------

}
        