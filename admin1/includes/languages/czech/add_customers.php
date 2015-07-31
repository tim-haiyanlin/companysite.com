<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003 The zen-cart developers                           |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// |                                                                      |
// | Portions Copyright (c) 2003 osCommerce                               |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
//  $Id: customers.php 4133 2006-08-14 00:37:30Z drbyte $
//
//  $Id: add_customers.php 0001 2007-01-17 aerodynamic_hippo $
//  add_customers module modified version of customers.php
/**
 * add_customers module modified by Garden 2012-07-20
 * www.inzencart.cz Czech forum for ZenCart
 *
 */

define('HEADING_TITLE', 'Z�kazn�ci');

define('TABLE_HEADING_ID', 'ID#');
define('TABLE_HEADING_FIRSTNAME', 'Jm�no');
define('TABLE_HEADING_LASTNAME', 'P��jmen�');
define('TABLE_HEADING_ACCOUNT_CREATED', '��et vytvo�en');
define('TABLE_HEADING_LOGIN', 'Posledn� p�ihl�en�');
define('TABLE_HEADING_ACTION', 'Akce');
define('TABLE_HEADING_PRICING_GROUP', 'Cenov� skupina');
define('TABLE_HEADING_AUTHORIZATION_APPROVAL', 'Autorizovan�');

define('TEXT_DATE_ACCOUNT_CREATED', '��et vytvo�en:');
define('TEXT_DATE_ACCOUNT_LAST_MODIFIED', 'Posledn� zm�na:');
define('TEXT_INFO_DATE_LAST_LOGON', 'Posledn� p�ihl�en�:');
define('TEXT_INFO_NUMBER_OF_LOGONS', 'Po�et p�ihl�en�:');
define('TEXT_INFO_COUNTRY', 'Zem�:');
define('TEXT_INFO_NUMBER_OF_REVIEWS', 'Po�et recenz�:');
define('TEXT_DELETE_INTRO', 'Jste si jisti, �e chcete smazat tohoto z�kazn�ka?');
define('TEXT_DELETE_REVIEWS', 'Smazat %s recenze');
define('TEXT_INFO_HEADING_DELETE_CUSTOMER', 'odstranit z�kazn�ka');
define('TYPE_BELOW', 'zadejte n�e');
define('PLEASE_SELECT', 'Vyberte');
define('TEXT_INFO_NUMBER_OF_ORDERS', 'Po�et objedn�vek:');
define('TEXT_INFO_LAST_ORDER','Posledn� objedn�vka:');
define('TEXT_INFO_ORDERS_TOTAL', 'Celkem:');
define('CUSTOMERS_REFERRAL', 'Z�kaznick� doporu�en�<br />Prvn� slevov� kup�n');

define('ENTRY_NONE', '��dn�');

define('TABLE_HEADING_COMPANY','spole�nost');

define('CUSTOMERS_AUTHORIZATION', 'Stav autorizace');
define('CUSTOMERS_AUTHORIZATION_0', 'Schv�len�');
define('CUSTOMERS_AUTHORIZATION_1', '�ek� na schv�len� - pro prohl�en� mus� b�t atorizov�n');
define('CUSTOMERS_AUTHORIZATION_2', '�ek� na schv�len� - m��e prohl�et. ale bez cen');
define('CUSTOMERS_AUTHORIZATION_3', '�ek� na schv�len� - m��e prohl�et �etn� cen. ale nem��e nakupovat');
define('ERROR_CUSTOMER_APPROVAL_CORRECTION1', 'Upozorn�n�: Obchod nelze bez opr�vn�n� prohl�et. Z�kazn�k m� nastaveno - �ek� na schv�len�/neprohl�et');
define('ERROR_CUSTOMER_APPROVAL_CORRECTION2', 'Upozorn�n�: Obchod lze prohl�et, ale bez cen. Z�kazn�k m� nastaveno - �ek� na schv�len�/prohl�et bez cen');

define('EMAIL_CUSTOMER_STATUS_CHANGE_MESSAGE', 'V� z�kaznick� stav byl aktualizov�n. D�kujeme V�m za n�kup. T��me se na Va�e dal�� n�kupy.');
define('EMAIL_CUSTOMER_STATUS_CHANGE_SUBJECT', 'Stav z�kazn�ka byl aktualizov�n');

define('CATEGORY_PASSWORD', 'Heslo');
define('CATEGORY_EMAIL', 'Uv�tac� e-mail');
define('ENTRY_PASSWORD_CONFIRM_ERROR','Hesla nesouhlas�, zkuste to pros�m znovu.');

define('ENTRY_PASSWORD', 'Heslo:');
define('ENTRY_CONFIRM_PASSWORD', 'Potvrdit heslo:');
define('ENTRY_EMAIL', 'Poslat z�kazn�kovi uv�tac� e-mail');

// greeting salutation
define('EMAIL_SUBJECT', 'V�tejte v ' . STORE_NAME);
define('EMAIL_GREET_MR', 'V�en� pane %s,' . "\n\n");
define('EMAIL_GREET_MS', 'V�en� sle�no,pan� %s,' . "\n\n");
define('EMAIL_GREET_NONE', 'V�en�(�) %s' . "\n\n");

