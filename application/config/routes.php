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
$route['getvalue'] = "Home/getvalue";
$route['enquiry'] = "Home/enquiry";
$route['reviews'] = "Home/reviews";
$route['product-list'] = "Home/product_list";
$route['product-add'] = "Home/product_add";

$route['logout'] = 'Home/logout';
$route['changePassword'] = 'Home/changePassword';
$route['search_contact'] = "Home/searchcontact";
$route['update-product/(:any)'] = 'home/update_product/$1';
