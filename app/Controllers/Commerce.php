<?php namespace App\Controllers;

class Commerce extends BaseController
{
	public function inbounds()
	{
        $data = [
            'title' => 'Incoming Items',
            'page'  =>  'inbounds',
        ];
		return view('inc/main', $data);
    }
    
	public function inventory()
	{
        $data = [
            'title' => 'Inventory',
            'page'  =>  'inbounds',
        ];
		return view('inc/main', $data);
    }
    
	public function orders()
	{
        $data = [
            'title' => 'Orders',
            'page'  =>  'inbounds',
        ];
		return view('inc/main', $data);
    }
    
	public function channels()
	{
        $data = [
            'title' => 'Channels',
            'page'  =>  'inbounds',
        ];
		return view('inc/main', $data);
	}
}