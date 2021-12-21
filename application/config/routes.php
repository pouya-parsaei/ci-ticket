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
$route['default_controller'] = 'Authentication';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['dashboard/logout'] = 'Dashboard/logout';
$route['dashboard'] = 'Dashboard/index';
$rout['profile/edit'] ='Profile/edit';

$route['ticket/create-new-ticket'] =  'Ticket/createNewTicket';
$route['ticket/add-ticket'] = 'Ticket/store';
$route['ticket/tickets-list'] = 'Ticket/showTicketsList';
$route['ticket/show-ticket/(:num)'] =  'Ticket/showTicket/$1';
$route['ticket/create-answer/(:num)'] =  'Ticket/storeTicketAnswer/$1';
$route['ticket/close-ticket/(:num)'] = 'Ticket/closeTicket';

$route['admin/support/add-support'] = 'Support/add';
$route['admin/support/create-new-support'] = 'Support/store';
$route['admin/support/all'] = 'Support/showSupportsList';
$route['admin/support/toggle-status/(:num)'] = 'Support/toggleSupportStatus/$1';
$route['admin/support/edit/(:num)'] = 'Support/edit/$1';
$route['admin/support/update/(:num)'] = 'Support/update/$1';

$route['admin/users-list'] = 'User/showAll';
$route['admin/tickets-list'] = 'Admin/showAllTickets';
$route['admin/tickets-list/(:num)'] = 'Admin/showAllTickets/$1';
$route['admin/user/toggle-user-status/(:num)'] = 'User/toggleStatus/$1';

$route['admin/department/create'] =  'Department/create_department';
$route['admin/department/list'] =  'Department/departmentsList';
$route['admin/department/delete/(:num)'] =  'Department/deleteDepartment/$1';
$route['admin/department/rename/(:num)'] =  'Department/renameDepartment/$1';
$route['admin/department/toggle/(:num)'] =  'Department/toggleDepartmentStatus/$1';

$route['support/dashboard'] = 'User_Support/index';
$route['support/unread-tickets'] = 'User_Support/showUnreadTickets';
$route['support/red-tickets'] = 'User_Support/showRedTickets';

