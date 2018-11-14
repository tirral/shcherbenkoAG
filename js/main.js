/**
 * Custom JS
 */
 ; (function ($) {
 	'use strict'

// Main menu button
  var menuOpen = function () {
  document.querySelector('.menu-icon').addEventListener('click', function() {
      this.classList.toggle('open');
      document.querySelector('.menu').classList.toggle('dsp-none')
    })
  };

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



var readmore = function () {

  $('.artist-bio-text').readmore({
          speed: 250,
          maxHeight: 66,
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



var onePageWorkShow = function () {
  // close hint
  const close = document.querySelector('.hint-close');
  const hint = document.querySelector('.hint');

  close.addEventListener('click', function() {
      hint.style.display = 'none';
  })

  // fancybox
  $('[data-fancybox="fancy-photo"]').fancybox({
      overlayOpacity: 1,
      overlayColor: '#000',
  });

  var scale = 1;
  function sizePic() {
      var size = document.querySelector("#size").value;
      var img = document.querySelector('.fancybox-image');
      if(img === undefined) return;
      img.style.transform = `scale(${size})`;
  }




};


  $(function () {
    menuOpen();
    liveSearch();
    readmore();
  //  aboutUsSlider();
    //homepageslider();
    //homepagesliderPub();
    onePageWorkShow();
    onePageWorkShow();
  	});
  })(jQuery);
