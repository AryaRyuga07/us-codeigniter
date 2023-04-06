<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->group('admin', function($routes){
    $routes->get('/', 'Admin::index');

	$routes->get('siswa', 'Siswa::siswa');
    $routes->add('siswa/create', 'Siswa::create');
	$routes->add('siswa/(:segment)/edit', 'Siswa::edit/$1');
	$routes->get('siswa/(:segment)/delete', 'Siswa::delete/$1');

	$routes->get('kelas', 'Kelas::kelas');
    $routes->add('kelas/create', 'Kelas::create');
	$routes->add('kelas/(:segment)/edit', 'Kelas::edit/$1');
	$routes->get('kelas/(:segment)/delete', 'Kelas::delete/$1');
	
    $routes->get('jurusan', 'Jurusan::jurusan');
    $routes->add('jurusan/create', 'Jurusan::create');
    $routes->post('jurusan/getubah', 'Jurusan::getubah');
	$routes->add('jurusan/edit', 'Jurusan::edit');
	$routes->get('jurusan/(:segment)/delete', 'Jurusan::delete/$1');
    
	$routes->get('guru', 'Guru::guru');
    $routes->add('guru/create', 'Guru::create');
	$routes->add('guru/(:segment)/edit', 'Guru::edit/$1');
	$routes->get('guru/(:segment)/delete', 'Guru::delete/$1');
	
	$routes->get('mapel', 'Mapel::mapel');
    $routes->add('mapel/create', 'Mapel::create');
	$routes->add('mapel/(:segment)/edit', 'Mapel::edit/$1');
	$routes->get('mapel/(:segment)/delete', 'Mapel::delete/$1');
	
	$routes->get('soal', 'Soal::soal');
    $routes->add('soal/create', 'Soal::create');
	$routes->add('soal/(:segment)/edit', 'Soal::edit/$1');
	$routes->get('soal/(:segment)/delete', 'Soal::delete/$1');
	
	$routes->get('detail-soal', 'DetailSoal::soal');
    $routes->add('detail-soal/create', 'DetailSoal::create');
	$routes->add('detail-soal/(:segment)/edit', 'DetailSoal::edit/$1');
	$routes->get('detail-soal/(:segment)/delete', 'DetailSoal::delete/$1');
});

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
