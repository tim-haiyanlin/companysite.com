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

define('HEADING_TITLE', 'Zákazníci');

define('TABLE_HEADING_ID', 'ID#');
define('TABLE_HEADING_FIRSTNAME', 'Jméno');
define('TABLE_HEADING_LASTNAME', 'Pøíjmení');
define('TABLE_HEADING_ACCOUNT_CREATED', 'úèet vytvoøen');
define('TABLE_HEADING_LOGIN', 'Poslední pøihlášení');
define('TABLE_HEADING_ACTION', 'Akce');
define('TABLE_HEADING_PRICING_GROUP', 'Cenová skupina');
define('TABLE_HEADING_AUTHORIZATION_APPROVAL', 'Autorizovanı');

define('TEXT_DATE_ACCOUNT_CREATED', 'Úèet vytvoøen:');
define('TEXT_DATE_ACCOUNT_LAST_MODIFIED', 'Poslední zmìna:');
define('TEXT_INFO_DATE_LAST_LOGON', 'Poslední pøihlášení:');
define('TEXT_INFO_NUMBER_OF_LOGONS', 'Poèet pøihlášení:');
define('TEXT_INFO_COUNTRY', 'Zemì:');
define('TEXT_INFO_NUMBER_OF_REVIEWS', 'Poèet recenzí:');
define('TEXT_DELETE_INTRO', 'Jste si jisti, e chcete smazat tohoto zákazníka?');
define('TEXT_DELETE_REVIEWS', 'Smazat %s recenze');
define('TEXT_INFO_HEADING_DELETE_CUSTOMER', 'odstranit zákazníka');
define('TYPE_BELOW', 'zadejte níe');
define('PLEASE_SELECT', 'Vyberte');
define('TEXT_INFO_NUMBER_OF_ORDERS', 'Poèet objednávek:');
define('TEXT_INFO_LAST_ORDER','Poslední objednávka:');
define('TEXT_INFO_ORDERS_TOTAL', 'Celkem:');
define('CUSTOMERS_REFERRAL', 'Zákaznická doporuèení<br />První slevovı kupón');

define('ENTRY_NONE', 'ádnı');

define('TABLE_HEADING_COMPANY','spoleènost');

define('CUSTOMERS_AUTHORIZATION', 'Stav autorizace');
define('CUSTOMERS_AUTHORIZATION_0', 'Schválenı');
define('CUSTOMERS_AUTHORIZATION_1', 'Èeká na schválení - pro prohlíení musí bıt atorizován');
define('CUSTOMERS_AUTHORIZATION_2', 'Èeká na schválení - mùe prohlíet. ale bez cen');
define('CUSTOMERS_AUTHORIZATION_3', 'Èeká na schválení - mùe prohlíet èetnì cen. ale nemùe nakupovat');
define('ERROR_CUSTOMER_APPROVAL_CORRECTION1', 'Upozornìní: Obchod nelze bez oprávnìní prohlíet. Zákazník má nastaveno - Èeká na schválení/neprohlíet');
define('ERROR_CUSTOMER_APPROVAL_CORRECTION2', 'Upozornìní: Obchod lze prohlíet, ale bez cen. Zákazník má nastaveno - Èeká na schválení/prohlíet bez cen');

define('EMAIL_CUSTOMER_STATUS_CHANGE_MESSAGE', 'Váš zákaznickı stav byl aktualizován. Dìkujeme Vám za nákup. Tìšíme se na Vaše další nákupy.');
define('EMAIL_CUSTOMER_STATUS_CHANGE_SUBJECT', 'Stav zákazníka byl aktualizován');

define('CATEGORY_PASSWORD', 'Heslo');
define('CATEGORY_EMAIL', 'Uvítací e-mail');
define('ENTRY_PASSWORD_CONFIRM_ERROR','Hesla nesouhlasí, zkuste to prosím znovu.');

define('ENTRY_PASSWORD', 'Heslo:');
define('ENTRY_CONFIRM_PASSWORD', 'Potvrdit heslo:');
define('ENTRY_EMAIL', 'Poslat zákazníkovi uvítací e-mail');

// greeting salutation
define('EMAIL_SUBJECT', 'Vítejte v ' . STORE_NAME);
define('EMAIL_GREET_MR', 'Váenı pane %s,' . "\n\n");
define('EMAIL_GREET_MS', 'Váená sleèno,paní %s,' . "\n\n");
define('EMAIL_GREET_NONE', 'Váenı(á) %s' . "\n\n");

