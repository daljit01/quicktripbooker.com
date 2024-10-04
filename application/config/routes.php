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
$route['packages'] = 'package';
$route['search-package-lookup'] = 'package/search_package_lookup';
// $route['hotel-details/(:any)'] = 'hotel/hotel_details/$1';
// $route['hotel-city-suggestion'] = 'hotel/hotelcitysuggestion';
// $route['send-hotel-booking-offer'] = 'hotel/send_hotel_booking_offer';

$route['hotel'] = 'hotel';
$route['search-hotel-lookup'] = 'hotel/search_hotel_lookup';
$route['hotel-details/(:any)'] = 'hotel/hotel_details/$1';
$route['hotel-city-suggestion'] = 'hotel/hotelcitysuggestion';
$route['send-hotel-booking-offer'] = 'hotel/send_hotel_booking_offer';


$route['booking-confirmation/(:any)'] = 'welcome/booking_confirmation/$1';
$route['create-flight-booking'] = 'flight/create_flight_booking';
$route['airport-city-lookup'] = 'flight/getairportcitylookup';
$route['search-flight-lookup'] = 'flight';
$route['flight-prepared-booking'] = 'flight/flight_prepared_booking';
$route['review-flight'] = 'flight/review_flight';
$route['save-flight-info'] = 'flight/save_flight_info';


// $route['save-reset-password'] = 'customer/save_reset_password';
// $route['reset-password/(:any)'] = 'customer/reset_password/$1';
// $route['send-reset-password'] = 'customer/send_reset_password';
// $route['forget-password'] = 'customer/forget_password';
// $route['register-customer'] = 'customer/register_customer';
// $route['do-login'] = 'customer/do_login';
// $route['logout'] = 'customer/logout';
// $route['login'] = 'customer/login';
// $route['signup'] = 'customer/signup';
// $route['dashboard'] = 'customer/dashboard';
// $route['myprofile'] = 'customer/myprofile';
// $route['save-password-change'] = 'customer/save_password_change';
// $route['changepassword'] = 'customer/changepassword';
// $route['mybooking'] = 'customer/mybooking';
// $route['myhotelbooking'] = 'customer/myhotelbooking';
// $route['viewbooking/(:any)'] = 'customer/viewbooking/$1';
// $route['update-profie'] = 'customer/update_profie';


$route['register'] = 'welcome/register';
$route['sprite-airlines'] = 'welcome/sprite_airlines';
$route['southwest-airlines'] = 'welcome/southwest_airlines';
$route['jetBlue-airlines'] = 'welcome/jetBlue_airlines';
$route['hawaii-airlines'] = 'welcome/hawaii_airlines';
$route['frontiar-airlines'] = 'welcome/frontiar_airlines';
// $route['delta-airlines'] = 'welcome/delta_airlines';
$route['american-airlines'] = 'welcome/american_airlines';
$route['air-canada'] = 'welcome/air_canada';
$route['Westjet'] = 'welcome/Westjet';
$route['Lufthansa'] = 'welcome/Lufthansa';
$route['Qatar'] = 'welcome/Qatar';
$route['Turkish'] = 'welcome/Turkish';
$route['British'] = 'welcome/British';
$route['allegient-airlines'] = 'welcome/allegient_airlines';
$route['alaska-airlines'] = 'welcome/alaska_airlines';
$route['chicago'] = 'welcome/chicago';
$route['houston'] = 'welcome/houston';
$route['atlanta'] = 'welcome/atlanta';
$route['Savannah'] = 'welcome/Savannah';
$route['philadelphia'] = 'welcome/philadelphia';
$route['Kitchener'] = 'welcome/Kitchener';
$route['lake-tahoe'] = 'welcome/lake_tahoe';
$route['austin'] = 'welcome/austin';
$route['montreal'] = 'welcome/montreal';
$route['seattle'] = 'welcome/seattle';
$route['calgary'] = 'welcome/calgary';
$route['massachusetts'] = 'welcome/massachusetts';
$route['hotel-flight'] = 'welcome/hotelflight';


$route['refund-policy'] = 'welcome/refund_policy';
$route['taxes-and-fees'] = 'welcome/taxes_and_fees';
$route['disclaimer'] = 'welcome/disclaimer';
$route['online-check-in'] = 'welcome/online_check_in';
$route['terms-and-conditions'] = 'welcome/terms_and_conditions';
$route['privacy-policy'] = 'welcome/privacy_policy';
$route['contact'] = 'welcome/contact';
$route['about'] = 'welcome/about';
$route['hotel'] = 'welcome/hotel';
$route['flight'] = 'welcome/flight';
$route['thank-you'] = 'welcome/thank_you';
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// $route['blogs'] = 'welcome/blogs';
$route['blog/(:any)/(:any)']  = 'welcome/blogs/$1/$2';
$route['blog']  = 'welcome/blogs';
$route['blog/(:any)'] = 'welcome/blog_detail/$1';
$route['searchByCategory/(:any)'] = 'welcome/searchByCategory/$1';
$route['searchByTag/(:any)'] = 'welcome/searchByTag/$1';
$route['searchBysubject'] = 'welcome/searchBysubject';
$route['blogPagination'] = 'welcome/blogPagination';
//$route['blog/(:any)'] = 'welcome/blogDetails/$1';
