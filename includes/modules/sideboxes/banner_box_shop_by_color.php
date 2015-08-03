<?php
/**
* example of add a sidebox;
* How can you add a new sidebox
*
* named this file "my_banner.php"
* put this file in includes/modules/sideboxes;
*/

// only show if either the tutorials are active or additional links are active

require($template->get_template_dir('tpl_banner_box_shop_by_color.php',DIR_WS_TEMPLATE, $current_page_base,'sideboxes'). '/tpl_banner_box_shop_by_color.php');
$title = '';
$title_link = false;
require( $template->get_template_dir("tpl_box_shop_by_color.php", DIR_WS_TEMPLATE, $current_page_base,'common') . '/' . "tpl_box_shop_by_color.php");
//echo ( $template->get_template_dir("tpl_box_show_mycompany_banner1_right.php", DIR_WS_TEMPLATE, $current_page_base,'common') . '/' . "tpl_box_show_mycompany_banner1_right.php");
?>



