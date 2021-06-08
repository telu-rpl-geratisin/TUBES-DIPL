<?php

namespace Config;

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
$routes->setDefaultController('Public\LoginController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/Login', 'Login::index');

// ADMIN ROUTES START

$routes->get('/admin/login', 'Admin\LoginController::index', ['as' => 'admin.login.index']);
$routes->post('/admin/login', 'Admin\LoginController::login', ['as' => 'admin.login.verify']);
$routes->get('/admin/logout', 'Admin\LoginController::logout', ['as' => 'admin.logout']);

$routes->group('admin', ['filter' => 'loginCheck'], function($routes)
{
	$routes->get('dashboard', 'Admin\DashboardController::index', ['as' => 'admin.dashboard']);

    // manage user
    $routes->get('public', 'Admin\PublicuserController::index', ['as' => 'admin.public.index']);
    $routes->get('public/(:num)', 'Admin\PublicuserController::userDetails/$1', ['as' => 'admin.public.details']);
    $routes->post('public/delete/(:num)', 'Admin\PublicuserController::deleteUser/$1', ['as' => 'admin.public.delete']);

    $routes->get('company', 'Admin\CompanyuserController::index', ['as' => 'admin.company.index']);
    $routes->get('company/(:num)', 'Admin\CompanyuserController::userDetails/$1', ['as' => 'admin.company.details']);
    $routes->post('company/delete/(:num)', 'Admin\CompanyuserController::deleteUser/$1', ['as' => 'admin.company.delete']);
});

$routes->post('admin/public/ajax_fetch_all', 'Admin\PublicuserController::ajaxFetchAll');
$routes->post('admin/company/ajax_fetch_all', 'Admin\CompanyuserController::ajaxFetchAll');

// ADMIN ROUTES END


// PUBLIC ROUTES START

$routes->get('/pub/login', 'Public\LoginController::index', ['as' => 'public.login.index']);
$routes->post('/pub/login', 'Public\LoginController::login', ['as' => 'public.login.verify']);
$routes->get('/pub/logout', 'Public\LoginController::logout', ['as' => 'public.logout']);
$routes->group('pub', ['filter' => 'loginCheck'], function($routes)
{
    $routes->get('home', 'Public\HomeController::index', ['as' => 'public.home.index']);
});

// PUBLIC ROUTES END


// COMPANY ROUTES START

$routes->get('/company/login', 'Company\LoginController::index', ['as' => 'company.login.index']);
$routes->post('/company/login', 'Company\LoginController::login', ['as' => 'company.login.verify']);
$routes->get('/company/logout', 'Company\LoginController::logout', ['as' => 'company.logout']);

$routes->group('company', ['filter' => 'loginCheck'], function($routes)
{
    $routes->get('home', 'Company\HomeController::index', ['as' => 'company.home.index']);
});

// COMPANY ROUTES END

// api routes

$routes->get('api/public_user', 'Resource\PublicUser::index');
$routes->get('api/public_user/(:num)', 'Resource\PublicUser::show/$1');
$routes->delete('api/public_user/(:num)', 'Resource\PublicUser::delete/$1');

$routes->get('api/company_user', 'Resource\CompanyUser::index');
$routes->get('api/company_user/(:num)', 'Resource\CompanyUser::show/$1');
$routes->delete('api/company_user/(:num)', 'Resource\CompanyUser::delete/$1');

/*
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
