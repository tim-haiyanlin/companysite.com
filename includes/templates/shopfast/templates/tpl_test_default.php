<?php

echo 'that start now<br>';
//echo FILENAME_SHOPPING_CART;
//echo zen_href_link('index','&pg=store&cPath=1');

?>
<script language="javascript">  
function getPosition(obj){ 
    var topValue= 0,leftValue= 0;
    while(obj){  
	  leftValue+= obj.offsetLeft;
	  topValue+= obj.offsetTop; 
	  obj= obj.offsetParent;   
	 
    }   
  // finalvalue = leftValue + "," + topValue;  
  // alert( finalvalue); 
   createDiv();
}
function createDiv()
{
	//alert('aaaaaa');
var mydiv =document.createElement("div"); 

mydiv.style.width="50px"; 
mydiv.style.height="55px"; 
mydiv.style.border="1px solid red"; 
mydiv.style.position="absolute";
mydiv.style.top="50px";
mydiv.style.left="50px";
//mydiv.style.backgroundColor="green" ;


document.getElementById("timtestid").appendChild(mydiv); 
}
</script>  
<div id='companyAlert'>
   <div class='mycontent' id='timtestid'><input type="button" id="mybutton" value='clickaa' onclick="getPosition(this)"></div>
 
</div>

