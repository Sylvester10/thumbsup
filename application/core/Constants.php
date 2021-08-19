<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ===== Documentation ===== 
Name: Constants::General
Role: Include
Description: Holds all the constants used by the app. Required in the construct of the core controller, MY_Controller, which makes it global to the entire application.
Date Created: 4th January, 2020
*/


$business_name = 'Thumbsup Initiative';
$business_initials = 'TUPI';
$business_phone_number = '+2348180476251';
$business_phone_number2 = '';
$business_phone_number3 = '';
$business_address = 'Ketu, Lagos, Nigeria';
$business_contact_email = 'tupinitiative@gmail.com';
$sub_tagline = 'Get yourself together';
$keywords = 'NGO, Charity, Non-profit, NGO in Nigeria, NGO in Africa, NGO in Lagos, Charity in Nigeria, Charity in Africa, Charity in Africa';
$business_description = "TUPI is a Youth Leadership Development initiative focused on raising competent individuals, hence leaders for our ever-evolving world.";


//Software Info
define('business_name', $business_name);
define('business_initials', $business_initials);
define('business_phone_number', $business_phone_number);
define('business_phone_number2', $business_phone_number2);
define('business_phone_number3', $business_phone_number3);
define('business_address', $business_address);
define('business_contact_email', $business_contact_email);
define('sub_tagline', $sub_tagline);
define('keywords', $keywords);
define('business_description', $business_description);
define('business_website', base_url());
define('business_logo', base_url('assets/img/thumbs_up_colored.svg'));
define('business_favicon', base_url('assets/icon.svg'));


//MySQL-PHP server time difference. Change to zero if both are on same server
define('mysql_time_difference', 0); //if negative, write as -x, else, x


//vendor
define('software_vendor_site', 'https://kodebro.com');
define('software_vendor', 'Kodebro');

//Email config
define('business_web_mail', business_contact_email); 


//defaults
define('default_admin_password', 'thumbsup212');


//Others
define('pdf_icon', base_url('assets/pdf_icon.png'));
define('user_avatar', base_url('assets/user.png'));