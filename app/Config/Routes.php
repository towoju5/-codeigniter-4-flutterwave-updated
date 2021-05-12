<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions ecommerce/inbounds
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// General Users Routes
$routes->match(['post','get'], 'dashboard', 	'Users::dashboard');
$routes->match(['post','get'], 'profile', 		'Users::profile');
$routes->match(['post','get'], 'settings', 		'Users::settings');
$routes->match(['post','get'], 'reports', 		'Users::reports');
$routes->match(['post','get'], 'bills', 		'Users::bills');
$routes->match(['post','get'], 'waybills', 		'Users::waybill');
$routes->match(['post','get'], 'help', 			'Users::help');
$routes->match(['post','get'], 'test', 			'Users::test');

$routes->match(['post','get'], 'payment/verify/paystack',	'Users::verify_paystack');
$routes->match(['post','get'], 'payment/verify/rave',		'Users::verify_flutterwave');

// eCommerce Fulfilments Routes
$routes->match(['post','get'], 'ecommerce/inbounds', 	'Commerce::inbounds');
$routes->match(['post','get'], 'ecommerce/inventory', 	'Commerce::inventory');
$routes->match(['post','get'], 'ecommerce/orders', 		'Commerce::orders');
$routes->match(['post','get'], 'ecommerce/channels', 	'Commerce::channels');
$routes->match(['post','get'], 'dashboard/ecommerce', 	'Commerce::dashboard');

// cargo Fulfilments Routes
$routes->match(['post','get'], 'cargo/inbounds', 		'Cargo::inbounds');
$routes->match(['post','get'], 'cargo/inventory', 		'Cargo::inventory');
$routes->match(['post','get'], 'cargo/orders', 			'Cargo::orders');
$routes->match(['post','get'], 'cargo/calculator', 		'Cargo::calculator');
$routes->match(['post','get'], 'dashboard/cargo', 		'Cargo::dashboard');
//Cargo Inbound Form Pages. 
$routes->match(['post','get'], 'cargo/request/pending_arrival', 		'Cargo::pending_arrival');
$routes->match(['post','get'], 'cargo/request/warehouse_store', 		'Cargo::warehouse_store');
$routes->match(['post','get'], 'cargo/request/has_arrived', 			'Cargo::has_arrived');
$routes->match(['post','get'], 'cargo/payment/$1', 						'Cargo::payment');

// errands Fulfilments Routes
$routes->match(['post','get'], 'errands/inbounds', 		'Errands::inbounds');
$routes->match(['post','get'], 'errands/inventory', 	'Errands::inventory');
$routes->match(['post','get'], 'errands/orders', 		'Errands::orders');
$routes->match(['post','get'], 'dashboard/errands', 	'Errands::dashboard');

//Do not modify // for setting user enviroment type
$routes->match(['post','get'], 'env', 			'Users::env');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
