<?php
/**
 * banner_box3 sidebox - third box used to display "square" banners in sideboxes
 *
 * @package templateSystem
 * @copyright Copyright 2003-2013 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: banner_box3.php 08-30-2013 stellarweb $
 */

// test if box should display
  $show_banner_box3 = true;
  if (SHOW_BANNERS_GROUP_SET13 == '') {
    $show_banner_box3 = false;
  }

  if ($show_banner_box3 == true) {
    $banner_box[] = TEXT_BANNER_BOX3;
    $banner_box_group= SHOW_BANNERS_GROUP_SET13;

    require($template->get_template_dir('tpl_banner_box3.php',DIR_WS_TEMPLATE, $current_page_base,'sideboxes'). '/tpl_banner_box3.php');

// if no active banner in the specified banner group then the box will not show
// uses banners in the defined group $banner_box_group
    if ($banner->RecordCount() > 0) {

      $title =  BOX_HEADING_BANNER_BOX3;
      $title_link = false;
      require($template->get_template_dir($column_box_default, DIR_WS_TEMPLATE, $current_page_base,'common') . '/' . $column_box_default);
    }
  }
?>