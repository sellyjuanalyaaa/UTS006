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
|	https://codeigniter.com/userguide3/general/routing.html
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

// Route default
$route['default_controller'] = 'peminjaman/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['auth'] = 'auth/index';
$route['auth/register'] = 'auth/register';
$route['auth/process_register'] = 'auth/process_register';
$route['auth/login'] = 'auth/login';
$route['auth/process_login'] = 'barang/index';
$route['auth/logout'] = 'auth/logout';

// Protected routes
$route['admin'] = "auth/login";
$route['admin/dashboard'] = 'barang/index';
$route['peminjam/dashboard'] = 'peminjaman/index';


// Routes untuk Barang
$route['barang'] = 'barang/index';
$route['barang/add'] = 'barang/add';
$route['barang/save'] = 'barang/save';
$route['barang/edit/(:num)'] = 'barang/edit/$1';
$route['barang/update/(:num)'] = 'barang/update/$1';
$route['barang/delete/(:num)'] = 'barang/delete/$1';

// Routes untuk Kategori
$route['kategori'] = 'kategori/index';
$route['kategori/add'] = 'kategori/add';
$route['kategori/save'] = 'kategori/save';
$route['kategori/edit/(:num)'] = 'kategori/edit/$1';
$route['kategori/update/(:num)'] = 'kategori/update/$1';
$route['kategori/delete/(:num)'] = 'kategori/delete/$1';

// Routes untuk Peminjaman
$route['peminjaman'] = 'peminjaman/index';
$route['peminjaman/add'] = 'peminjaman/add';
$route['peminjaman/save'] = 'peminjaman/save';
$route['peminjaman/kembalikan/(:num)'] = 'peminjaman/kembalikan/$1';
$route['peminjaman/laporan'] = 'peminjaman/laporan';
$route['peminjaman/cetak'] = 'peminjaman/cetak';
$route['peminjaman/pdf'] = 'peminjaman/pdf';



// Route untuk autocomplete (jika diperlukan)
$route['api/barang'] = 'api/barang';