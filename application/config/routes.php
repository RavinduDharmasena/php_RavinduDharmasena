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
$route['default_controller'] = 'TeamController';
$route['team']['GET'] = 'TeamController/viewManageTeams';
$route['team/(:num)']['POST'] = 'TeamController/getTeamData';
$route['team/delete/(:num)']['POST'] = 'TeamController/deleteTeamById';
$route['team/update/(:num)']['POST'] = 'TeamController/updateTeamById';
$route['team']['POST'] = 'TeamController/addTeams';

$route['member']['GET'] = 'MemberController/viewManageMembers';
$route['member/(:num)']['POST'] = 'MemberController/getMemberData';
$route['member/team/(:num)']['POST'] = 'MemberController/getMembersByTeamId';
$route['member/delete/(:num)']['POST'] = 'MemberController/deleteMemberById';
$route['member/update/(:num)']['POST'] = 'MemberController/updateMemberById';
$route['member']['POST'] = 'MemberController/addMembers';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['comment']['GET'] = 'CommentController/viewManageComments';
$route['comment/(:num)']['POST'] = 'CommentController/getCommentData';
$route['comment/delete/(:num)']['POST'] = 'CommentController/deleteCommentById';
$route['comment/update/(:num)']['POST'] = 'CommentController/updateCommentById';
$route['comment']['POST'] = 'CommentController/addComments';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
