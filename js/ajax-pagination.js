(function($) {

	function find_page_number( element ) {
		element.find('span').remove();
		return parseInt( element.html() );
	}

	$(document).on( 'click', '.pull-left a', function( event ) {
		event.preventDefault();

		page = find_page_number( $(this).clone() );

		$.ajax({
			url: ajaxpagination.ajaxurl,
			type: 'post',
			data: {
				action: 'ajax_pagination',
				query_vars: ajaxpagination.query_vars,
				page: page
			},
			success: function( html ) {
				$('#main').find( '.entry' ).remove();
				$('#main').append( html );
			}
		})
	})
})(jQuery);