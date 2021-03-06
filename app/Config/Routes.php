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
$routes->setDefaultController('Pblc\LoginController');
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
$routes->get('/', 'Pblc\LoginController::index');
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

$routes->get('/pub/login', 'Pblc\LoginController::index', ['as' => 'public.login.index']);
$routes->post('/pub/login', 'Pblc\LoginController::login');
$routes->get('/pub/logout', 'Pblc\LoginController::logout', ['as' => 'public.logout']);
$routes->get('/pub/register', 'Pblc\RegisterController::index', ['as' => 'public.register']);
$routes->post('/pub/register', 'Pblc\RegisterController::register');
$routes->group('pub', ['filter' => 'loginCheck'], function($routes)
{
    $routes->get('home', 'Pblc\HomeController::index', ['as' => 'public.home']);
    $routes->get('profile', 'Pblc\ProfileController::index', ['as' => 'public.profile']);
    $routes->get('edit_profile', 'Pblc\ProfileController::showEditProfile', ['as' => 'public.edit_profile']);
    $routes->post('edit_profile/(:num)', 'Pblc\ProfileController::editProfile/$1');

    $routes->get('scholarship/all/(:num)', 'Pblc\ScholarshipController::index/$1');
    $routes->get('scholarship/(:num)', 'Pblc\ScholarshipController::show/$1', ['as' => 'public.scholarship.show']);
    $routes->post('scholarship/(:num)/comment', 'Pblc\ScholarshipController::createComment/$1');

    $routes->get('my_scholarship', 'Pblc\ScholarshipController::showMyScholarship');
    $routes->get('create_scholarship', 'Pblc\ScholarshipController::showCreateScholarship', ['as' => 'public.create_scholarship']);
    $routes->post('create_scholarship', 'Pblc\ScholarshipController::create');
    
    $routes->get('edit_scholarship/(:num)', 'Pblc\ScholarshipController::edit/$1');
    $routes->post('edit_scholarship/(:num)', 'Pblc\ScholarshipController::update/$1');

    $routes->get('verify_scholarship/(:num)', 'Pblc\ScholarshipController::showVerify/$1');
    $routes->post('verify_scholarship/(:num)', 'Pblc\ScholarshipController::verify/$1');

    $routes->get('scholarship_verification_instruction', 'Pblc\ScholarshipController::showVerificationHelp');

    $routes->post('insert_rating', 'All\ScholarshipController::insertRating');
    $routes->get('delete_comment/(:num)', 'All\ScholarshipController::deleteComment/$1');
});

// PUBLIC ROUTES END


// COMPANY ROUTES START

$routes->get('/company/login', 'Company\LoginController::index', ['as' => 'company.login.index']);
$routes->post('/company/login', 'Company\LoginController::login', ['as' => 'company.login.verify']);
$routes->get('/company/logout', 'Company\LoginController::logout', ['as' => 'company.logout']);
$routes->get('/company/register', 'Company\RegisterController::index', ['as' => 'company.register']);
$routes->post('/company/register', 'Company\RegisterController::register');
$routes->group('company', ['filter' => 'loginCheck'], function($routes)
{
    $routes->get('home', 'Company\HomeController::index', ['as' => 'company.home']);
    $routes->get('profile', 'Company\ProfileController::index', ['as' => 'company.profile']);
    $routes->get('edit_profile', 'Company\ProfileController::showEditProfile', ['as' => 'company.edit_profile']);
    $routes->post('edit_profile/(:num)', 'Company\ProfileController::editProfile/$1');

    $routes->get('scholarship/all/(:num)', 'Company\ScholarshipController::index/$1');
    $routes->get('scholarship/(:num)', 'Company\ScholarshipController::show/$1', ['as' => 'company.scholarship.show']);
    $routes->post('scholarship/(:num)/comment', 'Company\ScholarshipController::createComment/$1');

    $routes->get('my_scholarship', 'Company\ScholarshipController::showMyScholarship');
    $routes->get('create_scholarship', 'Company\ScholarshipController::showCreateScholarship', ['as' => 'company.create_scholarship']);
    $routes->post('create_scholarship', 'Company\ScholarshipController::create');
    
    $routes->get('edit_scholarship/(:num)', 'Company\ScholarshipController::edit/$1');
    $routes->post('edit_scholarship/(:num)', 'Company\ScholarshipController::update/$1');

    $routes->get('verify_scholarship/(:num)', 'Company\ScholarshipController::showVerify/$1');
    $routes->post('verify_scholarship/(:num)', 'Company\ScholarshipController::verify/$1');

    $routes->get('verify_company/(:num)', 'Company\CompanyController::showVerifyCompany/$1');
    $routes->post('verify_company/(:num)', 'Company\CompanyController::verifyCompany/$1');

    $routes->get('company_verification_instruction', 'Company\CompanyController::showVerificationHelp');
    $routes->get('scholarship_verification_instruction', 'Company\ScholarshipController::showVerificationHelp');

    $routes->post('insert_rating', 'All\ScholarshipController::insertRating');
    $routes->get('delete_comment/(:num)', 'All\ScholarshipController::deleteComment/$1');
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
