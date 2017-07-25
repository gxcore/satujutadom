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

//$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['default_controller'] = 'pages/view';
/*
$route['dashboard/get_facilitator'] = 'dashboard/view_facilitator';
$route['dashboard/get_requestor'] = 'dashboard/view_requestor';
$route['dashboard/get_provinces'] = 'dashboard/view_location';
$route['dashboard/insert_facilitator'] = 'dashboard/insert_facilitator';
$route['dashboard/insert_requestor'] = 'dashboard/insert_requestor';
$route['dashboard/insert_provinces'] = 'dashboard/insert_provinces';
$route['dashboard/edit_facilitator'] = 'dashboard/edit_facilitator';
<<<<<<< HEAD
$route['dashboard/edit_requestor'] = 'dashboard/edit_requestor';
$route['dashboard/edit_provinces'] = 'dashboard/edit_provinces';
$route['dashboard/(:any)'] = 'dashboard/view/$1';
$route['dashboard'] = 'dashboard/view';
=======
$route['dashboard/edit_requestor'] = 'dashboard/edit_requestor'; */
//$route['dashboard/(:any)'] = 'pages/view/dashboard/$1';
//$route['dashboard'] = 'dashboard/view';
$route['admin/(:any)'] = 'pages/view/admin/$1';
>>>>>>> 3ae5bda43934ba5f7bf4c53db43f60897df186a5
$route['(:any)'] = 'pages/view/$1';