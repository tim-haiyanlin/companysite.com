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
// $Id: moneyorder.php 1969 2005-09-13 06:57:21Z drbyte $
// $Id: translation 2011-01-12 01:15:38Z frank18 $
//

  define('MODULE_PAYMENT_MONEYORDER_TEXT_TITLE', 'Vorkasse/Überweisung');
  define('MODULE_PAYMENT_MONEYORDER_TEXT_DESCRIPTION', 'Bitte stellen Sie Ihren Scheck/Anweisung aus:<br />' . MODULE_PAYMENT_MONEYORDER_PAYTO . '<br /><br />Schicken Sie Ihre Zahlung an:<br />' . nl2br(STORE_NAME_ADDRESS) . '<br /><br />' . 'Ihre Bestellung wird versendet, sobald wir den Betrag erhalten haben.');
  define('MODULE_PAYMENT_MONEYORDER_TEXT_EMAIL_FOOTER', 'Bitte überweisen Sie den Betrag auf unser Konto: ' . MODULE_PAYMENT_MONEYORDER_PAYTO . "\n\nSchicken Sie Ihre Zahlung an:\n" . STORE_NAME_ADDRESS . "\n\n" . 'Ihre Bestellung wird versendet, sobald wir den Betrag erhalten haben.');
?>
