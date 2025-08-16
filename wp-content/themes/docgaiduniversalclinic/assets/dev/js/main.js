// "use strict";

// (function ($) {
//     const maxLength = 30;
//     $('.episode-title').each(function () {
//         const fullText = $(this).text();
//         if (fullText.length > maxLength) {
//             const truncatedText = fullText.slice(0, maxLength) + '... ';
//             $(this).text(truncatedText);

//             const readMoreLink = $('<span class="read-more">Read More</span>');
//             readMoreLink.on('click', function () {
//                 $(this).parent().text(fullText);
//             });

//             $(this).append(readMoreLink);
//         }
//     });

//     $('#videoPlaceholder').on('click', function () {
//         var videoSrc = $('#video').attr('src');
//         if (videoSrc) {
//             $('#videoPlaceholder').hide();
//             $('#video').show()[0].play();
//         } else {
//             $('#videoPlaceholder').replaceWith('<h3 class="text-center">Video is missing</h3>');
//         }
//     });
//     var swiper = new Swiper(".mySwiper", {
//         slidesPerView: 1,
//         spaceBetween: 0,
//         pagination: {
//             el: ".swiper-pagination",
//             clickable: true,
//         },
//         navigation: {
//             nextEl: ".swiper-button-next",
//             prevEl: ".swiper-button-prev",
//         },
//         breakpoints: {
//             768: {
//                 slidesPerView: 2,
//                 spaceBetween: 20,
//             },
//             1024: {
//                 slidesPerView: 3,
//                 spaceBetween: 30,
//             },
//         },
//     });
    
//     var swiper_awards = new Swiper(".swiper-awards", {
//         slidesPerView: 2,
//         grid: {
//             rows: 4,
//             fill: "row",
//         },
//         spaceBetween: 0,
//         slidesPerGroupAuto: true,
//         pagination: {
//             el: ".swiper-pagination",
//             clickable: true,
//         },
//         loop: false,
//     });



//     var attorneySwiper = new Swiper(".attorneys-swiper", {
//         slidesPerView: 1,
//         spaceBetween: 20,
//         pagination: {
//             el: ".swiper-pagination",
//             clickable: true,
//         },
//         navigation: {
//             nextEl: ".swiper-button-next",
//             prevEl: ".swiper-button-prev",
//         },
//         breakpoints: {
//             768: {
//                 slidesPerView: 2,
//                 spaceBetween: 20,
//             },
//             1024: {
//                 slidesPerView: 3,
//                 spaceBetween: 30,
//             },
//             1400: {
//                 slidesPerView: 4,
//                 spaceBetween: 20,
//             },
//         },
//     });

//     var swiper = new Swiper(".railroaded-swiper", {
//         slidesPerView: 1,
//         spaceBetween: 10,
//         pagination: {
//             el: ".swiper-pagination",
//             clickable: true,
//         },
//     });


//     var swiper = new Swiper(".youtube-swiper", {
//         slidesPerView: 1,
//         spaceBetween: 1,
//         pagination: {
//             el: ".swiper-pagination",
//             clickable: true,
//         },
//         breakpoints: {
//             768: {
//                 slidesPerView: 2,
//                 spaceBetween: 20,
//             },
//             1024: {
//                 slidesPerView: 3,
//                 spaceBetween: 30,
//             },
//         },
//         navigation: {
//             nextEl: ".swiper-button-next",
//             prevEl: ".swiper-button-prev",
//         },
//     });

//     var swiper = new Swiper(".google-review-swiper", {
//         slidesPerView: 1,
//         grid: {
//             rows: 1
//         },
//         spaceBetween: 30,
//         pagination: {
//             el: ".swiper-pagination",
//             clickable: true
//         },
//         navigation: {
//             nextEl: ".swiper-button-next",
//             prevEl: ".swiper-button-prev"
//         },
//         breakpoints: {
//             786: {
//                 slidesPerView: 2,
//                 spaceBetween: 30,
//                 grid: {
//                     rows: 2
//                 }
//             }
//         }
//     });

