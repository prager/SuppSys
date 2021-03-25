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
 * Router Setup - test
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
$routes->add('orders', 'Orders::index');
$routes->add('orders/(:num)', 'Orders::orders');
$routes->add('edit-order/(:num)', 'Orders::edit_orders');
$routes->add('edit-order', 'Orders::edit_orders');
$routes->add('delete-order/(:num)', 'Orders::delete_order');
$routes->add('delivered-orders/(:num)', 'Orders::delivered_orders');
$routes->add('delivered-orders/', 'Orders::delivered_orders');
$routes->add('cancelled-orders/(:num)', 'Orders::cancelled_orders');
$routes->add('cancelled-orders/', 'Orders::cancelled_orders');
$routes->add('pending-orders/(:num)', 'Orders::pending_orders');
$routes->add('pending-orders', 'Orders::pending_orders');
$routes->add('download-orders', 'Orders::download_orders');
$routes->add('add-order', 'Orders::add_order');
$routes->add('download-gear-item/(:num)', 'Mngr::download_gear_item');
$routes->add('load-gear', 'Mngr::load_gear');
$routes->add('add-gear', 'Mngr::add_gear');
$routes->add('test-orders', 'Orders::test');
$routes->add('test', 'Mngr::test');
$routes->add('load-test', 'Mngr::load_test');
$routes->add('test-post', 'Orders::test_post');
$routes->add('load-order', 'Orders::load_order');
$routes->add('gearsets', 'Mngr::show_gear_sets');

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
