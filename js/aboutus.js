/**
 * Custom JS
 */
 ; (function ($) {
 	'use strict'



  // About us slider
  var aboutUsSlider = function () {
  document.querySelector('.slider').addEventListener('click', function(e){
  	if(e.target.classList.contains ('slide-active') || e.target.classList.contains('slider')) return;

  	document.querySelectorAll('.swiper-slide').forEach(function(slide){
  		if(!slide.classList.contains('slide-active')) return;
          slide.classList.remove('slide-active');
  	})
      e.target.classList.add('slide-active');
  })
  };


  $(function () {
    aboutUsSlider();
    	});
  })(jQuery);
