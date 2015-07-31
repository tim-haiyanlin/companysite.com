<?php

 $productsInCategory = zen_get_categories_products_list($cPath, false, true, 0, '');
  if (is_array($productsInCategory) && sizeof($productsInCategory) > 0) {
    // build products-list string to insert into SQL query
    foreach($productsInCategory as $key => $value) {
      $list_of_products .= $key . ', ';
    }
	 $list_of_products = substr($list_of_products, 0, -2); // remove trailing comma
  }


  $listing_sql = "SELECT DISTINCT p.products_type, p.products_id,  pd.products_name, p.products_image, p.products_price,
   p.products_tax_class_id, p.products_date_added, m.manufacturers_name, p.products_model, p.products_quantity, p.products_weight,
   p.product_is_call, p.product_is_always_free_shipping, p.products_qty_box_status, p.master_categories_id, m.manufacturers_id";

  $listing_sql .= " FROM " . TABLE_PRODUCTS . " p LEFT JOIN " . TABLE_MANUFACTURERS . " m ON (p.manufacturers_id = m.manufacturers_id)" .
   " left join " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c on p.products_id = p2c.products_id" .
   " left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on p.products_id = pd.products_id" .
   ($filter_attr == true ? " join " . TABLE_PRODUCTS_ATTRIBUTES . " p2a on p.products_id = p2a.products_id" .
   " join " . TABLE_PRODUCTS_OPTIONS . " po on p2a.options_id = po.products_options_id" .
   " join " . TABLE_PRODUCTS_OPTIONS_VALUES . " pov on p2a.options_values_id = pov.products_options_values_id" .
   (defined('TABLE_PRODUCTS_WITH_ATTRIBUTES_STOCK') ? " join " . TABLE_PRODUCTS_WITH_ATTRIBUTES_STOCK . " p2as on p.products_id = p2as.products_id " : "") : '');

  $listing_sql .= " WHERE p.products_status = 1 AND (p.products_date_available IS NULL OR p.products_date_available <= current_date) AND pd.language_id = :languageID  AND  p.products_id in (". $list_of_products.")" .
   $filter . " GROUP BY p.products_id " . $having . $order_by;

  $listing_sql = $db->bindVars($listing_sql, ':languageID', $_SESSION['languages_id'], 'integer');

//echo  $listing_sql;


$company_products_split = new splitPageResults($listing_sql, 60); 
// print_r($productsInCategory);

/*

 // get all products and cPaths in this subcat tree
  $productsInCategory = zen_get_categories_products_list( (($manufacturers_id > 0 && $_GET['filter_id'] > 0) ? zen_get_generated_category_path_rev($_GET['filter_id']) : $cPath), false, true, 0, $display_limit);

  if (is_array($productsInCategory) && sizeof($productsInCategory) > 0) {
    // build products-list string to insert into SQL query
    foreach($productsInCategory as $key => $value) {
      $list_of_products .= $key . ', ';
    }
    $list_of_products = substr($list_of_products, 0, -2); // remove trailing comma



*/

?>
<?php
/**
 * Module Template
 *
 * Loaded automatically by index.php?main_page=featured_products.<br />
 * Displays listing of All Products
 *
 * @package templateSystem
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_modules_featured_products_listing.php 6096 2007-04-01 00:43:21Z ajeh $
 */