// First line of the greeting
define('EMAIL_WELCOME', 'Rádi bychom Vás pøivítali na <strong>' . STORE_NAME . '</strong>.');
define('EMAIL_SEPARATOR', '--------------------');
define('EMAIL_COUPON_INCENTIVE_HEADER', 'Gratulujeme! Uvádíme dále údaje pro slevovı kupón vytvoøené(ı} právì pro vás!' . "\n\n");
// your Discount Coupon Description will be inserted before this next define
define('EMAIL_COUPON_REDEEM', ' Chcete-li pouít slevovı kupón, zadejte ' . TEXT_GV_REDEEM . ' kód v pokladnì:  <strong>%s</strong>' . "\n\n");

define('EMAIL_GV_INCENTIVE_HEADER', 'Jen za návštìvu dnes jsme vám poslali ' . TEXT_GV_NAME . ' pro %s!' . "\n");
define('EMAIL_GV_REDEEM', ' ' . TEXT_GV_NAME . ' ' . TEXT_GV_REDEEM . ' je: %s ' . "\n\n" . 'Mùete zadat ' . TEXT_GV_REDEEM . ' vıbìr pøi prùchodu pokladnou v obchodì.');
define('EMAIL_GV_LINK', ' nebo mùete uplatnit hned pomocí následujícího odkazu:' . "\n");
// GV link will automatically be included before this line

define('EMAIL_GV_LINK_OTHER','Po pøidání ' . TEXT_GV_NAME . ' k vašemu úètu, mùete pouít ' . TEXT_GV_NAME . ' pro sebe, nebo jej poslat pøíteli!' . "\n\n");

define('EMAIL_TEXT_1', 'Vaše pøihlašovací ID / jméno je e-mailová adresa, na kterou jste obdreli tuto zprávu.' . "\n\n");
define('EMAIL_TEXT_2', ' Vaše heslo je: %s ' . "\n\n");
define('EMAIL_TEXT_3', ' Váš úèet vám umoní vyuít rùzné sluby které nejsou souèástí pøi nákupu bez registrace. Èásteènı pøehled z nìkterıch slueb je:' . "\n\n" . '<li><strong>Permanentní Košík</strong> - produkty mùete pøidávat do košíku a v pøípadì e nedokonèíte objednávku a odhlásíte se z úètu, zboší zùstane v doèasném košíku a do vašeho dalšího pøihlášení k úètu.' . "\n\n". '<li><strong>adresáø</strong> - Nyní mùeme dodat své zboí na jinou adresu, ne je ta vaše! To je ideální kdy chcete poslat narozeninové dárky pøímo na narozeninové-osoby sami. ' . "\n\n" . '<li> <strong> Historie objednávek </strong> -. Zobrazte si historii nákupù, které jste provedli u nás vèetnì historie vyøízení.' . "\n\n" . '<li><strong> Produktové recenze / hodnocení </strong> - Podìlte se o své názory a ohodnote vırobky.' . "\n\n" . '<li><strong>Nové funkce a akce</strong> - které pro Vás naše zákazníky budeme pøipravovat' . "\n\n");
define('EMAIL_CONTACT', 'Pro pomoc s nìkterou z našich on-line slueb, prosím, napište nám na naší adresu: <a href="mailto:' . STORE_OWNER_EMAIL_ADDRESS . '">'. STORE_OWNER_EMAIL_ADDRESS ." </a>\n\n");
define('EMAIL_GV_CLOSURE',"\n\n" . 'S pozdravem,' . "\n\n" . STORE_OWNER . "\n kolektiv pracovníkù\n\n". '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '">'.HTTP_SERVER . DIR_WS_CATALOG ."</a>\n\n");

// email disclaimer - this disclaimer is separate from all other email disclaimers
define('EMAIL_DISCLAIMER_NEW_CUSTOMER', 'Tato e-mailová adresa byla nám dána vámi, nebo jedním z našich zákazníkù. Pokud jste pøihlášení k úètu, nebo myslíte, e jste obdreli tento email omylem, tak nás prosím kontaktujte e-mail %s ');

define('ERROR_CUSTOMER_ERROR_1','Chyby ve vyplnìnıch datech');
define('ERROR_CUSTOMER_EXISTS','Zákazník ji existuje: ');
define('CUSTOMERS_BULK_UPLOAD','Hromadné vloení zákazníkù (CSV): ');
define('CUSTOMERS_FILE_IMPORT','Soubor k importu: ');
define('CUSTOMERS_INSERT_MODE','Reim vkládání: ');
define('CUSTOMERS_INSERT_MODE_VALID','Èást (Vlote platné øádky)');
define('CUSTOMERS_INSERT_MODE_FILE','Soubor (Poadován celı platnı soubor)');
define('TEXT_FULL_NAME','(Plnı název státu / kraje)');
define('CUSTOMERS_ONE_FORMS','Kliknìte zde pro zobrazení formuláøe pro jednoho zákazníka');

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
