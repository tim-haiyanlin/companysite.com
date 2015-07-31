<?php
/**
 * new_products.php module
 *
 * @package modules
 * @copyright Copyright 2003-2008 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: new_products.php 8730 2008-06-28 01:31:22Z drbyte $
 */
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}

// initialize vars
$categories_products_id_list = '';
$list_of_products = '';
$new_products_query = '';

$display_limit = zen_get_new_date_range();

if ( (($manufacturers_id > 0 && $_GET['filter_id'] == 0) || $_GET['music_genre_id'] > 0 || $_GET['record_company_id'] > 0) || (!isset($new_products_category_id) || $new_products_category_id == '0') ) {
	//show product model ,add p.products_model column 2015 07 17 
  $new_products_query = "select distinct p.products_id, p.products_model, p.products_image, p.products_tax_class_id, pd.products_name,
                                p.products_date_added, p.products_date_available, p.products_price, p.products_type, 
								p.master_categories_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd
                           where p.products_id = pd.products_id
						   and p.products_date_available IS NULL
                           and pd.language_id = '" . (int)$_SESSION['languages_id'] . "'
                           and   p.products_status = 1 " . $display_limit;
} else {
  // get all products and cPaths in this subcat tree
  $productsInCategory = zen_get_categories_products_list( (($manufacturers_id > 0 && $_GET['filter_id'] > 0) ? zen_get_generated_category_path_rev($_GET['filter_id']) : $cPath), false, true, 0, $display_limit);

  if (is_array($productsInCategory) && sizeof($productsInCategory) > 0) {
    // build products-list string to insert into SQL query
    foreach($productsInCategory as $key => $value) {
      $list_of_products .= $key . ', ';
    }
    $list_of_products = substr($list_of_products, 0, -2); // remove trailing comma
    //show product model ,add p.products_model column 2015 07 17 
    $new_products_query = "select distinct p.products_id, p.products_model, p.products_image, p.products_tax_class_id, pd.products_name,
                                  p.products_date_added, p.products_date_available, p.products_price, p.products_type, 
								  p.master_categories_id
                           from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd
                           where p.products_id = pd.products_id
						   and p.products_date_available IS NULL
                           and pd.language_id = '" . (int)$_SESSION['languages_id'] . "'
                           and p.products_status = 1
                           and p.products_id in (" . $list_of_products . ")";
  }
}
//echo $new_products_query;
if ($new_products_query != '') $new_products = $db->ExecuteRandomMulti($new_products_query, MAX_DISPLAY_NEW_PRODUCTS);

$row = 0;
$col = 0;
$list_box_contents = array();
$title = '';

$num_products_count = ($new_products_query == '') ? 0 : $new_products->RecordCount();