?>
<?php
 ?>
 <?php  if((isset($_GET['view'])) && ($_GET['view']=='rows')){ 
 echo '<div id="product-area" class="section offer products-container portrait product-list" data-layout="list">';
}else{
 echo '<div id="product-area" class="section offer products-container portrait product-grid" data-layout="grid">';
} ?>
<div class="row" style=" transform: ">
<?php
  
  $group_id = zen_get_configuration_key_value('PRODUCT_FEATURED_LIST_GROUP_ID');
   

  if ($company_products_split->number_of_rows > 0) {
	  
	 
    $featured_products = $db->Execute($company_products_split->sql_query);

    while (!$featured_products->EOF) {

	$products_name = $featured_products->fields['products_name'];
	$products_name = ltrim(substr($products_name, 0, $product_name_length) . '');

		
	//show product model,define $products_model 2015 07 27 tim
	$products_model=$featured_products->fields['products_model'];

	$products_model = ltrim(substr($products_model, 0, '25') . ''); //Trims and Limits the model name 25 from document 
	
	$products_model='<div  class="products_model_company">SKU: '.$products_model.'</div>';

		
      if (PRODUCT_FEATURED_LIST_IMAGE != '0') {
        if ($featured_products->fields['products_image'] == '' and PRODUCTS_IMAGE_NO_IMAGE_STATUS == 0) {
          $display_products_image = str_repeat('', substr(PRODUCT_FEATURED_LIST_IMAGE, 3, 1));
        } else {
			
		  $product_img_src=mb_getbaseimg_effects($featured_products->fields['products_image']);
    $second_img_src=mb_gethoverimg_effects($featured_products->fields['products_image']);
		  
          $display_products_image =  zen_image(DIR_WS_IMAGES . $featured_products->fields['products_image'], $products_name, IMAGE_FEATURED_PRODUCTS_LISTING_HEIGHT, IMAGE_FEATURED_PRODUCTS_LISTING_WIDTH) . str_repeat('', substr(PRODUCT_FEATURED_LIST_IMAGE, 3, 1));
        }
      } else {
        $display_products_image = '';
		$product_img_src='';
		$second_img_src='';
      }
	 
      if (PRODUCT_FEATURED_LIST_IMAGE != '0') {
        $display_products_name = '<a href="' . zen_href_link(zen_get_info_page($featured_products->fields['products_id']), 'cPath=' . zen_get_generated_category_path_rev($featured_products->fields['master_categories_id']) . '&products_id=' . $featured_products->fields['products_id']) . '">' . $products_name . '</a>' . str_repeat('', substr(PRODUCT_FEATURED_LIST_NAME, 3, 1));
      } else {
        $display_products_name = '';
      }

      if (PRODUCT_FEATURED_LIST_WEIGHT != '0' and zen_get_show_product_switch($featured_products->fields['products_id'], 'weight')) {
        $display_products_weight = TEXT_PRODUCTS_WEIGHT . $featured_products->fields['products_weight'] . TEXT_SHIPPING_WEIGHT . str_repeat('', substr(PRODUCT_FEATURED_LIST_WEIGHT, 3, 1));
      } else {
        $display_products_weight = '';
      }

      if (PRODUCT_FEATURED_LIST_QUANTITY != '0' and zen_get_show_product_switch($featured_products->fields['products_id'], 'quantity')) {
        if ($featured_products->fields['products_quantity'] <= 0) {
          $display_products_quantity = TEXT_OUT_OF_STOCK . str_repeat('', substr(PRODUCT_FEATURED_LIST_QUANTITY, 3, 1));
        } else {
          $display_products_quantity = TEXT_PRODUCTS_QUANTITY . $featured_products->fields['products_quantity'] . str_repeat('', substr(PRODUCT_FEATURED_LIST_QUANTITY, 3, 1));
        }
      } else {
        $display_products_quantity = '';
      }

      if (PRODUCT_FEATURED_LIST_DATE_ADDED != '0' and zen_get_show_product_switch($featured_products->fields['products_id'], 'date_added')) {
        $display_products_date_added = TEXT_DATE_ADDED . ' ' . zen_date_long($featured_products->fields['products_date_added']) . str_repeat('', substr(PRODUCT_FEATURED_LIST_DATE_ADDED, 3, 1));
      } else {
        $display_products_date_added = '';
      }

       if (PRODUCT_FEATURED_LIST_MANUFACTURER != '0' and zen_get_show_product_switch($featured_products->fields['products_id'], 'manufacturer')) {
        $display_products_manufacturers_name = ($featured_products->fields['manufacturers_name'] != '' ? TEXT_MANUFACTURER . ' ' . $featured_products->fields['manufacturers_name'] . str_repeat('', substr(PRODUCT_FEATURED_LIST_MANUFACTURER, 3, 1)) : '');
      } else {
        $display_products_manufacturers_name = '';
      }

      if ((PRODUCT_FEATURED_LIST_PRICE != '0' and zen_get_products_allow_add_to_cart($featured_products->fields['products_id']) == 'Y')  and zen_check_show_prices() == true) {
        $products_price = zen_mb_get_products_display_price_from_company($featured_products->fields['products_id']);
        $display_products_price = TEXT_PRICE . ' ' . $products_price['show_all_price'] . str_repeat('', substr(PRODUCT_FEATURED_LIST_PRICE, 3, 1)) . (zen_get_show_product_switch($featured_products->fields['products_id'], 'ALWAYS_FREE_SHIPPING_IMAGE_SWITCH') ? (zen_get_product_is_always_free_shipping($featured_products->fields['products_id']) ? TEXT_PRODUCT_FREE_SHIPPING_ICON . '<br />' : '') : '');
      } else {
        $display_products_price = '';
		$products_price='';
      }
	

// more info in place of buy now
      if (PRODUCT_FEATURED_BUY_NOW != '0' and zen_get_products_allow_add_to_cart($featured_products->fields['products_id']) == 'Y') {
        if (zen_has_product_attributes($featured_products->fields['products_id'])) {
          $link = '<a href="' . zen_href_link(zen_get_info_page($featured_products->fields['products_id']), 'cPath=' . zen_get_generated_category_path_rev($featured_products->fields['master_categories_id']) . '&products_id=' . $featured_products->fields['products_id']) . '"></a>';
        } else {
          if (PRODUCT_FEATURED_LISTING_MULTIPLE_ADD_TO_CART > 0 && $featured_products->fields['products_qty_box_status'] != 0) {
//            $how_many++;
            $link = '<span>'.TEXT_PRODUCT_FEATURED_LISTING_MULTIPLE_ADD_TO_CART . "</span><input class='input-text' type=\"text\" name=\"products_id[" . $featured_products->fields['products_id'] . "]\" value=\"0\" size=\"4\" />";
          } else {
            $link = '<a href="' . zen_href_link(FILENAME_FEATURED_PRODUCTS, zen_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $featured_products->fields['products_id']) . '">' . zen_image_button(BUTTON_IMAGE_BUY_NOW, BUTTON_BUY_NOW_ALT) . '</a>&nbsp;';
          }
        }

        $the_button = $link;
        $products_link = '<a href="' . zen_href_link(zen_get_info_page($featured_products->fields['products_id']), 'cPath=' . zen_get_generated_category_path_rev($featured_products->fields['master_categories_id']) . '&products_id=' . $featured_products->fields['products_id']) . '"></a>';
        $display_products_button = zen_get_buy_now_button($featured_products->fields['products_id'], $the_button, $products_link) . zen_get_products_quantity_min_units_display($featured_products->fields['products_id']) . str_repeat('', substr(PRODUCT_FEATURED_BUY_NOW, 3, 1));
      } else {
        $link = '<a href="' . zen_href_link(zen_get_info_page($featured_products->fields['products_id']), 'cPath=' . zen_get_generated_category_path_rev($featured_products->fields['master_categories_id']) . '&products_id=' . $featured_products->fields['products_id']) . '"></a>';
        $the_button = $link;
        $products_link = '<a href="' . zen_href_link(zen_get_info_page($featured_products->fields['products_id']), 'cPath=' . zen_get_generated_category_path_rev($featured_products->fields['master_categories_id']) . '&products_id=' . $featured_products->fields['products_id']) . '"></a>';
        $display_products_button = zen_get_buy_now_button($featured_products->fields['products_id'], $the_button, $products_link) . zen_get_products_quantity_min_units_display($featured_products->fields['products_id']) . str_repeat('', substr(PRODUCT_FEATURED_BUY_NOW, 3, 1));
      }

      if (PRODUCT_FEATURED_LIST_DESCRIPTION > '0') {
        $disp_text = zen_get_products_description($featured_products->fields['products_id']);
        $disp_text = zen_clean_html($disp_text);

		$display_products_description = ltrim(substr($disp_text, 0, $product_desc_length) . '..');
		
      } else {
        $display_products_description = '';
      }
 
      
	$addtocartbtn = zen_get_buy_now_button($featured_products->fields['products_id'],'<a class="add-to-cart product_cart_image" data-toggle="tooltip" data-original-title="Add to Cart" href="' . zen_href_link($_GET['main_page'], zen_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $featured_products->fields['products_id']) . '"></a>');

	$listview_addtocartbtn = zen_get_buy_now_button($featured_products->fields['products_id'],'<a class="btn btn-primary btn-iconed" href="' . zen_href_link($_GET['main_page'], zen_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $featured_products->fields['products_id']) . '"><i class="icon-shopcart"></i><span>Add to Cart</span></a>');
		
	if (UN_MODULE_WISHLISTS_ENABLED) { $wishlist_link= '<a class="wishlink" title="Add to Wishlist" href="' . zen_href_link('wishlist', 'products_id=' . $featured_products->fields['products_id'] . '&action=wishlist_add_product') . '">+ Add to Wishlist</a>';}else{ $wishlist_link='';}
	
	     $get_discount_prod=mb_discount_product($featured_products->fields['products_id']);
	     $products_discount=($get_discount_prod==1)? '<div class="sale-product-icon" style="top:10px;">'.HEADER_SALE_LEFT_CORNER.'</div>' : '';
		 $new_top_position=($get_discount_prod==1)?'40px':'10px';
		 if(mb_featured_product($featured_products->fields['products_id'])==1){
			$ribbon='';
		}
		else if(mb_new_product($featured_products->fields['products_id'])==1){
			$ribbon='';
		}
		else {
		}
 ?>
 <?php 
 if((isset($_GET['view'])) && ($_GET['view']=='rows')){ $pos_list='style="display: block; opacity: 1;"';}else{ $pos_list='style="display: inline-block; opacity: 1;"'; }
 ?>
 <div class="mix col-xs-12 col-sm-6 col-lg-4 mix_all" <?php echo $pos_list; ?>>
    	<div data-filter="all products" data-name="<?php echo $products_name; ?>" data-discount="0" data-price="110" class="product">
        	<a class="product-link clearfix" href="<?php echo zen_href_link(zen_get_info_page($featured_products->fields['products_id']), 'cPath=' . zen_get_generated_category_path_rev($featured_products->fields['master_categories_id']) . '&products_id=' . $featured_products->fields['products_id']); ?>">
                <?php echo $ribbon;?>
                <div class="product-thumbnail">
                     <?php echo $display_products_image; ?>
                     <div class="caption bottom-left">
					 <?php 
					  // show discount price information 2015 07 27 tim 
						 if(!empty($products_price['show_special_price'])&&!empty($products_price['show_sale_discount']))
		                  {
                             echo $products_price['show_sale_discount'];
						  }
						
                       ?>
					 
					 </div>
                </div>
            </a>
            <div class="product-info clearfix">
                <h4 class="title">
                    <?php echo  $display_products_name; ?>
                </h4>
					<!-- show product models 2015 07 27 tim-->
				<?php echo  $products_model; ?>
				<div>  
				<?php  //show company price
				echo '<strong>'.$products_price['show_normal_price'].'</strong>'; 
                if(!empty($products_price['show_special_price'])) echo '<strong>'.$products_price['show_special_price'].'</strong>';
				?></div>
                <div class="description">
                    
                    <div class="text"><?php echo $display_products_description; ?></div>
                    <div class="add-to-cart">
                        <?php echo $listview_addtocartbtn; ?>
                    </div>
                    <div class="overlay">
                        <div class="product-actions">
                        	<?php echo $wishlist_link; ?>
                            <a class="addtocompare" title="<?php echo 'Add to Compare'; ?>" href="javascript: compareNew(<?php echo $featured_products->fields['products_id']; ?>, 'add')"><?php echo '+ Add to Compare'; ?></a>
                        </div>
                    </div>
                </div>
                <?php echo $addtocartbtn; ?>
            </div>
            </div>
        </div>
<?php
      $featured_products->MoveNext();
    }
  } else {
?>
<div class="col-xs-12"><div class="alert alert-info"><?php echo TEXT_NO_FEATURED_PRODUCTS; ?></div></div>
<?php
  }
?>
</div>
</div>