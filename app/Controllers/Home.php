<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		// return view('welcome_message');
		$data['cards'] 		= 	$this->card->listCards();
		$data['transfer'] 	= 	$this->transfer->listTransfers();
		// $data['bills'] 		= 	$this->bill->getBill();
		return view('flutterwave', $data);
	}

	//--------------------------------------------------------------------

}
