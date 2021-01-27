<?php namespace Config;

// Create a new instance of our RouteCollection class. Test update 1 ok
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

$routes->add('manager/(:any)', 'Mngr::index');
$routes->add('manager', 'Mngr::index');
$routes->add('Mngr', 'Mngr::index');
$routes->add('boat-gear', 'Mngr::boat_gear');
$routes->add('boat-gear/(:num)', 'Mngr::boat_gear');
$routes->add('other-gear', 'Mngr::other_gear');
$routes->add('other-gear/(:num)', 'Mngr::other_gear');
$routes->add('logout', 'Home::logout');
$routes->add('Home/logout', 'Home::logout');
$routes->add('home', 'Home::index');
$routes->add('Home', 'Home::index');
$routes->add('contact', 'Home::contact');
$routes->add('get-gear/(:num)', 'Mngr::get_gear');
$routes->add('gear', 'Mngr::gear');
$routes->add('delete-gear/(:num)', 'Mngr::delete_gear');
$routes->add('edit-gear/(:num)', 'Mngr::edit_gear');
$routes->add('download-gear', 'Mngr::download_gear');
$routes->add('orders', 'Mngr::orders');
$routes->add('orders/(:num)', 'Mngr::orders');
$routes->add('delivered-orders/(:num)', 'Mngr::delivered_orders');
$routes->add('delivered-orders/', 'Mngr::delivered_orders');
$routes->add('cancelled-orders/(:num)', 'Mngr::cancelled_orders');
$routes->add('cancelled-orders/', 'Mngr::cancelled_orders');
$routes->add('pending-orders/(:num)', 'Mngr::pending_orders');
$routes->add('pending-orders/', 'Mngr::pending_orders');
$routes->add('download-gear-item/(:num)', 'Mngr::download_gear_item');
$routes->add('load-gear', 'Mngr::load_gear');
$routes->add('add-gear', 'Mngr::add_gear');
$routes->add('test', 'Mngr::test');

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

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
