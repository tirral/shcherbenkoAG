/**
 * Custom JS
 */
 ; (function ($) {
 	'use strict'





var homepageslider = function () {
  var swiperProj = new Swiper('.project-slider .swiper-container', {
      pagination: {
        el: '.project-slider .swiper-pagination',
        type: 'fraction',
      },
      navigation: {
        nextEl: '.project-slider .swiper-button-next',
        prevEl: '.project-slider .swiper-button-prev',
      },
    });
    //change slider info (ppoject name and project data)
  var sliders = document.querySelectorAll('.project-slider .swiper-slide');

  var options = {
      'attributes': true,
      'attributeOldValue': true,
      'attributeFilter': ['class']
  }
  var mutationObserver = new MutationObserver(function(mutations) {
    for(var i=0; i<sliders.length; i++) {
        if(!sliders[i].classList.contains('swiper-slide-active')) continue;
        document.querySelector('.project-slider .project-title').textContent = sliders[i].dataset.name;
        document.querySelector('.project-slider .pub-data').textContent = sliders[i].dataset.calendar;
    }
  });
  mutationObserver.observe( document.querySelector('.project-slider .swiper-slide-active'), options);
  };



var homepagesliderPub = function () {
  var swiperPubl = new Swiper('.publications .swiper-container', {
    pagination: {
      el: '.publications .swiper-pagination',
      type: 'fraction',
    },
    navigation: {
      nextEl: '.publications .swiper-button-next',
      prevEl: '.publications .swiper-button-prev',
    },
  });
  var slidersPub = document.querySelectorAll('.publications-wrapper .swiper-slide');
  var options = {
      'attributes': true,
      'attributeOldValue': true,
      'attributeFilter': ['class']
  }
  var mutationObserverPub = new MutationObserver(function(mutations) {
    for(var i=0; i<slidersPub.length; i++) {
        if(!slidersPub[i].classList.contains('swiper-slide-active')) continue;
        document.querySelector('.publications-wrapper .pub-data').textContent = slidersPub[i].dataset.calendar;
    }
  });
  mutationObserverPub.observe( document.querySelector('.publications-wrapper .swiper-slide-active'), options);
  };



  $(function () {
    homepageslider();
    homepagesliderPub();
  	});
  })(jQuery);
