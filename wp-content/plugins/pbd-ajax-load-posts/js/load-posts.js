jQuery(document).ready(function($) {

	// The number of the next page to load (/page/x/).
	var pageNum = parseInt(pbd_alp.startPage) + 1;
	
	// The maximum number of pages the current query can return.
	var max = parseInt(pbd_alp.maxPages);
	
	// The link of the next page of posts.
	var nextLink = pbd_alp.nextLink;
	
	/**
	 * Replace the traditional navigation with our own,
	 * but only if there is at least one page of new posts to load.
	 */
	if(pageNum <= max) {
		// Insert the "More Posts" link.
		$('.olds')
			.append('<div class="posts-loaded pbd-alp-placeholder-'+ pageNum +'"></div>')
			/*.append('<p id="pbd-alp-load-posts"><a class="cargar-mas" href="#">Cargar Más</a></p>');*/
			.append('<div id="pbd-alp-load-posts" class="col-md-12 load-container second"><a class="load-more fade-fx" href="" title="Cargar Mas"></a></div>')
			
		// Remove the traditional navigation.
		$('.navigation').remove();
	}
	
	
	/**
	 * Load new posts when the link is clicked.
	 */
	$('#pbd-alp-load-posts a').click(function() {

		$('.highlights.olds.show').addClass("active");
	
		// Are there more posts to load?
		if(pageNum <= max) {
		
			// Show that we're working.
			$(this).text('');
			
			$('.pbd-alp-placeholder-'+ pageNum).load(nextLink + ' .post',
				function() {
					// Update page number and nextLink.
					pageNum++;
					nextLink = nextLink.replace(/paged[=].[0-9]?/, 'paged='+ pageNum);
					
					// Add a new placeholder, for when user clicks again.
					$('#pbd-alp-load-posts')
						.before('<div class="pbd-alp-placeholder-'+ pageNum +'"></div>')
					
					// Update the button message.
					if(pageNum <= max) {
						$('#pbd-alp-load-posts a').text('');
					} else {
						$('#pbd-alp-load-posts a').addClass('no-more');
					}
				}
			);
		} else {
			$('#pbd-alp-load-posts a').append('');
		}	
		
		return false;
	});
});