// show only when 1 or more
if ($num_products_count > 0) {
  if ($num_products_count < SHOW_PRODUCT_INFO_COLUMNS_NEW_PRODUCTS || SHOW_PRODUCT_INFO_COLUMNS_NEW_PRODUCTS == 0 ) {
    $col_width = floor(100/$num_products_count);
  } else {
    $col_width = floor(100/SHOW_PRODUCT_INFO_COLUMNS_NEW_PRODUCTS);
  }

  while (!$new_products->EOF) {
    $products_price = zen_mb_get_products_display_price_from_company($new_products->fields['products_id']);
	// hide product ribbon new tag msg_product="<div class='ribbon new' title=''>New</div> 2015 07 17 ";
	$msg_product='';
	
	$products_description = zen_trunc_string(zen_clean_html(stripslashes(zen_get_products_description($new_products->fields['products_id'], $_SESSION['languages_id']))), PRODUCT_LIST_DESCRIPTION); //To Display Product Desc 
	
	$products_description = ltrim(substr($products_description, 0, $product_desc_length) . '..'); //Trims and Limits the desc

	$products_name = $new_products->fields['products_name'];
     //product_name_length is 25 from document C:\xampp\htdocs\workspace\companysite.com\includes\templates\shopfast\common\tpl_shopfast_custom_css.php line54 20150717 tim
	$products_name = ltrim(substr($products_name, 0, $product_name_length) . ''); //Trims and Limits the product name
	
	//show product model,define $products_model
	$products_model=$new_products->fields['products_model'];

	$products_model = ltrim(substr($products_model, 0, '25') . ''); //Trims and Limits the model name 25 from document 
	
	$products_model='<div class="products_model_company">SKU: '.$products_model.'</div>';

    //define our company discount informatin
     $companyDiscount='';
	 $companyprice='';
	  if(!empty($products_price['show_special_price'])&&!empty($products_price['show_sale_discount']))
	  {
		 
		$companyDiscount=$products_price['show_sale_discount'];
		 
	  }
       $companyprice='<strong>'.$products_price['show_normal_price'].'</strong>';
        if(!empty($products_price['show_special_price'])) $companyprice.='<strong>'.$products_price['show_special_price'].'</strong>';


    if (!isset($productsInCategory[$new_products->fields['products_id']])) $productsInCategory[$new_products->fields['products_id']] = zen_get_generated_category_path_rev($new_products->fields['master_categories_id']);
	
	$new_products->fields['products_name'] = zen_get_products_name($new_products->fields['products_id']);
	if (UN_MODULE_WISHLISTS_ENABLED) { $wishlist_link= '<div class="overlay"><div class="product-actions"><a data-original-title="Add to Wishlist" data-toggle="tooltip" class="wishlink" href="' . zen_href_link(UN_FILENAME_WISHLIST, 'products_id=' . $new_products->fields['products_id'] . '&action=wishlist_add_product') . '"></a><a data-original-title="Add to Compare" data-toggle="tooltip" class="addtocompare" href="javascript: compareNew('.$new_products->fields['products_id'].', \'add\')"></a></div></div>';}else{ $wishlist_link='';}
    // line 100 create Model:'.$products_model 20150717
    $list_box_contents[$row][$col] = array('params' => 'class="item centerBoxContentsNew centeredContent back wow fadeInUp animated" data-wow-duration="2s"' . ' ',
    'text' => (($new_products->fields['products_image'] == '' and PRODUCTS_IMAGE_NO_IMAGE_STATUS == 0) ? '' : 
	'<div class="product">
			<a class="product-link" href="' . zen_href_link(zen_get_info_page($new_products->fields['products_id']), 'cPath=' . $productsInCategory[$new_products->fields['products_id']] . '&products_id=' . $new_products->fields['products_id']) . '">' .$msg_product.'
			<div class="product-thumbnail">'.zen_image(DIR_WS_IMAGES . $new_products->fields['products_image'], $new_products->fields['products_name'], IMAGE_PRODUCT_NEW_HEIGHT, IMAGE_PRODUCT_NEW_WIDTH).'<div class="caption bottom-left">'.$companyDiscount.'</div></div></a>
		'.$wishlist_link.'
		<div class="product-name-desc">
			<div class="product_name">') .  
				'<a href="' . zen_href_link(zen_get_info_page($new_products->fields['products_id']), 'cPath=' . $productsInCategory[$new_products->fields['products_id']] . '&products_id=' . $new_products->fields['products_id']) . '">' . $products_name . '</a>'.$products_model.'<div>'.$companyprice.'</div>'.
                zen_get_buy_now_button($new_products->fields['products_id'],'<a class="product_cart_image" data-toggle="tooltip" data-original-title="Add to Cart" href="' . zen_href_link($_GET['main_page'], zen_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $new_products->fields['products_id']) . '"></a>').'
			</div>
		</div>
	 </div>');
	
    $col ++;
    if ($col > (SHOW_PRODUCT_INFO_COLUMNS_NEW_PRODUCTS - 1)) {
      $col = 0;
      $row ++;
    }
    $new_products->MoveNextRandom();
  }

	 
	 
	 /* create new arriave button link  20150716 tim    */
	$mybutton="<span id='mycompanybutton'>".strtoupper(TABLE_HEADING_NEW_PRODUCTS)."</span>
	           <span id='mycompanybuttonShopMore'><a href='products_new.html'>shop more<span id='mycompanybuttonArrow'></span></a></span>";	 
	
  if ($new_products->RecordCount() > 0) {
    if (isset($new_products_category_id) && $new_products_category_id != 0) {
      $category_title = zen_get_categories_name((int)$new_products_category_id);
      $title = '
	 <div class="box_heading box_heading_new section">
	  	<h4 class="section-title">'. sprintf($mybutton, strftime('%B')) . ($category_title != '' ? ' - ' . $category_title : '' ) . ' </h4>
	 </div>';
    } else {
      $title = '
	<div class="box_heading box_heading_new section">
	  	<h4 class="section-title">'. sprintf($mybutton, strftime('%B')) . ($category_title != '' ? ' - ' . $category_title : '' ) . ' </h4>
	</div>';
    }
    $zc_show_new_products = true;
  }
}
	
	
	

	
	
	
	
?>