//     var swiper = new Swiper(".swiper-container", {
//         slidesPerView: 1,
//         grid: {
//             rows: 1
//         },
//         spaceBetween: 30,
//         pagination: {
//             el: ".swiper-pagination",
//             clickable: true
//         },
//         navigation: {
//             nextEl: ".swiper-button-next",
//             prevEl: ".swiper-button-prev"
//         },
//         breakpoints: {
//             480: {
//                 slidesPerView: 2,
//                 spaceBetween: 10,
//                 grid: {
//                     rows: 2
//                 }
//             },
//             786: {
//                 slidesPerView: 3,
//                 spaceBetween: 10,
//                 grid: {
//                     rows: 2
//                 }
//             }
//         }
//     });

//     var swiper = new Swiper(".guidebookSlider", {
//         slidesPerView: 1,
//         spaceBetween: 30,
//         pagination: {
//             el: ".swiper-pagination",
//             clickable: true,
//         },
//         navigation: {
//             nextEl: ".swiper-button-next",
//             prevEl: ".swiper-button-prev"
//         },
//         breakpoints: {
//             786: {
//                 slidesPerView: 3,
//                 spaceBetween: 10,
//             }
//         }
//     });


//     // TODO Youtube Iframe
//     $('.youtubeiFrame').on('click', function () {
//         if ($(this).data('iframeurl')) {
//             $(this).find('img').remove();
//             $(this).append('<iframe src="' + $(this).data('iframeurl') + '" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="width: 100%;height: 300px;"> </iframe>');
//         }
//     });

//     // TODO FAQ Sorting Functionality
//     $('#filters a').on('click', function (e) {
//         e.preventDefault();
//         let term = $(this).data('filter');
//         $(this).addClass('faq-filter-active').siblings().removeClass('faq-filter-active');
//         if (term === 'all') {
//             $('#items li').css('display', 'inline-block');
//         } else {
//             $('#items li').hide();
//             $('#items li[data-filter-item="' + term + '"]').css('display', 'inline-block');;
//         }
//     });

//     // TODO Redirect Thanks Page
//     document.addEventListener('wpcf7mailsent', function (event) {
//         window.location.href = '/thank-you/';
//     }, false);

//     // TODO Scroll To ID
//     $(document).on('click', 'a[href^=\\#]', function (e) {
//         let el = $($(this).attr('href'));
//         if (el.length && el.offset()) { // one of those may be unnecessary
//             e.preventDefault();
//             $('html, body').animate({
//                 scrollTop: el.offset().top - $('header').height()
//             }, 2000);
//         }
//     });

//     // TODO Menu mobile
//     $('button.burger').on('click', function () {
//         $('body').toggleClass('overflowGlobal');
//         $('.header-nav').toggleClass('active');
//         $(this).toggleClass('burger-active');
//     });

//     // TODO Add functionality for the mobile menu open
//     $('.header .genesis-nav-menu > ul > .menu-item-has-children').on('click', function () {
//         if ($('.header').hasClass('header-mobile')) {
//             $(this).toggleClass('open').children().last().slideToggle(150);
//         } else {
//             $(this).toggleClass('open');
//         }
//     });

//     $('.header .genesis-nav-menu > ul > .menu-item-has-children .menu-item-has-children').on('click', function (event) {
//         event.stopPropagation();
//         if ($('.header').hasClass('header-mobile')) {
//             $(this).toggleClass('open').children().last().slideToggle(150);
//         } else {
//             $(this).toggleClass('open');
//         }
//     });

//     // TODO Header active class, CTA on mobile and btn up fixed elements
//     let lastScrollTop = 0;
//     function menuFixed() {
//         // Header Active Class
//         if ($(window).scrollTop() > 20) {
//             $('.header').addClass('header-active');
//         } else {
//             $('.header').removeClass('header-active');
//         }
//         // CTA on mobile show/hide
//         let st = $(this).scrollTop();
//         let header = $('header.header');
//         if (header.hasClass('header-mobile')) {
//             if ($(window).scrollTop() > 350) {
//                 if (st >= lastScrollTop) {
//                     header.addClass('header-scroll');
//                 } else {
//                     header.removeClass('header-scroll')
//                 }
//             }
//             lastScrollTop = st;
//         }
//         // Btn Up Active Show/Hide
//         if ($(this).scrollTop() > 500) {
//             $('#scrollToTop').addClass('btn-up-active');
//         } else {
//             $('#scrollToTop').removeClass('btn-up-active');
//         }
//     }