// First line of the greeting
define('EMAIL_WELCOME', 'R�di bychom V�s p�iv�tali na <strong>' . STORE_NAME . '</strong>.');
define('EMAIL_SEPARATOR', '--------------------');
define('EMAIL_COUPON_INCENTIVE_HEADER', 'Gratulujeme! Uv�d�me d�le �daje pro slevov� kup�n vytvo�en�(�} pr�v� pro v�s!' . "\n\n");
// your Discount Coupon Description will be inserted before this next define
define('EMAIL_COUPON_REDEEM', ' Chcete-li pou��t slevov� kup�n, zadejte ' . TEXT_GV_REDEEM . ' k�d v pokladn�:  <strong>%s</strong>' . "\n\n");

define('EMAIL_GV_INCENTIVE_HEADER', 'Jen za n�v�t�vu dnes jsme v�m poslali ' . TEXT_GV_NAME . ' pro %s!' . "\n");
define('EMAIL_GV_REDEEM', ' ' . TEXT_GV_NAME . ' ' . TEXT_GV_REDEEM . ' je: %s ' . "\n\n" . 'M��ete zadat ' . TEXT_GV_REDEEM . ' v�b�r p�i pr�chodu pokladnou v obchod�.');
define('EMAIL_GV_LINK', ' nebo m��ete uplatnit hned pomoc� n�sleduj�c�ho odkazu:' . "\n");
// GV link will automatically be included before this line

define('EMAIL_GV_LINK_OTHER','Po p�id�n� ' . TEXT_GV_NAME . ' k va�emu ��tu, m��ete pou��t ' . TEXT_GV_NAME . ' pro sebe, nebo jej poslat p��teli!' . "\n\n");

