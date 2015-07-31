<head><title>Show Product and Category</title></head>
<?php
/*
 while (!$companyCategories->EOF) {
  $categories_name = $companyCategories->fields['categories_name'];
   $display_products_image =  zen_image(DIR_WS_IMAGES . $companyCategories->fields['categories_image'], $categories_name, IMAGE_FEATURED_PRODUCTS_LISTING_HEIGHT, IMAGE_FEATURED_PRODUCTS_LISTING_WIDTH);
   echo $display_products_image;
$companyCategories->MoveNext();
}


  $link = '<a href="' . zen_href_link(zen_get_info_page($featured_products->fields['products_id']), 'cPath=' . zen_get_generated_category_path_rev($featured_products->fields['master_categories_id']) . '&products_id=' . $featured_products->fields['products_id']) . '"></a>';


*/
?>
<div class="centerColumn" id="indexCategories">
	<header>
    	<h1 id="indexCategoriesHeading">Show Product and Category</h1>
    </header>
	<div id="categoryDescription" class="catDescContent row">
	<!--</div>-->
	   
    
    <!-- BOF: Display grid of available sub-categories, if any -->
			<div id="subcategory_names" class="col-md-12 col-sm-12"> <div>
			   <ul class="subcategory_list"> 
					<!-- comment <li>Browse Subcategories : </li> 2015 07 28 tim-->
                    <?php
					   while (!$companyCategories->EOF) {
					   $categories_id = $companyCategories->fields['categories_id'];
                       $categories_name = $companyCategories->fields['categories_name'];
					   $display_categories_image =  zen_image(DIR_WS_IMAGES . $companyCategories->fields['categories_image'], $categories_name);
                       //$link = '<a href="' .  zen_href_link('index','&pg=store&cPath='.$categories_id.''). '"></a>';
					?>
					
					<li class="categoryListBoxContentsFromCompany col-md-6 col-sm-6 col-lg-6 col-xs-12">
						  <div class="row"><a href='<?php echo zen_href_link('index','&pg=store&cPath='.$categories_id.'');?>'><?php echo  $display_categories_image;?><div><?php echo  $categories_name  ;?></div></a>
						  </div>
					</li>

					
                    <?php
					$companyCategories->MoveNext();
					}
					?>
          
               </ul>
            </div>
				 
	<!-- EOF: Display grid of available sub-categories -->
	</div>

</div>


<?php


///////

?>
<?php
/**
 * Page Template - Featured Products listing
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_featured_products_default.php 2603 2005-12-19 20:22:08Z wilt $
 */
?>
<div class="centerColumn" id="featuredDefault">

<!-- Top Product Sorter -->
<?php
$gridlist_tab='';
   if (defined('PRODUCT_LISTING_LAYOUT_STYLE_CUSTOMER') and PRODUCT_LISTING_LAYOUT_STYLE_CUSTOMER == '1') {
    //echo '<div class="view-mode">' .  array(array('id'=>'rows','text'=>PRODUCT_LISTING_LAYOUT_ROWS),array('id'=>'columns','text'=>PRODUCT_LISTING_LAYOUT_COLUMNS))) . '</div>';
	 $gridlist_tab=mb_gridlist_tab(FILENAME_FEATURED_PRODUCTS);
  }
  ?>
<?php

  /**
   * require code to display the list-display-order dropdown
   */
  require($template->get_template_dir('/tpl_modules_listing_display_order.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_listing_display_order.php'); 
?>
<!-- Top Product Sorter Ends-->
<!-- Product List -->
<?php
/**
 * display the featured products
 */
require($template->get_template_dir('/tpl_modules_products_featured_listing.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_products_featured_listing.php'); ?>
<!-- Product List Ends -->
<!-- Top Product Counts-->
<div class="product-page-count">
<?php
  if (($featured_products_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3'))) {
?>
<div id="featuredProductsListingTopNumber" class="navSplitPagesResult back"><?php echo $featured_products_split->display_count(TEXT_DISPLAY_NUMBER_OF_PRODUCTS_FEATURED_PRODUCTS); ?></div>
<?php } ?>
<!-- Top Product Counts Ends-->

<!-- Bottom Pagination and button -->
<?php
  if (($featured_products_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3'))) {
?>
<?php /*?><div id="featuredProductsListingBottomNumber" class="navSplitPagesResult back"><?php echo $featured_products_split->display_count(TEXT_DISPLAY_NUMBER_OF_PRODUCTS_FEATURED_PRODUCTS); ?></div><?php */?>
<div class="pageresult_bottom">
<?php if($featured_products_split->number_of_pages > 1) { //to hide the pagination div if no. of pages < 1 ?>
	<div id="featuredProductsListingBottomLinks" class="navSplitPagesLinks forward pagination-style"><?php echo TEXT_RESULT_PAGE . ' ' . $featured_products_split->display_links(MAX_DISPLAY_PAGE_LINKS, zen_get_all_get_params(array('page', 'info', 'x', 'y', 'main_page'))); ?></div>
<?php
	} ?>
</div>
<?php }
?>

<?php
  if ($show_bottom_submit_button == true) {
// only show button when there is something to submit
?>
  
<?php
  } // end show bottom button
?>
</div>
<?php
// only end form if form is created
    if ($show_top_submit_button == true or $show_bottom_submit_button == true) {
?>
</form>
<?php } // end if form is made ?>
</div>