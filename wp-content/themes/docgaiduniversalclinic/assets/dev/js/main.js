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
  
  $('.counter-value').counterUp({
    delay: 10,
    time: 1200,
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


$(document).ready(function() {

  if(window.innerWidth >= 767) {
    const $wrapper = $('.wrapper');
    const $leftImg = $('.image-statistic .image-statistic-main:not(.image-statistic-right)');
    const $rightImg = $('.image-statistic .image-statistic-main.image-statistic-right');
  
    const baseOffset = 70; // starting translateX distance
    const growSpeed = 0.2; // adjust how fast they come together
  
    $(window).on('scroll', function() {
      const scrollTop = $(window).scrollTop();
      const wrapperTop = $wrapper.offset().top;
      const wrapperHeight = $wrapper.outerHeight();
  
      if (scrollTop >= wrapperTop && scrollTop <= wrapperTop + wrapperHeight) {
        // how far inside wrapper we are (0 → 1)
        let progress = (scrollTop - wrapperTop) / wrapperHeight;
  
        // grow closer: start at 70px, decrease as scroll
        let offset = baseOffset - (progress * baseOffset * growSpeed * 10);
  
        // prevent crossing (optional)
        if (offset < 0) offset = 0;
  
        // apply transform
        $leftImg.css('transform', `translateX(${offset}px)`);
        $rightImg.css('transform', `translateX(${-offset}px)`);
      }
    });
  }
});