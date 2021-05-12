<?php namespace App\Controllers;

// use App\Models\UserModel;
// use App\Models\CatModel;

class Home extends BaseController
{
	public function index()
	{
		helper(['form']);
		$data   =   [
            'title' =>  'Welcome to DeliverASAP',
		];
		
		return view('index', $data);
		
	}

	public function login()
	{
		$this->logged();
		helper(['form']);
        $data   =   [];

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|valid_email',
                'password'  => 'required|min_length[3]|max_length[$weight]|ValidateUser[eamil,password]'
            ];

            $errors =   [
                'password'  =>  [
                    'ValidateUser'  =>  'Email or Password is incorrect!'
                ]
			];
			
            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
                echo "<script>alert('User Loggin Failed')</script>";
            } else {
                //Confirm user credentials and Start a Session//
                $model = $this->user;
				
				$user = $model->where('email', $this->request->getVar('email'))->first();
				$this->setUserSession($user);

				session()->setFlashdata('success', 'Login Successful...');
                return redirect()->to(base_url('dashboard'));

            }
		}
		return view('u/login', $data);
	}
	
	private function setUserSession($user)
	{
		
			$data	=	[
				'id'	        =>	$user['id'],
				'fullname'		=>	$user['firstname'].' '.$user['lastname'],
				'email'			=>	$user['email'],
				'role'          =>  $user['role'],
				'isLoggedIn'	=>	true,
			];

		session()->set($data);
		return true;
	}

	function register()
	{
		$this->logged();
		helper(['form']);
		$user = $this->user;
		$data = [];

			if ($this->request->getMethod() == 'post') {

			// Receive all user input and process it to the ::DB
				$rules = [
					'firstname'	=> 'required|min_length[3]',
					'lastname'	=> 'required|min_length[3]',
					'email'		=> 'required|is_unique[users.email]|valid_email',
					'password'	=> 'required|min_length[5]',
					'passconf'	=> 'required|matches[password]',
				];
	
				if (!$this->validate($rules)) {
					$data['validation'] = $this->validator;
				} else {
					
					//save user details into DB//
					$model = $this->user;
					$fullname = $this->request->getVar('lastname'). ' ' .$this->request->getVar('firstname');
					$newdata = [
						'firstname' 	=> filter_var($this->request->getVar('firstname'), FILTER_SANITIZE_STRING),
						'lastname' 		=> filter_var($this->request->getVar('lastname'), FILTER_SANITIZE_STRING),
						'email' 		=> filter_var($this->request->getVar('email'), FILTER_SANITIZE_STRING),
						'password' 		=> filter_var($this->request->getVar('password'), FILTER_SANITIZE_STRING),
						'fullname'		=> filter_var($fullname, FILTER_SANITIZE_STRING),
						'created_at'    =>  date('F, d Y')
					];
	
					$model->save($newdata);
					$session = session();
					$session->setFlashdata('success', 'Registration Successful');
					return redirect()->to('/login');
				}
			}
		return view('users/register', $data);
	}

	function error()
	{
		return view('errors/404');
	}

	private function logged()
	{
		if (session()->get('role') != null) {
			# code...
			session()->setFlashdata('success', 'Session Ended Successfully');
			return redirect()->to('dashboard');
		}
	}

	function test(){
		$_SESSION['email'] = "user@user.co";
		$weight = 25;
		$handling_fee	=	$this->cal->handling_fee($weight);
		$delivery_fee	=	$this->cal->delivery_fee($weight);
		$waybill		=	$this->cal->waybill($weight, 'Kano');
		
		echo $waybill + $delivery_fee + $handling_fee;
	}

	//--------------------------------------------------------------------

}
