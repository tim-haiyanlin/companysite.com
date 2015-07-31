<?php
/**
 * banner_box5 sidebox - fifth box used to display "square" banners in sideboxes
 *
 * @package templateSystem
 * @copyright Copyright 2005-2013 Zen Cart Development Team
 * @copyright Portions Copyright 2005 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: banner_box5.php 08-30-2013 stellarweb $
 */

// test if box should display
  $show_banner_box5 = true;
  if (SHOW_BANNERS_GROUP_SET15 == '') {
    $show_banner_box5 = false;
  }

  if ($show_banner_box5 == true) {
    $banner_box[] = TEXT_BANNER_BOX5;
    $banner_box_group= SHOW_BANNERS_GROUP_SET15;

    require($template->get_template_dir('tpl_banner_box5.php',DIR_WS_TEMPLATE, $current_page_base,'sideboxes'). '/tpl_banner_box5.php');

// if no active banner in the specified banner group then the box will not show
// uses banners in the defined group $banner_box_group
    if ($banner->RecordCount() > 0) {

      $title =  BOX_HEADING_BANNER_BOX5;
      $title_link = false;
      require($template->get_template_dir($column_box_default, DIR_WS_TEMPLATE, $current_page_base,'common') . '/' . $column_box_default);
    }
  }
?>