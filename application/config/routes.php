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
$route['default_controller'] = 'User';
$route['user-register'] = 'User/userRegister';

$route['cost-calculation'] = 'User/cost_calculation';
$route['product'] = 'User/product';
$route['Profile-Page'] = 'User/Profile_page';
$route['product-details'] = 'User/product_details';
// $route['product-details/(:any)'] = 'User/product_details/$1';
$route['product-details/(:any)/(:any)'] = 'User/product_details/$1/$2';
$route['faq'] = 'User/faq';
$route['safety'] = 'User/safety';
$route['terms_and_condition'] = 'User/terms_and_condition';
// $route['pagenotfound404'] = 'User/pagenotfound404';

$route['404_override'] = 'User/pagenotfound404';

$route['email-verefy'] = 'User/email_verefy';
$route['login'] = 'User/login';
$route['password'] = 'User/password';
$route['sign-up'] = 'User/sign_up';
$route['otp'] = 'User/otp';
$route['about'] = 'User/about';
$route['contact_us'] = 'User/contact_us';
$route['my_account'] = 'User/my_account';

$route['admin-login'] = 'Adminpanel/admin_login';
$route['dashboard'] = 'Adminpanel/dashboard';
$route['manage-cities'] = 'Adminpanel/manage_cities';
$route['manage-branch'] = 'Adminpanel/manage_branch';
$route['manage-manufacturer'] = 'Adminpanel/manage_manufacturer';
$route['manage-type'] = 'Adminpanel/manage_type';
$route['manage-models'] = 'Adminpanel/manage_models';
$route['manage-models-at-branch'] = 'Adminpanel/manage_models_at_branch';
$route['manage-models-branch-create'] = 'Adminpanel/manage_models_branch_create';
$route['manage-coupon-create'] = 'Adminpanel/manage_coupon_create';
$route['manage-orders-list'] = 'Adminpanel/manage_order_list';
$route['manage-user-list'] = 'Adminpanel/manage_user_list';
$route['terms-&-condition'] = 'User/terms_and_condition';
$route['terms_and_condition'] = 'Adminpanel/terms_and_condition';
$route['inventory-management'] = 'Adminpanel/inventory_management';
$route['crate-inventory-management'] = 'Adminpanel/crate_inventory_management';
$route['about-us'] = 'Adminpanel/about_us';
$route['contact-us'] = 'Adminpanel/contact_us';
$route['upcoming-orders-list'] = 'Adminpanel/upcoming_order_list';
$route['running-orders-list'] = 'Adminpanel/running_order_list';
$route['complete-orders-list'] = 'Adminpanel/complete_order_list';

//  API ROUTES
$route['api/register'] = 'Api/signUp';
$route['api/login'] = 'Api/Login';
$route['api/sent-register-otp'] = 'Api/SentOtp';
$route['api/forget-password-otp'] = 'Api/forgetPasswordOtp';
$route['api/update-password'] = 'Api/updatePassword';
$route['api/change-password'] = 'Api/changePassword';
$route['api/update-profile'] = 'Api/updateProfile';
$route['api/profile'] = 'Api/profile';
$route['api/profile/(:any)'] = 'Api/profile/$1';
$route['api/upload-ride-document'] = 'Api/uploadRideDocument';
$route['api/get-city'] = 'Api/getCity';
$route['api/get-all-bikes'] = 'Api/getAllBikes';
$route['api/search-bike-by-city'] = 'Api/searchBikeByCity';
$route['api/calculate-price'] = 'Api/priceCalculation';
// $route['api/profile/(:any)'] = 'Api/profile/$1';
$route['api/booking-history/(:any)'] = 'Api/bookingHistory/$1';
$route['api/get-booking-detail/(:any)'] = 'Api/getBookingDetail/$1';

$route['translate_uri_dashes'] = FALSE;