//     $(window).bind('scroll', menuFixed);

//     // TODO scroll body to 0px on click
//     $('#scrollToTop').on('click', function (event) {
//         event.preventDefault();
//         $('body,html').animate({
//             scrollTop: 0
//         }, 700);
//         $(this).removeClass('btn-up-active');
//     });

//     //TODO HD Modal

//     $('.open-hd-modal').click(function () {
//         var hdModalTitle = $(this).data('hd-modal-title');
//         var hdModalContentType = $(this).data('hd-modal-content-type');
//         var hdModalContent = $(this).data('hd-modal-content');
//         var hdModalHTML = '<div class="hd-modal">';

//         hdModalHTML += '<div class="hd-modal-top">';
//         if (hdModalTitle) {
//             hdModalHTML += '<span class="hd-modal-title">' + hdModalTitle + '</span>';
//         }
//         hdModalHTML += '<div class="hd-modal-close">' + '<svg clip-rule="evenodd" width="24" height="24" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m12 10.93 5.719-5.72c.146-.146.339-.219.531-.219.404 0 .75.324.75.749 0 .193-.073.385-.219.532l-5.72 5.719 5.719 5.719c.147.147.22.339.22.531 0 .427-.349.75-.75.75-.192 0-.385-.073-.531-.219l-5.719-5.719-5.719 5.719c-.146.146-.339.219-.531.219-.401 0-.75-.323-.75-.75 0-.192.073-.384.22-.531l5.719-5.719-5.72-5.719c-.146-.147-.219-.339-.219-.532 0-.425.346-.749.75-.749.192 0 .385.073.531.219z"/></svg></div></div>';

//         if (hdModalContentType === 'youtube') {
//             hdModalHTML = hdModalHTML + '<div class="hd-modal-before"><iframe src="https://www.youtube.com/embed/' + hdModalContent + '?autoplay=1&mute=1" allow="autoplay" allowfullscreen></iframe></div>';
//         } else if (hdModalContentType === 'wistia') {
//             hdModalHTML += `<div class="hd-modal-before"><iframe src="https://fast.wistia.net/embed/iframe/${hdModalContent}" allowfullscreen frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allow="autoplay; fullscreen" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none;"></iframe></div><script src="https://fast.wistia.com/embed/medias/${hdModalContent}.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script>`;
//         } else {
//             hdModalHTML = hdModalHTML + hdModalContent;
//         }

//         $('#hd-modal-container').append(hdModalHTML);
//         $('#hd-modal-container').fadeIn();
//     });
//     $(document).on('click', '.hd-modal-close , #hd-modal-container', function (e) {
//         /*
//         * The First Statement checks if the user is clicking outside of the modal
//         * The Second Statement checks if the user clicked the X button
//         * Meaning this if is: If User clicked outside of the modal OR clicked on the X button, destroy the modal
//         * */
//         if (($(this).is('#hd-modal-container') && !$(e.target).closest('.hd-modal').length) || $(this).hasClass('hd-modal-close')) {
//             $('#hd-modal-container').fadeOut(function () {
//                 $(this).empty();
//             });
//         }
//     });

// })(jQuery);

