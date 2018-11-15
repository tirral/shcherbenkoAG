/**
 * Custom JS
 */
 ; (function ($) {
 	'use strict'



  // About us slider
  var projectOneSlider = function () {

    var swiper = new Swiper('.all-proj-slider .swiper-container', {
        pagination: {
          el: '.all-proj-slider .swiper-pagination',
          type: 'fraction',
        },
        navigation: {
          nextEl: '.all-proj-slider .swiper-button-next',
          prevEl: '.all-proj-slider .swiper-button-prev',
        },
      });


  };


  $(function () {
    projectOneSlider();
    	});
  })(jQuery);
