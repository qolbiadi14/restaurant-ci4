<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Homepage');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->group('/', ['filter' => 'Auth'], function ($routes) {

	$routes->add('productdetail/index/(:any)', 'ProductDetail::index/$1');

	$routes->add('cart', 'Cart::index');
	$routes->add('cart/buy/(:any)', 'Cart::buy/$1');
	$routes->add('cart/tambah/(:any)/(:any)', 'Cart::tambah/$1/$2');
	$routes->add('cart/kurang/(:any)/(:any)', 'Cart::kurang/$1/$2');
	$routes->add('cart/remove/(:any)', 'Cart::remove/$1');
	$routes->add('cart/removeall', 'Cart::removeall');

	$routes->add('checkout/index', 'Checkout::index');
	$routes->add('checkout/proceed', 'Checkout::proceed');
	$routes->add('checkout/finish', 'Checkout::finish');

	$routes->add('profile/index/(:any)', 'Profile::index/$1');
	$routes->add('profile/edit/(:any)', 'Profile::edit/$1');
	$routes->add('profile/update', 'Profile::update');

	$routes->add('histori/index/(:any)', 'Histori::index/$1');
});

$routes->add('admin/login', 'LoginAdmin::index');
$routes->add('admin/login/logout', 'LoginAdmin::logout');

$routes->group('admin', ['filter' => 'AuthAdmin'], function ($routes) {
	$routes->add('/', 'Admin\Dashboard::index');
	$routes->add('kategori', 'Admin\Kategori::index');
	$routes->add('kategori/create', 'Admin\Kategori::create');
	$routes->add('kategori/find/(:any)', 'Admin\Kategori::find/$1');
	$routes->add('kategori/delete/(:any)', 'Admin\Kategori::delete/$1');

	$routes->add('menu', 'Admin\Menu::index');
	$routes->add('menu/create', 'Admin\Menu::create');
	$routes->add('menu/find/(:any)', 'Admin\Menu::find/$1');
	$routes->add('menu/delete/(:any)', 'Admin\Menu::delete/$1');

	$routes->add('pelanggan', 'Admin\Pelanggan::index');
	$routes->add('pelanggan/create', 'Admin\Pelanggan::create');
	$routes->add('pelanggan/find/(:any)', 'Admin\Pelanggan::find/$1');
	$routes->add('pelanggan/delete/(:any)', 'Admin\Pelanggan::delete/$1');

	$routes->add('order', 'Admin\Order::index');
	$routes->add('order/find/(:any)', 'Admin\Order::find/$1');

	$routes->add('orderdetail', 'Admin\Orderdetail::index');

	$routes->add('user', 'Admin\User::index');
	$routes->add('user/create', 'Admin\User::create');
	$routes->add('user/find/(:any)', 'Admin\User::find/$1');
	$routes->add('user/delete/(:any)', 'Admin\User::delete/$1');

	$routes->add('identitas', 'Admin\Identitas::index');
	$routes->add('identitas/find/(:any)', 'Admin\Identitas::find/$1');

	$routes->add('slider', 'Admin\Slider::index');
	$routes->add('slider/create', 'Admin\Slider::create');
	$routes->add('slider/find/(:any)', 'Admin\Slider::find/$1');
	$routes->add('slider/delete/(:any)', 'Admin\Slider::delete/$1');
});

$routes->group('kasir', ['filter' => 'AuthKasir'], function ($routes) {
	$routes->add('/', 'Admin\Dashboard::index');

	$routes->add('order', 'Admin\Order::index');
	$routes->add('order/find/(:any)', 'Admin\Order::find/$1');

	$routes->add('orderdetail', 'Admin\Orderdetail::index');
});

$routes->group('koki', ['filter' => 'AuthKoki'], function ($routes) {
	$routes->add('/', 'Admin\Dashboard::index');

	$routes->add('orderdetail', 'Admin\Orderdetail::index');
});


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
