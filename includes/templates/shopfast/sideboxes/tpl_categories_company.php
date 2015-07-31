
<div id="companycategories">
 <h3 class="leftBoxHeading" id="categoriesHeading" style="margin-bottom:1px;">Categories</h3>	
<ul id="nav" class="nav">
   
	<li id='categories' class="<?php if($pg=='categories') { echo "tab_active";}?>">
            
			<?php			
         		// load the UL-generator class and produce the menu list dynamically from there
         		require_once (DIR_WS_CLASSES . 'categories_ul_generator.php');
         		$zen_CategoriesUL = new zen_categories_ul_generator;
        		$menulist = $zen_CategoriesUL->buildTree(true);

			   	$menulist = str_replace('"level4"','"level5"',$menulist);
			   	$menulist = str_replace('"level3"','"level4"',$menulist);
			   	$menulist = str_replace('"level2"','"level3"',$menulist);
			   	$menulist = str_replace('"level1"','"level2"',$menulist);

			   	$menulist = str_replace('<li class="">','<li class="">',$menulist);
			   	$menulist = str_replace("</li>\n</ul>\n</li>\n</ul>\n","</li>\n</ul>\n",$menulist);
			   	//echo "<pre>";
          echo $menulist;
          //echo "</pre>";
        	?>
			
            </li>
            
       
 </ul>

 </div>