define('EMAIL_TEXT_1', 'Va�e p�ihla�ovac� ID / jm�no je e-mailov� adresa, na kterou jste obdr�eli tuto zpr�vu.' . "\n\n");
define('EMAIL_TEXT_2', ' Va�e heslo je: %s ' . "\n\n");
define('EMAIL_TEXT_3', ' V� ��et v�m umo�n� vyu��t r�zn� slu�by kter� nejsou sou��st� p�i n�kupu bez registrace. ��ste�n� p�ehled z n�kter�ch slu�eb je:' . "\n\n" . '<li><strong>Permanentn� Ko��k</strong> - produkty m��ete p�id�vat do ko��ku a v p��pad� �e nedokon��te objedn�vku a odhl�s�te se z ��tu, zbo�� z�stane v do�asn�m ko��ku a� do va�eho dal��ho p�ihl�en� k ��tu.' . "\n\n". '<li><strong>adres��</strong> - Nyn� m��eme dodat sv� zbo�� na jinou adresu, ne� je ta va�e! To je ide�ln� kdy� chcete poslat narozeninov� d�rky p��mo na narozeninov�-osoby sami. ' . "\n\n" . '<li> <strong> Historie objedn�vek </strong> -. Zobrazte si historii n�kup�, kter� jste provedli u n�s v�etn� historie vy��zen�.' . "\n\n" . '<li><strong> Produktov� recenze / hodnocen� </strong> - Pod�lte se o sv� n�zory a ohodno�te v�robky.' . "\n\n" . '<li><strong>Nov� funkce a akce</strong> - kter� pro V�s na�e z�kazn�ky budeme p�ipravovat' . "\n\n");
define('EMAIL_CONTACT', 'Pro pomoc s n�kterou z na�ich on-line slu�eb, pros�m, napi�te n�m na na�� adresu: <a href="mailto:' . STORE_OWNER_EMAIL_ADDRESS . '">'. STORE_OWNER_EMAIL_ADDRESS ." </a>\n\n");
define('EMAIL_GV_CLOSURE',"\n\n" . 'S pozdravem,' . "\n\n" . STORE_OWNER . "\n kolektiv pracovn�k�\n\n". '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '">'.HTTP_SERVER . DIR_WS_CATALOG ."</a>\n\n");

// email disclaimer - this disclaimer is separate from all other email disclaimers
define('EMAIL_DISCLAIMER_NEW_CUSTOMER', 'Tato e-mailov� adresa byla n�m d�na v�mi, nebo jedn�m z na�ich z�kazn�k�. Pokud jste p�ihl�en� k ��tu, nebo mysl�te, �e jste obdr�eli tento email omylem, tak n�s pros�m kontaktujte e-mail %s ');

define('ERROR_CUSTOMER_ERROR_1','Chyby ve vypln�n�ch datech');
define('ERROR_CUSTOMER_EXISTS','Z�kazn�k ji� existuje: ');
define('CUSTOMERS_BULK_UPLOAD','Hromadn� vlo�en� z�kazn�k� (CSV): ');
define('CUSTOMERS_FILE_IMPORT','Soubor k importu: ');
define('CUSTOMERS_INSERT_MODE','Re�im vkl�d�n�: ');
define('CUSTOMERS_INSERT_MODE_VALID','��st (Vlo�te platn� ��dky)');
define('CUSTOMERS_INSERT_MODE_FILE','Soubor (Po�adov�n cel� platn� soubor)');
define('TEXT_FULL_NAME','(Pln� n�zev st�tu / kraje)');
define('CUSTOMERS_ONE_FORMS','Klikn�te zde pro zobrazen� formul��e pro jednoho z�kazn�ka');

//-added-v2.0.0-lat9
define('ERROR_ON_LINE', 'Errors on line %u of the imported file');
define('MESSAGE_CUSTOMERS_OK', 'Customers were inserted successfully.');
define('MESSAGE_LINES_OK_NOT_INSERTED', 'The following lines were validated but, due to errors in other records, were not inserted into the database.');
define('MESSAGE_CUSTOMER_OK', 'The customer (%s) was inserted successfully.');
define('LINE_MSG', 'Line %u (%s %s)');
define('FORMATTING_THE_CSV', 'Formatting the CSV');
define('CUSTOMERS_SINGLE_ENTRY', 'Single Customer Entry: ');
define('DATE_FORMAT_CHOOSE_MULTI', 'DOB Format: ');
define('DATE_FORMAT_CHOOSE_SINGLE', 'Date of Birth Format: ');
define('RESEND_WELCOME_EMAIL', 'Resend the Welcome E-Mail');
define('BUTTON_RESEND', 'Resend');
define('TEXT_PLEASE_CHOOSE', 'Please Choose');
define('TEXT_CHOOSE_CUSTOMER', 'Choose a Customer: ');
define('TEXT_RESET_PASSWORD', 'Reset the customer\'s password?');
define('CUSTOMER_EMAIL_RESENT', 'The "Welcome E-Mail" was re-sent to the customer.');

// Configuration and messages for the phone_validate function
define('ENTRY_PHONE_NO_DELIMS', '-. ()'); 
define('ENTRY_PHONE_NO_MIN_DIGITS', '10');
define('ENTRY_PHONE_NO_MAX_DIGITS', '15');
define('ENTRY_PHONE_NO_DELIM_WORLD', '+');  // Set to false if you don't support world phone numbers
define('ENTRY_PHONE_NO_CHAR_ERROR', 'There is an invalid character (%s) in the "Telephone Number".');
define('ENTRY_PHONE_NO_MIN_ERROR', 'There are fewer than ' . ENTRY_PHONE_NO_MIN_DIGITS . ' digits (0-9) in the "Telephone Number".');
define('ENTRY_PHONE_NO_MAX_ERROR', 'There are more than ' . ENTRY_PHONE_NO_MAX_DIGITS . ' digits (0-9) in the "Telephone Number".');

define('ERROR_NO_UPLOAD_FILE', 'Please choose a "File to Import" before pressing "Upload"');
define('ERROR_FILE_UPLOAD', 'Error (%s) uploading file');
define('ERROR_BAD_FILE_EXTENSION', 'The file extension (%s) must be one of: ');
define('ERROR_BAD_FILE_HEADER', 'Either the header row in the input file is empty or it was not recognised: ');
define('ERROR_FIRST_NAME', '"First Name" must be at least ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' characters in length.');
define('ERROR_LAST_NAME', '"Last Name" must be at least ' . ENTRY_LAST_NAME_MIN_LENGTH . ' characters in length.');
define('ERROR_GENDER', 'Gender not recognised. Expected "m" or "f", got: ');
define('ERROR_EMAIL_LENGTH', '"E-Mail Address" must be at least ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' characters in length.');
define('ERROR_EMAIL_INVALID', 'The "E-Mail Address" format is not valid.');
define('ERROR_EMAIL_ADDRESS_ERROR_EXISTS', 'The "E-Mail Address" (%s) already exists in our database.');
define('ERROR_STREET_ADDRESS', '"Street Address" must be at least ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' characters in length.');
define('ERROR_CITY', '"City" must be at least ' . ENTRY_CITY_MIN_LENGTH . ' characters in length.');
define('ERROR_DOB_INVALID', '"Date of Birth" must be in the format %s.');
define('ERROR_COMPANY', '"Company" must be at least ' . ENTRY_COMPANY_MIN_LENGTH . ' characters in length.');
define('ERROR_POSTCODE', '"Post Code" must be at least ' . ENTRY_POSTCODE_MIN_LENGTH . ' characters in length.');
define('ENTRY_POSTCODE_NOT_VALID', 'The "Post Code" (%s) is not valid for %s.');
define('ERROR_COUNTRY', 'Please select a "Country"');
define('ERROR_TELEPHONE', '"Telephone Number" must be at least ' . ENTRY_TELEPHONE_MIN_LENGTH . ' characters in length.');
define('ERROR_STATE_REQUIRED', '"State" is required for the currently selected "Country".');
define('ERROR_SELECT_STATE', 'Please select a "State".');
define('ERROR_CANT_MOVE_FILE', 'Could not move file, check folder permissions.');
define('ERROR_NO_CUSTOMER_SELECTED', 'Please select a customer before you press "Resend".');
define('ERROR_UNKNOWN_GROUP_PRICING', 'Unknown "Customer Group Pricing" value (%u).');  /*v2.0.5a*/

?>
