﻿// Dynamic filter boxes
$("div.dynamicfilterContent").eq(0).ready(function() {
// Show more link if appropriate
	$('ul.dFilterExpand').each(function() {
	    if( $(this).attr("scrollHeight") > 130 ) $(this).height(130).siblings('a.dFilterToggle').show();
	});
// Expand/collapse
    $("a.dFilterToggle").click(function(){
        if( $(this).siblings("ul.dFilterExpand").height() == 130 ){
            $('.dFilterToggleImg',$(this)).attr('src', $('.dFilterToggleImg').attr('src').replace('_more', '_less')).attr('alt', 'Less').attr('title', 'Less');
            $(this).html($(this).html().replace("More", "Less"));
            $(this).siblings("ul.dFilterExpand").animate({height: $(this).siblings("ul.dFilterExpand").attr("scrollHeight")}, "slow");
        }else{
            $('.dFilterToggleImg',$(this)).attr('src', $('.dFilterToggleImg').attr('src').replace('_less', '_more')).attr('alt', 'More').attr('title', 'More');
            $(this).html($(this).html().replace("Less", "More"));
            $(this).siblings("ul.dFilterExpand").animate({height: 130}, "slow");
        }
	return false;
    });
});