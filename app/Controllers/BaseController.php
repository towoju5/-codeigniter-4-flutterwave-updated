<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */
require APPPATH . 'ThirdParty/Twilio/autoload.php';

use App\Models\Cal;
use App\Models\CargoModel;
use App\Models\Store;
use Twilio\Rest\Client;
use CodeIgniter\Controller;
use Myth\Auth\Entities\User;
// use QrCode\QrCode;
use Myth\Auth\Models\UserModel;
use App\Models\VAT;
use App\Models\Faqs;
use App\Models\PickUp;
use App\Models\History;

class BaseController extends Controller
{

	/** 
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
		
		// Twillo SID && Token for WhatsApp Notifications
		$sid = 'AC0e19553df2803b287d69763b2654ae57';  // SID for Twillo => WhatsApp();
		$token = '159d66b4bcddefd0c65e327ca5dcb4ea';  // token for Twillo => WhatsApp();
		
		// Autoload Required Library Globably for all controller
		helper(['form', 'auth']);

        
		$this->user			=	new UserModel;
		$this->card 		= 	\Config\Services::card();
		$this->vat 			=	new VAT();
		$this->rave			=	"Flutterwave Payments";
		$this->twilio		=	new Client($sid, $token);
		$this->user_id		=	user_id();
		$this->cal			=	new Cal();
		$this->cargo		=	new CargoModel();
		$this->uri 			= 	service('uri');
		$this->paystack_sec =	"sk_test_bdf33b0a61f6e09a5c72f34f6d513cee4c81cd5c";
		$this->paystack_pub	=	"pk_test_63e447556cf922cf45d8a226e7fc56321078aa3c";


		// Models ();
		$this->store		=	new Store();
		$this->faqs			=	new Faqs();
		$this->pickup		=	new PickUp();
		$this->history 		=	new History();


		// ThirdParty Library

		$this->qrcode		=	\Config\Services::qrcode();

	}

}
