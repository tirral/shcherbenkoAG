/**
 * Custom JS
 */
 ; (function ($) {
 	'use strict'

    // Live search
    var liveSearch = function () {
      $('.artists-list li').each(function(){
      $(this).attr('data-search-term', $(this).text().toLowerCase());
      });
    $('.live-search-box').on('keyup', function(){
    var searchTerm = $(this).val().toLowerCase();
        $('.artists-list li').each(function(){
            if ($(this).filter('[data-search-term *= ' + searchTerm + ']').length > 0 || searchTerm.length < 1) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
    };


  $(function () {
    liveSearch();
    	});
  })(jQuery);
