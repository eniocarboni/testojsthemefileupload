(function($) {
	$().ready(function() {
		let dw=$( window ).width();
		let container_width=dw - 18;
		$(".pkp_structure_content, .pkp_head_wrapper, .pkp_site_name_wrapper, .pkp_navigation_user, .pkp_structure_footer").css({width: dw + 'px'});
		/* add some icons to menu */ 
		/* login */
		$('li.profile > a[href$="/login"]').html('<i class="fa fa-sign-in fa-lg" aria-hidden="true"></i>' + $('li.profile > a[href$="/login"]').text() );
		/* logout */
		$('li.profile > a[href$="/signOut"]').html('<i class="fa fa-sign-out fa-lg" aria-hidden="true"></i>' + $('li.profile > a[href$="/signOut"]').text() );
		/* register */
		$('li.profile > a[href$="/register"]').html('<i class="fa fa-user-plus fa-lg" aria-hidden="true"></i>' + $('li.profile > a[href$="/register"]').text() );
		/* profile */
		$('li.profile > a[href$="/profile"]').html('<i class="fa fa-user fa-lg" aria-hidden="true"></i>' + $('li.profile > a[href$="/profile"]').text() );
		/* Administration */
		$('li.profile > a[href$="/admin/index"]').html('<i class="fa fa-user-secret fa-lg" aria-hidden="true"></i>' + $('li.profile > a[href$="/admin/index"]').text() );
		/* dashboard */
		$('li.profile > a[href$="/index/submissions"]').html('<i class="fa fa-tachometer fa-lg" aria-hidden="true"></i>' + $('li.profile > a[href$="/index/submissions"]').html() );
		/* lang block */
		$(".block_language .title").html('<i class="fa fa-globe fa-lg" aria-hidden="true"></i>' + $(".block_language .title").text() );
		$(".pkp_structure_sidebar .pkp_block h2:not(.pkp_screen_reader)").css({cursor: "pointer"});
		$(".pkp_structure_sidebar .pkp_block").on('click',function() {
			if (! $(this).children('h2').hasClass('pkp_screen_reader') ) {
				$(this).find(".content").toggle();
			}
		})
	});
	$(window).resize(function() {
		dw=$( window ).width();
		container_width=dw - 18;
		$(".pkp_structure_content, .pkp_head_wrapper, .pkp_site_name_wrapper, .pkp_navigation_user, .pkp_structure_footer").css({width: dw + 'px'});
		console.log("pkp_structure_content:width: " + container_width);
	});
})(jQuery);
