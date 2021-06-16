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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Public\LoginController::index');
$routes->get('/select_type', 'SelectTypeController::index');


// ADMIN ROUTES START

$routes->get('/admin/login', 'Admin\LoginController::index', ['as' => 'admin.login.index']);
$routes->post('/admin/login', 'Admin\LoginController::login', ['as' => 'admin.login.verify']);
$routes->get('/admin/logout', 'Admin\LoginController::logout', ['as' => 'admin.logout']);

$routes->group('admin', ['filter' => 'loginCheck'], function($routes)
{
	$routes->get('dashboard', 'Admin\DashboardController::index', ['as' => 'admin.dashboard']);

    // manage beasiswa
    $routes->get('scholarship', 'Admin\ScholarshipController::index', ['as' => 'admin.scholarship.index']);
    $routes->get('verify_scholarship', 'Admin\ScholarshipController::showVerifyPage', ['as' => 'admin.scholarship.verify']);
    $routes->get('download_scholarsip_verification_doc/(:num)', 'Admin\ScholarshipController::downloadVerificationDoc/$1', ['as' => 'admin.scholarship.downVerDoc']);
    
    // manage public user
    $routes->get('public', 'Admin\PublicuserController::index', ['as' => 'admin.public.index']);
    $routes->get('public/(:num)', 'Admin\PublicuserController::userDetails/$1', ['as' => 'admin.public.details']);
    $routes->post('public/delete/(:num)', 'Admin\PublicuserController::deleteUser/$1', ['as' => 'admin.public.delete']);

    // manage company user
    $routes->get('company', 'Admin\CompanyuserController::index', ['as' => 'admin.company.index']);
    $routes->get('company/(:num)', 'Admin\CompanyuserController::userDetails/$1', ['as' => 'admin.company.details']);
    $routes->post('company/delete/(:num)', 'Admin\CompanyuserController::deleteUser/$1', ['as' => 'admin.company.delete']);
    $routes->get('verify_company', 'Admin\CompanyuserController::showVerifyPage', ['as' => 'admin.company.verify']);
    $routes->get('download_company_verification_doc/(:num)', 'Admin\CompanyuserController::downloadVerificationDoc/$1', ['as' => 'admin.company.downVerDoc']);
});

$routes->post('admin/public/ajax_fetch_all', 'Admin\PublicuserController::ajaxFetchAll');
$routes->post('admin/company/ajax_fetch_all', 'Admin\CompanyuserController::ajaxFetchAll');
$routes->post('admin/company/ajax_fetch_unverified', 'Admin\CompanyuserController::ajaxFetchUnverified');
$routes->post('admin/scholarship/ajax_fetch_all', 'Admin\ScholarshipController::ajaxFetchAll');
$routes->post('admin/scholarship/ajax_fetch_unverified', 'Admin\ScholarshipController::ajaxFetchUnverified');

$routes->post('admin/verify_scholarship/(:num)', 'Admin\ScholarshipController::verifyScholarship/$1');
$routes->post('admin/verify_company/(:num)', 'Admin\CompanyuserController::verifyCompany/$1');

// ADMIN ROUTES END


// PUBLIC ROUTES START

$routes->get('/pub/login', 'Public\LoginController::index', ['as' => 'public.login.index']);
$routes->post('/pub/login', 'Public\LoginController::login');
$routes->get('/pub/logout', 'Public\LoginController::logout', ['as' => 'public.logout']);
$routes->get('/pub/register', 'Public\RegisterController::index', ['as' => 'public.register']);
$routes->post('/pub/register', 'Public\RegisterController::register');
$routes->group('pub', ['filter' => 'loginCheck'], function($routes)
{
    $routes->get('home', 'Public\HomeController::index', ['as' => 'public.home']);
    $routes->get('profile', 'Public\ProfileController::index', ['as' => 'public.profile']);
    $routes->get('edit_profile', 'Public\ProfileController::showEditProfile', ['as' => 'public.edit_profile']);
    $routes->post('edit_profile/(:num)', 'Public\ProfileController::editProfile/$1');

    $routes->get('scholarship/all/(:num)', 'Public\ScholarshipController::index/$1');
    $routes->get('scholarship/(:num)', 'Public\ScholarshipController::show/$1', ['as' => 'public.scholarship.show']);
    $routes->post('scholarship/(:num)/comment', 'Public\ScholarshipController::createComment/$1');

    $routes->get('my_scholarship', 'Public\ScholarshipController::showMyScholarship');
    $routes->get('create_scholarship', 'Public\ScholarshipController::showCreateScholarship', ['as' => 'public.create_scholarship']);
    $routes->post('create_scholarship', 'Public\ScholarshipController::create');
    
    $routes->get('edit_scholarship/(:num)', 'Public\ScholarshipController::edit/$1');
    $routes->post('edit_scholarship/(:num)', 'Public\ScholarshipController::update/$1');

    $routes->get('verify_scholarship/(:num)', 'Public\ScholarshipController::showVerify/$1');
    $routes->post('verify_scholarship/(:num)', 'Public\ScholarshipController::verify/$1');

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

$routes->get('api/user/public', 'Resource\User::getPublic');
$routes->get('api/user/company', 'Resource\User::getCompany');
$routes->get('api/scholarship', 'Resource\Scholarship::getAll');

$routes->get('api/user/(:num)', 'Resource\User::show/$1');
$routes->get('api/scholarship/(:num)', 'Resource\Scholarship::show/$1');

$routes->delete('api/user/(:num)', 'Resource\User::delete/$1');
$routes->delete('api/scholarship/(:num)', 'Resource\Scholarship::delete/$1');


// test routes 
$routes->get('/test', 'TestController::index');
$routes->get('/upload', 'TestController::uploadPage');
$routes->post('/upload', 'TestController::upload');
$routes->get('/view', 'TestController::view');

$routes->get('/view_user', 'TestController::viewUser');
$routes->get('/create_user', 'TestController::createUserPage');
$routes->post('/create_user', 'TestController::createUser');
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
