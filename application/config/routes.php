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
<<<<<<< HEAD
$route['default_controller'] = 'PageController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// user
$route["user/login"] = 'UserController/login';
$route["user/validate_account"] = 'UserController/validate_account';
$route["user/dashboard"] = 'UserController/dashboard';
$route["user/logout"] = 'UserController/logout';

// page routes
$route["/"] = 'PageController';
$route["about-us"] = 'PageController/about';
$route["question-and-answer"] = 'PageController/question_and_answer';
$route["contact-us"] = 'PageController/contact_us';
=======
// $route['default_controller'] = 'welcome';

$route['login']                         = 'MainController/login';
$route['process-login']                 = 'MainController/processLogin';



// ADMIN ROUTES
$route['admin']                         = 'AdminController';
$route['admin/profile']                 = 'AdminController/viewProfile';
$route['admin/update-profile']          = 'AdminController/updateProfile';

// $route['admin/login']                   = 'MainController/adminLogin';
// $route['admin/process-login']           = 'MainController/adminProcessLogin';
// $route['admin/logout']                  = 'MainController/adminlogout';

// EMAIL MODULE
$route['admin/create-email']            = 'AdminController/createEmail';
$route['admin/get-email']               = 'AdminController/getEmail';
$route['admin/delete-email/(:num)']     = 'AdminController/deleteEmail/$1';
$route['admin/update-email']            = 'AdminController/updateEmail';
$route['admin/search-email']            = 'AdminController/searchEmail';

// USERS MODULE
$route['admin/user']                    = 'AdminController/user';
$route['admin/create-user']             = 'AdminController/createUser';
$route['admin/delete-user/(:num)']      = 'AdminController/deleteUser/$1';
$route['admin/update-user']             = 'AdminController/updateUser';
$route['admin/user-list']               = 'AdminController/userList';
$route['admin/search-user']             = 'AdminController/searchUser';


// SMTP MODULE
$route['admin/smtp']                    = 'AdminController/smtp';




//SAMPLE
$route['admin/sample']                  = 'AdminController/sample';

//USER ROUTES
$route['default_controller']            = 'UserController';
$route['user-process-login']            = 'MainController/userProcessLogin';
$route['logout']                        = 'MainController/logout';
$route['get-email']                     = 'UserController/getEmail';
$route['profile']                       = 'UserController/viewProfile';
$route['update-profile']                = 'UserController/updateProfile';


$route['access-denied']                 = 'MainController/accessDenied';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
>>>>>>> 83438cca80510e95c9c94b68125924ed868f465e
