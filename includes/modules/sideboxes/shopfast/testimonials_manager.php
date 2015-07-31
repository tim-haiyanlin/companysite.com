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
// test if box should display

$show_testimonials_manager = true;


if ($show_testimonials_manager == true) {
$page_query = $db->Execute("select testimonials_id, testimonials_image, testimonials_title, testimonials_html_text, date_added  from " . TABLE_TESTIMONIALS_MANAGER . " where status = 1  and language_id = " . (int)$_SESSION['languages_id'] . " order by rand(), testimonials_title limit " . MAX_DISPLAY_TESTIMONIALS_MANAGER_TITLES ."");
if ($page_query->RecordCount()>0) {
      $title =  BOX_HEADING_TESTIMONIALS_MANAGER;
      $box_id =  testimonials_manager;
      $rows = 0;
      while (!$page_query->EOF) {
        $rows++;
        $page_query_list[$rows]['id'] = $page_query->fields['testimonials_id'];
        $page_query_list[$rows]['name']  = $page_query->fields['testimonials_title'];
        $page_query_list[$rows]['story']  = $page_query->fields['testimonials_html_text'];
		$page_query_list[$rows]['image'] = $page_query->fields['testimonials_image'];

        $page_query->MoveNext();
      }
      $left_corner = false;
      $right_corner = false;
      $right_arrow = false;
      $title_link = false;
      require($template->get_template_dir('tpl_testimonials_manager.php',DIR_WS_TEMPLATE, $current_page_base,'sideboxes'). '/tpl_testimonials_manager.php');
	  // for show testimonials at footer  2015 07 23 tim
      require($template->get_template_dir('tpl_footer_testimonials.php', DIR_WS_TEMPLATE, $current_page_base,'common') . '/' . 'tpl_footer_testimonials.php');
    }
}	
//EOF	