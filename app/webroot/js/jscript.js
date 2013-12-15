$(function() {
	/********************
	 *
	 *	If browser == IE
	 *
	 ********************/
/*	
	if (navigator.appName == 'Microsoft Internet Explorer') {
		$("#album #album-body .album-description ol").css("width", "100%");
	}
	/********************
	 *
	 *	Search bar
	 *
	 ********************/
	$("#search-form").submit(function(){
		if($("#search").val().replace(/ /g, "").length > 0) {
			return true;
		}
		$("#search").val("").focus();
		return false;
	});
	/********************
	 *
	 *	Menus
	 *
	 ********************/
	/*	when mouse hover a menu	*/
	$(".menu-wrap .menu > ul > li").hover(function() {
		$(".menu-wrap .menu > ul > li > ul > li:first-child").addClass("bubble up");
		$(this).find("UL").stop().slideToggle(300);
	});
	
	$(this).scroll(function() {
		//console.debug($(this).scrollTop());
	});
	/********************
	 *
	 *	Tooltip
	 *
	 ********************/
	/*$("[title]").hover(function(){
		var title = $(this).attr("title");
		$(this).data("Text", title).removeAttr("title");
		$("<p id='tooltip'></p>").text(title).appendTo("#body").fadeIn("slow");
	}, function(){
		$(this).attr("title", $(this).data("Text"));
		$("#tooltip").remove();
	}).mousemove(function(e){
		var mouseX = e.pageX + 15;
		var mouseY = e.pageY + 5;
		$("#tooltip").css({top:mouseY, left:mouseX});
	});*/
});
