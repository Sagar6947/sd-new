<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['search'] = "Home/search";
$route['login'] = "Home/login";
$route['signup'] = "Home/register";
$route['my-profile'] = "Home/my_profile";
$route['choose-vcard'] = "Home/choose_vcard";
$route['dashboard'] = "Home/dashboard";
$route['logout'] = 'Home/logout';
$route['search_contact'] = "Home/searchcontact";

// $route['blogdetails/(:any)/(:any)'] = 'home/blog/$1/$2';

