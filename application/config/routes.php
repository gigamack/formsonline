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
//$route['student/dashboard'] = 'FormControl/stdMain';
//$route['from/(:type)'] = 'FormCaller/index/$1';
//$route['(:any)/form/(:any)'] = 'FormCaller/new/$1/$2';

$route['dashboard'] = 'Dashboard/index';
$route['admin/dashboard'] = 'FormControl/stdCardFormAdmin';

/// STUDENT FORMS ////
$route['form/requestmorecredits']['get'] = 'Forms/RequestMoreLessCredits';
$route['form/requestmorecredits']['post'] = 'Forms/RequestMoreLessCredits';
$route['form/requesttemporarystudentcard']['get'] = 'Forms/RequestTemporaryStudentCard';
$route['form/requesttemporarystudentcard']['post'] = 'Forms/RequestTemporaryStudentCard/insert';
$route['form/requestnamechanging']['get'] = 'Forms/RequestNameChanging';
$route['form/requestnamechanging']['post'] = 'Forms/RequestNameChanging/insert';
$route['form/requestgraduate']['get'] = 'Forms/RequestGraduate';
$route['form/requestgraduate']['post'] = 'Forms/RequestGraduate/insert';
$route['form/requestmastergraduate']['get'] = 'Forms/RequestMasterGraduate';
$route['form/requestmastergraduate']['post'] = 'Forms/RequestMasterGraduate/insert';
$route['form/requestdebtinvestigate']['get'] = 'Forms/RequestDebtInvestigate';
$route['form/requestdebtinvestigate']['post'] = 'Forms/RequestDebtInvestigate/insert';
$route['form/requestcertificate']['get'] = 'Forms/RequestCertificate';
$route['form/requestcertificate']['post'] = 'Forms/RequestCertificate/insert';
$route['form/requestcoursetransfer']['get'] = 'Forms/RequestCourseTransfer';
$route['form/requestcoursetransfer']['post'] = 'Forms/RequestCourseTransfer/insert';

$route['form/requesttuitionfeerefund']['get'] = 'Forms/RequestTuitionFeeRefund';
$route['form/requesttuitionfeerefund']['post'] = 'Forms/RequestTuitionFeeRefund/insert';

/////// EDIT FORM /////////
$route['form/edit/(:any)'] = 'Dashboard/Edit/$1';
$route['form/requesttemporarystudentcard/edit/(:any)'] = 'Forms/RequestTemporaryStudentCard/edit/$1';
$route['form/requestnamechanging/edit/(:any)'] = 'Forms/RequestNameChanging/edit/$1';
$route['form/requestmorecredits/edit/(:any)'] = 'Forms/RequestMoreLessCredits/edit/$1';
$route['form/requestmastergraduate/edit/(:any)'] = 'Forms/RequestMasterGraduate/edit/$1';
$route['form/requestgraduate/edit/(:any)'] = 'Forms/RequestGraduate/edit/$1';
$route['form/requestdebtinvestigate/edit/(:any)'] = 'Forms/RequestDebtInvestigate/edit/$1';
$route['form/requestcoursetransfer/edit/(:any)'] = 'Forms/RequestCourseTransfer/edit/$1';
$route['form/requestcertificate/edit/(:any)'] = 'Forms/RequestCertificate/edit/$1';
/////////////////////////


///////// DELETE FORM ////////////////
$route['form/delete/(:any)'] = 'Dashboard/Delete/$1';
$route['form/requesttemporarystudentcard/delete/(:any)'] = 'Forms/RequestTemporaryStudentCard/delete/$1';
$route['form/requestnamechanging/delete/(:any)'] = 'Forms/RequestNameChanging/delete/$1';
$route['form/requestmorecredits/delete/(:any)'] = 'Forms/RequestMoreLessCredits/delete/$1';
$route['form/requestmastergraduate/delete/(:any)'] = 'Forms/RequestMasterGraduate/delete/$1';
$route['form/requestgraduate/delete/(:any)'] = 'Forms/RequestGraduate/delete/$1';
$route['form/requestdebtinvestigate/delete/(:any)'] = 'Forms/RequestDebtInvestigate/delete/$1';
$route['form/requestcoursetransfer/delete/(:any)'] = 'Forms/RequestCourseTransfer/delete/$1';
$route['form/requestcertificate/delete/(:any)'] = 'Forms/RequestCertificate/delete/$1';


//////// UPDATE /////////////
$route['form/update/(:any)'] = 'Dashboard/Update/$1';
$route['form/requesttemporarystudentcard/update/(:any)'] = 'Forms/RequestTemporaryStudentCard/update/$1';
$route['form/requestnamechanging/update/(:any)'] = 'Forms/RequestNameChanging/update/$1';
$route['form/requestmorecredits/update/(:any)'] = 'Forms/RequestMoreLessCredits/update/$1';
$route['form/requestmastergraduate/update/(:any)'] = 'Forms/RequestMasterGraduate/update/$1';
$route['form/requestgraduate/update/(:any)'] = 'Forms/RequestGraduate/update/$1';
$route['form/requestdebtinvestigate/update/(:any)'] = 'Forms/RequestDebtInvestigate/update/$1';
$route['form/requestcoursetransfer/update/(:any)'] = 'Forms/RequestCourseTransfer/update/$1';
$route['form/requestcertificate/update/(:any)'] = 'Forms/RequestCertificate/update/$1';

/////// VIEW ////////////////
$route['form/view/(:any)'] = 'Dashboard/Get/$1';
$route['form/requesttemporarystudentcard/view/(:any)'] = 'Forms/RequestTemporaryStudentCard/get/$1';
$route['form/requestnamechanging/view/(:any)'] = 'Forms/RequestNameChanging/get/$1';
$route['form/requestmorecredits/view/(:any)'] = 'Forms/RequestMoreLessCredits/get/$1';
$route['form/requestmastergraduate/view/(:any)'] = 'Forms/RequestMasterGraduate/get/$1';
$route['form/requestgraduate/view/(:any)'] = 'Forms/RequestGraduate/get/$1';
$route['form/requestdebtinvestigate/view/(:any)'] = 'Forms/RequestDebtInvestigate/get/$1';
$route['form/requestcoursetransfer/view/(:any)'] = 'Forms/RequestCourseTransfer/get/$1';
$route['form/requestcertificate/view/(:any)'] = 'Forms/RequestCertificate/get/$1';


//////// ADMIN ////////
$route['form/admin/requestcoursetransfer/approve/(:any)'] = 'Admin/RequestCourseTransfer/approve/$1';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
