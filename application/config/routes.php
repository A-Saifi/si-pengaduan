<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
// routing sub-dir
$route['home'] = "home";
$route['info'] = "info";
$route['home/(:any)'] = "home/$1";

$route['login'] = "login/login";
$route['login/(:any)'] = "login/login/$1";

$route['admin'] = "backend/cek_admin";
$route['admin/logout'] = "backend/logout";
//$route['admin/login'] = "backend/login";
//$route['admin/login/(:any)'] = "backend/login/$1";


$route['admin/kategori'] = "backend/kategori/kategori";
$route['admin/kategori/(:any)'] = "backend/kategori/kategori/$1";
$route['admin/kategori/(:any)/(:any)'] = "backend/kategori/kategori/$1/$2";
$route['admin/kategori/(:any)/(:any)/(:any)'] = "backend/kategori/kategori/$1/$2/$3";
$route['admin/rt/kategori'] = "backend/kategori/kategori";
$route['admin/rw/kategori'] = "backend/kategori/kategori";
$route['admin/kelurahan/kategori'] = "backend/kategori/kategori";
$route['admin/kecamatan/kategori'] = "backend/kategori/kategori";
$route['admin/kabupaten/kategori'] = "backend/kategori/kategori";

// RT
$route['admin/rt'] = "backend/rt/dashboard";
$route['admin/rt/(:any)'] = "backend/rt/$1";
$route['admin/rt/(:any)/(:any)'] = "backend/rt/$1/$2";
$route['admin/rt/(:any)/(:any)/(:any)'] = "backend/rt/$1/$2/$3";
$route['admin/rt/(:any)/(:any)/(:any)/(:any)'] = "backend/rt/$1/$2/$3/$4";
// END RT

// RW
$route['admin/rw'] = "backend/rw/dashboard";
$route['admin/rw/(:any)'] = "backend/rw/$1";
$route['admin/rw/(:any)/(:any)'] = "backend/rw/$1/$2";
$route['admin/rw/(:any)/(:any)/(:any)'] = "backend/rw/$1/$2/$3";
$route['admin/rw/(:any)/(:any)/(:any)/(:any)'] = "backend/rw/$1/$2/$3/$4";
// END RW

// Kelurahan
$route['admin/kelurahan'] = "backend/kelurahan/dashboard";
$route['admin/kelurahan/(:any)'] = "backend/kelurahan/$1";
$route['admin/kelurahan/(:any)/(:any)'] = "backend/kelurahan/$1/$2";
$route['admin/kelurahan/(:any)/(:any)/(:any)'] = "backend/kelurahan/$1/$2/$3";
$route['admin/kelurahan/(:any)/(:any)/(:any)/(:any)'] = "backend/kelurahan/$1/$2/$3/$4";
// End Kelurahan

// Kecamatan
$route['admin/kecamatan'] = "backend/kecamatan/dashboard";
$route['admin/kecamatan/(:any)'] = "backend/kecamatan/$1";
$route['admin/kecamatan/(:any)/(:any)'] = "backend/kecamatan/$1/$2";
$route['admin/kecamatan/(:any)/(:any)/(:any)'] = "backend/kecamatan/$1/$2/$3";
$route['admin/kecamatan/(:any)/(:any)/(:any)/(:any)'] = "backend/kecamatan/$1/$2/$3/$4";
// END Kecamatan

// kabupaten
$route['admin/kabupaten'] = "backend/kabupaten/dashboard";
$route['admin/kabupaten/(:any)'] = "backend/kabupaten/$1";
$route['admin/kabupaten/(:any)/(:any)'] = "backend/kabupaten/$1/$2";
$route['admin/kabupaten/(:any)/(:any)/(:any)'] = "backend/kabupaten/$1/$2/$3";
$route['admin/kabupaten/(:any)/(:any)/(:any)/(:any)'] = "backend/kabupaten/$1/$2/$3/$4";
// END kabupaten

// admin
$route['admin/admin'] = "backend/admin/pengguna";
$route['admin/admin/(:any)'] = "backend/admin/$1";
$route['admin/admin/(:any)/(:any)'] = "backend/admin/$1/$2";
$route['admin/admin/(:any)/(:any)/(:any)'] = "backend/admin/$1/$2/$3";
$route['admin/admin/(:any)/(:any)/(:any)/(:any)'] = "backend/admin/$1/$2/$3/$4";
// END admin



$route['(:any)'] = "frontend/$1";
$route['(:any)/(:any)'] = "frontend/$1/$2";
$route['(:any)/(:any)/(:any)'] = "frontend/$1/$2/$3";
$route['(:any)/(:any)/(:any)/(:any)'] = "frontend/$1/$2/$3/$4";
