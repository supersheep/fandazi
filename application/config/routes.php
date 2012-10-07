<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "main";
$route['404_override'] = '';


$route['meal/(:num)/discuss/create'] = "mealdiscuss/create/$1";
$route['meal/(:num)/discuss/(:num)'] = "mealdiscuss/show/$1/$2";

$route['meal/(:num)'] = "meal/show/$1";
$route['meal/(:num)/upload_poster'] = "meal/upload_poster/$1";

$route['user/(:num)'] = "user/show/$1";


$route['msg/mail'] = "msg/mail_inbox"; 
$route['msg/mail/outbox'] = "msg/mail_outbox"; 
$route['msg/mail/(:num)'] = "msg/mail_show/$1";
$route['msg/mail/new'] = "msg/mail_new"; 

/* End of file routes.php */
/* Location: ./application/config/routes.php */