var $ = jQuery;
$(document).ready(function() {
  // es pahi or@ jam@ ropen u varkyan@ vercvuma php-ic (js-@ wordpressi timezoni het normal chi ashxatum)
  var currentHour = parseInt($("#current_time_hour").text()); 
  var currentSecond = parseInt($("#current_time_second").text()); 
  var currentMinute = parseInt($("#current_time_minute").text()); 
  var currentDay = parseInt($("#current_day").text()); 
  

  // ashxatanqi skzbi u verji masin informacian vercvuma zpam.eu-i working times sectionic
  var todaysWorkingTimes = $("#todaysWorkTimeStartAt_" + currentDay).text();
  
  var todaysWorkTimeStartAtHour = 0;
  var todaysWorkTimeFinishAtHour = 0;
  
  var todaysWorkTimeStartAtMinute = 0;
  var todaysWorkTimeFinishAtMinute = 0;

  
  if(currentDay > 0 && currentDay <= 5) {
    
    var todaysWorkTimeStartAtHour = parseInt(todaysWorkingTimes.split(" — ")[0].split(":")[0]);
    var todaysWorkTimeFinishAtHour = parseInt(todaysWorkingTimes.split(" — ")[1].split(":")[0]);
    var todaysWorkTimeStartAtMinute = parseInt(todaysWorkingTimes.split(" — ")[0].split(":")[1]);
    var todaysWorkTimeFinishAtMinute = parseInt(todaysWorkingTimes.split(" — ")[1].split(":")[1]);
    
    console.log("1",todaysWorkTimeStartAtHour,todaysWorkTimeFinishAtHour,todaysWorkTimeStartAtMinute,todaysWorkTimeFinishAtMinute)

    if( toSecond(todaysWorkTimeStartAtHour,todaysWorkTimeStartAtMinute) > toSecond(currentHour,currentMinute)) {
      console.log(1)
      close();
      setTimeout(open, timing(currentHour, todaysWorkTimeStartAtHour, currentMinute, todaysWorkTimeStartAtMinute, currentSecond));
      setTimeout(close, timing(currentHour, todaysWorkTimeFinishAtHour, currentMinute, todaysWorkTimeFinishAtMinute, currentSecond));
    }
    else if(toSecond(todaysWorkTimeStartAtHour, todaysWorkTimeStartAtMinute) < toSecond(currentHour,currentMinute) < toSecond(todaysWorkTimeFinishAtHour,todaysWorkTimeFinishAtMinute)) {
      console.log(2)
      open();
      setTimeout(close, timing(currentHour, todaysWorkTimeFinishAtHour, currentMinute, todaysWorkTimeFinishAtMinute, currentSecond));
    }
    else {
      console.log(3)
      close();
    }
  } else {
    close();
  }


  function timing(currentHour, checkpointHour, currentMinute, checkpointMinute, currentSecond) {
    var time = 0;
    var hoursToStart = 0;
    var minutesToStart = 0;
    var secondsToStart = 0;
    if(currentHour - checkpointHour < 0 || currentHour == checkpointHour) {
      hoursToStart = checkpointHour - currentHour
      if(currentMinute < checkpointMinute) {
        minutesToStart = checkpointMinute - currentMinute
      }
      else if (currentMinute > checkpointMinute) {
        minutesToStart = 60 - currentMinute + checkpointMinute
        hoursToStart--;
      }
      if (currentSecond != 0) {
        secondsToStart = 60 - currentSecond
        minutesToStart--;
      }
    }
    console.log(((hoursToStart * 60 * 60) + (minutesToStart * 60) + secondsToStart) * 1000)
    return ((hoursToStart * 60 * 60) + (minutesToStart * 60) + secondsToStart) * 1000;
  }
  function toSecond(hours, minutes) {
    return hours * 3600 + minutes * 60
  }
  function open() {
    $("#opened-text-place").css({"display":"initial"})
    $("#closed-text-place").css({"display":"none"})
  }
  
  function close() {
    $("#opened-text-place").css({"display":"none"})
    $("#closed-text-place").css({"display":"initial"})
  }

  $(".ti-review-item.source-Google").each(function(){
    var thisReview = $(this); 
    var thisReviewStars = thisReview.find(".ti-stars").find(".e");
    var starsCount = thisReviewStars[0] == undefined ? 0 : thisReviewStars.length
    // console.log(starsCount)
    if(starsCount > 1) {
      thisReview.css("display","none").attr("class","hidden")
    }
  });
  $(".ti-inner").attr("style","border:0 !important;;border-width:0 !important;background-color:white !important; border-radius: 10px !important; box-shadow: 0px 6px 20px 3px rgb(229 229 229 / 60%); margin: 10px 15px 20px !important;");
  $(".ti-widget.ti-goog .ti-review-item").attr("style","padding: 0 !importante;");


  var swiper = new Swiper(".swiper-nurses", {
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
});

document.querySelectorAll(".accordion-header").forEach(header => {
  header.addEventListener("click", () => {
      const item = header.parentElement;
      item.classList.toggle("active");
      const content = item.querySelector(".accordion-content");
      content.style.display = content.style.display === "block" ? "none" : "block";
  });
});