<?php
/**
* Template designed by 12leaves.com
* 12leaves.com - Free ecommerce templates and design services
*
* Common Template
* 
* @package languageDefines
* @copyright Copyright 2009-2010 12leaves.com
* @copyright Copyright 2003-2005 Zen Cart Development Team
* @copyright Portions Copyright 2003 osCommerce
* @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
* @version $Id: tpl_box_default_right.php 2975 2006-02-05 19:33:51Z birdbrain $
*/

// choose box images based on box position

//
?>
<!--// bof: <?php echo $box_id; ?> //-->

<?php //echo $content; ?>

<!--// eof: <?php echo $box_id; ?> //-->
<style>
.shopbycolor li{list-style: none; float: left; padding: 0px !important; background: #fff; border: 1px solid #eee; margin: 10px 6px 5px 9px; width: 20px; height: 20px;}
.shopbycolor li a div{padding: 0px !important; width: 18px; height: 18px;}
.shopbycolor li a{padding: 0 !important;}
.shopbycolor li:hover{border: 1px solid black;}
.colorname{width: 75px; height: 39px; background: url('../images/colorname.gif'); position: relative; top: -62px; left: -27px; float: left; text-align: center; line-height: 30px; display: none;}
</style>

<script>
$(document).ready(function(){
  $(".shopbycolor li").mouseenter(function() {
    $(this).find( ".colorname" ).css("display","block");
  });
  $(".shopbycolor li").mouseleave(function() {
    $(this).find( ".colorname" ).css("display","none");
  });
});
</script>
<div class="clear"></div>
<div style="padding: 10px 0; margin: 10px 0 15px 0; border:1px solid #ccc;">
<div style="font-size: 16px; color: #000; text-align:center;">Shop By Color</div>
<ul class="shopbycolor">
        
    <li><a href="/color-5.html"><div style="background: #fabef1;"></div></a><div class="colorname" style="display: none;">Pink</div></li>
         
    <li><a href="/color-50.html"><div style="background: #00FFFF;"></div></a><div class="colorname">Aqua</div></li>
         
    <li><a href="/color-7.html"><div style="background: #000000;"></div></a><div class="colorname">Black</div></li>
         
    <li><a href="/color-8.html"><div style="background: #ffffff;"></div></a><div class="colorname">White</div></li>
         
    <li><a href="/color-9.html"><div style="background: #ff0000;"></div></a><div class="colorname">Red</div></li>
         
    <li><a href="/color-10.html"><div style="background: #4cc417;"></div></a><div class="colorname">Green</div></li>
         
    <li><a href="/color-11.html"><div style="background: #000080;"></div></a><div class="colorname">Navy</div></li>
         
    <li><a href="/color-12.html"><div style="background: #ffff00;"></div></a><div class="colorname">Yellow</div></li>
         
    <li><a href="/color-13.html"><div style="background: #ff7f00;"></div></a><div class="colorname">Orange</div></li>
         
    <li><a href="/color-14.html"><div style="background: #ff00ff;"></div></a><div class="colorname">Hot Pink</div></li>
         
    <li><a href="/color-15.html"><div style="background: #8a2be2;"></div></a><div class="colorname">Purple</div></li>
         
    <li><a href="/color-17.html"><div style="background: #c0c0c0;"></div></a><div class="colorname">Grey</div></li>
         
    <li><a href="/color-51.html"><div style="background: #008080;"></div></a><div class="colorname">Teal</div></li>
         
    <li><a href="/color-20.html"><div style="background: #6F4E37;"></div></a><div class="colorname">Coffee</div></li>
         
    <li><a href="/color-58.html"><div style="background: #6a287e;"></div></a><div class="colorname">Dark Purple</div></li>
         
    <li><a href="/color-59.html"><div style="background: #C4BD8E;"></div></a><div class="colorname">Beige</div></li>
         
    <li><a href="/color-23.html"><div style="background: #FFF8DC;"></div></a><div class="colorname">Ivory</div></li>
         
    <li><a href="/color-49.html"><div style="background: #8B0000;"></div></a><div class="colorname">Burgundy</div></li>
         
    <li><a href="/color-52.html"><div style="background: #FFD700;"></div></a><div class="colorname">Gold</div></li>
         
    <li><a href="/color-56.html"><div style="background: #254117;"></div></a><div class="colorname">Dark Green</div></li>
         
    <li><a href="/color-30.html"><div style="background: #0000FF;"></div></a><div class="colorname">Blue</div></li>
         
    <li><a href="/color-31.html"><div style="background: #808000;"></div></a><div class="colorname">Olive</div></li>
         
    <li><a href="/color-32.html"><div style="background: #DCDCDC;"></div></a><div class="colorname">Silver</div></li>
         
    <li><a href="/color-55.html"><div style="background: #3BB9FF;"></div></a><div class="colorname">Turquoise</div></li>
         
    <li><a href="/color-54.html"><div style="background: #C58917;"></div></a><div class="colorname">Brown</div></li>
         

      


</ul>
<div style="clear: both;"></div>
</div>

<div class="clear"></div>

