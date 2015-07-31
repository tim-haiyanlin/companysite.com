<?php
/**
 * Testimonials Manager
 *
 * @package Template System
 * @copyright 2007 Clyde Jones
  * @copyright Portions Copyright 2003-2007 Zen Cart Development Team
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Testimonials_Manager.php v1.5.4
 */

define('NAVBAR_TITLE', 'Add My Testimonial');
define('HEADING_ADD_TITLE', '<h1>Add My Testimonial</h1>');

define('TESTIMONIAL_SUCCESS', 'Your testimonial has been successfully submitted and will be added to our other testimonials as soon as we approve it.');

define('TESTIMONIAL_SUBMIT', 'Submit your testimonial using the form below.');


//////////////
define('EMAIL_SUBJECT', 'Your Testimonial Submission At ' . STORE_NAME . '.');
define('EMAIL_GREET_NONE', 'Dear %s' . "\n\n");
define('EMAIL_WELCOME', 'Thanks for your tesminonial submission at <strong>' . STORE_NAME . '</strong>.' . "\n\n");
define('EMAIL_TEXT', 'Your testimonial has been successfully submitted at ' . STORE_NAME . '. It will be added to our other testimonials as soon as we approve it. You will receive an email about the status of your submittal. If you have not received it within the next 48 hours, please contact us before submitting your testimonial again.' . "\n\n");
define('EMAIL_CONTACT', 'For help with your testimonial submission, please contact us: ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n\n");
define('EMAIL_WARNING', '<b>Note:</b> This email address was given to us during a testimonial submission. If you have a problem, please send an email to ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n");
define('EMAIL_OWNER_SUBJECT', 'Testimonial submission at ' . STORE_NAME);
define('SEND_EXTRA_TESTIMONIALS_ADD_SUBJECT', '[TESTIMONIAL SUBMISSION]');
define('EMAIL_OWNER_TEXT', 'A new testimonial was submitted at ' . STORE_NAME . '. It is not yet approved. Please verify this testimonial and activate.' . "\n\n");
define('EMAIL_GV_CLOSURE','Sincerely,' . "\n\n" . STORE_OWNER . "\nStore Owner\n\n". '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '">'.HTTP_SERVER . DIR_WS_CATALOG ."</a>\n\n");
define('EMAIL_DISCLAIMER_NEW_CUSTOMER', 'This testimonial was submitted to us by you or by one of our users. If you did not submit a testimonial, or feel that you have received this email in error, please send an email to %s ');


////////////////
define('TABLE_HEADING_TESTIMONIALS', 'Customer Testimonials');
define('TESTIMONIAL_CONTACT', 'Contact Information');

define('TEXT_TESTIMONIALS_TITLE', 'Testimonial Title:&nbsp;');
define('TEXT_TESTIMONIALS_NAME', 'Your Name:&nbsp;');
define('TEXT_TESTIMONIALS_MAIL', 'Your Email:&nbsp;');
define('TEXT_TESTIMONIALS_COMPANY', 'Company Name:&nbsp;');
define('TEXT_TESTIMONIALS_CITY', 'City:&nbsp;');
define('TEXT_TESTIMONIALS_COUNTRY', 'State or Country:&nbsp;');
define('TEXT_TESTIMONIALS_HTML_TEXT', 'Testimonial');
define('TEXT_TESTIMONIALS_DESCRIPTION', 'Testimonial Text:&nbsp;');
define('TEXT_TESTIMONIALS_DESCRIPTION_INFO', 'Testimonial Text must be between ' . ENTRY_TESTIMONIALS_TEXT_MIN_LENGTH . ' &amp; ' . ENTRY_TESTIMONIALS_TEXT_MAX_LENGTH . ' characters!');
define('TEXT_CAPTCHA_INFO', '<div class="testimonialsSmallText">Verification Code is case insensitive</div>');

define('RETURN_REQUIRED_INFORMATION', ' = Required Information<br />');
define('RETURN_OPTIONAL_INFORMATION', ' = Optional Information');
define('RETURN_OPTIONAL_IMAGE','optional.png');
define('RETURN_OPTIONAL_IMAGE_ALT', 'optional information');
define('RETURN_OPTIONAL_IMAGE_HEIGHT', '12');
define('RETURN_OPTIONAL_IMAGE_WIDTH', '12');
define('RETURN_REQUIRED_IMAGE', 'required.png');
define('RETURN_REQUIRED_IMAGE_ALT', 'required information');
define('RETURN_REQUIRED_IMAGE_HEIGHT', '12');
define('RETURN_REQUIRED_IMAGE_WIDTH', '12');
define('RETURN_WARNING_IMAGE', 'exclamation.gif');
define('RETURN_WARNING_IMAGE_ALT', 'warning');
define('RETURN_WARNING_IMAGE_HEIGHT', '16');
define('RETURN_WARNING_IMAGE_WIDTH', '16');

define('TEXT_TESTIMONIAL_LOGIN_PROMPT','You are required to login or create an account in order to submit a testimonial');
define('ERROR_TESTIMONIALS_NAME_REQUIRED', '<div class="testimonialsError">Your Name is Required!</div>');
define('ERROR_TESTIMONIALS_EMAIL_REQUIRED', '<div class="testimonialsError">You Must include your E-mail address!</div>');
define('ERROR_TESTIMONIALS_TITLE_REQUIRED', '<div class="testimonialsError">A Testimonial Title is Required!</div>');
define('ERROR_TESTIMONIALS_DESCRIPTION_REQUIRED', '<div class="testimonialsError">Testimonial is Required!</div>');
define('ERROR_TESTIMONIALS_TEXT_MAX_LENGTH', '<div class="testimonialsError">Less than ' . ENTRY_TESTIMONIALS_TEXT_MAX_LENGTH . ' characters!</div>');
define('ERROR_TESTIMONIALS', 'Errors have occured on your submission! Please correct and re-submit!');
//EOF