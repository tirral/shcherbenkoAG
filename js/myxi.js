/**
 * Custom JS
 */
 ; (function ($) {
 	'use strict'



  // About us slider
  var myxiSlider = function () {

    var swiper = new Swiper('.m-slider .swiper-container', {
      pagination: {
        el: '.m-slider .swiper-pagination',
        type: 'fraction',
      },
      navigation: {
        nextEl: '.m-slider .swiper-button-next',
        prevEl: '.m-slider .swiper-button-prev',
      },
    });

  };


var myxiReadMore = function () {

  $('.read-more-1').readmore({
       speed: 250,
       maxHeight: 0,
       heightMargin: 16,
       moreLink: `<div class="read-more">
                       <span>Читать больше</span>
                   </div>`,
       lessLink:  `<div class="read-more">
                       <span>Скрыть</span>
                   </div>`,
       });

        $('.artist-exhibitions-list-individ').readmore({
       speed: 250,
       maxHeight: 240,
       heightMargin: 16,
       moreLink: `<div class="read-more">
                       <span>Читать больше</span>
                   </div>`,
       lessLink:  `<div class="read-more">
                       <span>Скрыть</span>
                   </div>`,
       });

       $('.artist-exhibitions-list-group').readmore({
       speed: 250,
       maxHeight: 240,
       heightMargin: 16,
       moreLink: `<div class="read-more">
                       <span>Читать больше</span>
                   </div>`,
       lessLink:  `<div class="read-more">
                       <span>Скрыть</span>
                   </div>`,
       });

  };






  $(function () {
    myxiSlider();
    myxiReadMore();
    	});
  })(jQuery);
