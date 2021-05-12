<?php namespace App\Controllers;

class Errands extends BaseController
{
	public function request()
	{
        $data = [
            'title' => 'Send Us on an Errand',
            'page'  =>  'request',
        ];
		return view('errands/main', $data);
    }
    
	public function pricing()
	{
        $data = [
            'title' => 'Pricing List',
            'page'  =>  'pricing',
        ];
		return view('errands/main', $data);
    }
    
	public function orders()
	{
        $data = [
            'title' => 'My Errands',
            'page'  =>  'orders',
        ];
		return view('errands/main', $data);
    }
    
	public function track()
	{
        $data = [
            'title' => 'Track Your Errands',
            'page'  =>  'track',
        ];
		return view('errands/main', $data);
    }
    
    function dashboard()
    {
        $data = [
            'title' =>  'Errand Dashboard.',
            'page'  =>  'dashboard'
        ];
		return view('errands/main', $data);
    }
}