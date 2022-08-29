<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'auth';
$route['404_override'] = 'auth/notfound';
$route['translate_uri_dashes'] = FALSE;

$route['pengaturan/tambah'] = 'pengaturan/penggunatambah';
$route['openfile/(:any)'] = 'export/openfile/$1';
$route['download/(:any)'] = 'export/download/$1';

$route['pengaturan/klasifikasi'] = 'pengaturan/jabatan';


$route['surat-masuk'] = 'sm';
$route['surat-masuk/(:num)'] = 'sm/detail/$1';
$route['surat-masuk/tambah'] = 'sm/tambah';
$route['surat-masuk/ubah/(:any)'] = 'sm/ubah/$1';
$route['disposisi/(:num)'] = 'disposisi/index/$1';

$route['surat-keluar'] = 'sk';
$route['surat-keluar/(:num)'] = 'sk/detail/$1';
$route['surat-keluar/tambah'] = 'sk/tambah';
$route['surat-keluar/ubah/(:any)'] = 'sk/ubah/$1';

$route['laporan/surat-masuk'] = 'laporan/sm';
$route['laporan/surat-keluar'] = 'laporan/sk';
$route['laporan/memo-masuk'] = 'laporan/mm';
$route['laporan/memo-keluar'] = 'laporan/mk';

$route['galeri/surat-masuk'] = 'galeri/sm';
$route['galeri/surat-keluar'] = 'galeri/sk';
$route['galeri/memo-masuk'] = 'galeri/mm';
$route['galeri/memo-keluar'] = 'galeri/mk';

$route['memo-masuk'] = 'mm';
$route['memo-masuk/(:num)'] = 'mm/detail/$1';
$route['memo-masuk/tambah'] = 'mm/tambah';
$route['memo-masuk/ubah/(:any)'] = 'mm/ubah/$1';
$route['disposisi/(:num)'] = 'disposisi/index/$1';

$route['memo-keluar'] = 'mk';
$route['memo-keluar/(:num)'] = 'mk/detail/$1';
$route['memo-keluar/tambah'] = 'mk/tambah';
$route['memo-keluar/ubah/(:any)'] = 'mk/ubah/$1';

$route['user/ubah-password'] = 'user/ubahpass';
$route['auth/forgot-password'] = 'auth/forgotpass';

// Not Found
// $route['pengaturan/jabatan'] = 'auth/notfound';

$route['sm'] = 'auth/notfound';
$route['sm/detail'] = 'auth/notfound';
$route['sm/tambah'] = 'auth/notfound';
$route['sm/ubah'] = 'auth/notfound';

$route['sk'] = 'auth/notfound';
$route['sk/detail'] = 'auth/notfound';
$route['sk/tambah'] = 'auth/notfound';
$route['sk/ubah'] = 'auth/notfound';

$route['mm'] = 'auth/notfound';
$route['mm/detail'] = 'auth/notfound';
$route['mm/tambah'] = 'auth/notfound';
$route['mm/ubah'] = 'auth/notfound';

$route['mk'] = 'auth/notfound';
$route['mk/detail'] = 'auth/notfound';
$route['mk/tambah'] = 'auth/notfound';
$route['mk/ubah'] = 'auth/notfound';

$route['disposisi'] = 'auth/notfound';
$route['disposisi/detail'] = 'auth/notfound';
$route['disposisi/tambah'] = 'auth/notfound';
$route['disposisi/ubah'] = 'auth/notfound';

$route['openfile'] = 'auth/notfound';
$route['export/openfile'] = 'auth/notfound';
