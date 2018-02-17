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
$route['default_controller'] = 'welcome';
$route['addproject']= 'project_con/addproject';
$route['add_project'] = 'project_con/add_project';
$route['viewproject'] = 'project_con/viewproject';
$route['editproject/(:any)'] = 'project_con/editproject';
$route['edit_project/(:any)'] = 'project_con/edit_project';
$route['viewproject/(:any)'] = 'project_con/viewproject';




$route['last_project'] = 'project_con/last_project';
$route['last_task'] = 'Request_con/last_task';
$route['addasset'] = 'asset_con/addasset';
$route['add_asset'] = 'asset_con/add_asset';
$route['viewasset'] = 'asset_con/viewasset';
$route['viewasset/(:any)'] = 'asset_con/viewasset';
$route['editasset/(:any)'] = 'asset_con/editasset';
$route['edit_asset/(:any)'] = 'asset_con/edit_asset';

$route['searching'] = 'Member_con/searching';


$route['addrequest'] = 'Request_con/addrequest';
$route['add_request'] = 'Request_con/add_request';
$route['viewrequest'] = 'Request_con/viewrequest';
$route['viewrequest/(:any)'] = 'Request_con/viewrequest';
$route['editrequest/(:any)'] = 'Request_con/editrequest';
$route['edit_request/(:any)'] = 'Request_con/edit_request';
$route['viewtemplate/(:any)'] = 'Request_con/viewtemplate';
$route['getassetoption'] = 'Request_con/getassetoption';



$route['addmember'] = 'Member_con/addmember';
$route['add_member'] = 'Member_con/add_member';
$route['viewmember'] = 'Member_con/viewmember';
$route['viewmember/(:any)'] = 'Member_con/viewmember';

$route['editmember/(:any)'] = 'Member_con/editmember';
$route['edit_member/(:any)'] = 'Member_con/edit_member';

$route['addvalue'] = 'Addvalue_con/addvalue';
$route['add_value'] = 'Addvalue_con/add_value';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
