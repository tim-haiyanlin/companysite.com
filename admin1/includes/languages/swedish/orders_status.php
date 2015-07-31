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
//  $Id: orders_status.php 1105 2005-04-04 22:05:35Z birdbrain $
//
 /*
 * Zen Cart version 1.5.0 -
 * @Swedish Translation 2011 - Signs FrilansReklam, www.frilansreklam.se
 * @Swedish support - www.zencart.nu - Svenska Zen Cart
 */
define('HEADING_TITLE', 'Order Status');

define('TABLE_HEADING_ORDERS_STATUS', 'Order Status');
define('TABLE_HEADING_ACTION', '&Aring;tg&auml;rd');

define('TEXT_INFO_EDIT_INTRO', 'G&ouml;r n&ouml;dv&auml;ndiga &auml;ndringar');
define('TEXT_INFO_ORDERS_STATUS_NAME', 'Order Status:');
define('TEXT_INFO_INSERT_INTRO', 'Ange ny order status med n&ouml;dv&auml;ndig information');
define('TEXT_INFO_DELETE_INTRO', '&Auml;r du s&auml;ker p&aring; att du vill radera denna status?');
define('TEXT_INFO_HEADING_NEW_ORDERS_STATUS', 'Ny Order Status');
define('TEXT_INFO_HEADING_EDIT_ORDERS_STATUS', '&Auml;ndra Order Status');
define('TEXT_INFO_HEADING_DELETE_ORDERS_STATUS', 'Radera Order Status');

define('ERROR_REMOVE_DEFAULT_ORDER_STATUS', 'FEL: Den f&ouml;rvalda statusen kan inte raderas. Ange en annan som f&ouml;rvald order status och f&ouml;rs&ouml;k igen.');
define('ERROR_STATUS_USED_IN_ORDERS', 'FEL: Denna order status anv&auml;nds i ordrar.');
define('ERROR_STATUS_USED_IN_HISTORY', 'FEL: Denna order status anv&auml;nds i order status historiken.');
?>