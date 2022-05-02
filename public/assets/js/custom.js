$(document).ready(function() {

  function payment_function() {
    if ($("select[name='payment_type']").length && $("select[name='payment_type']").val() == 'check') {
      $(".card_info_div").addClass('d_none');
      $(".card_info_div input, .card_info_div select").removeAttr('required');
      $(".check_info_div").removeClass('d_none');
      $(".check_info_div input, .check_info_div select").attr('required', 'required');
    } 
    else if ($("select[name='payment_type']").length && $("select[name='payment_type']").val() == 'card') {
      $(".card_info_div").removeClass('d_none');
      $(".card_info_div input, .card_info_div select").attr('required', 'required');
      $(".check_info_div").addClass('d_none');
      $(".check_info_div input, .check_info_div select").removeAttr('required');
    } 
  }
  payment_function();
  $(document).on('change', "select[name='payment_type']", function(e) {
    payment_function();
  });

  $(document).on('change', "select[name='state_id']", function(e) {
    $(".course_completion").removeClass("d_none");

    if ($("select[name='state_id']").length && $("select[name='state_id']").val() == '1') { // florida
      $(".florida_course_completion").removeClass('d_none');
      $(".mexico_course_completion").addClass('d_none');
      $(".texas_course_completion").addClass('d_none');
    } 
    else if ($("select[name='state_id']").length && $("select[name='state_id']").val() == '2') { // mexico
      $(".florida_course_completion").addClass('d_none');
      $(".mexico_course_completion").removeClass('d_none');
      $(".texas_course_completion").addClass('d_none');    
    } 
    else if ($("select[name='state_id']").length && $("select[name='state_id']").val() == '3') { // texas
      $(".florida_course_completion").addClass('d_none');
      $(".mexico_course_completion").addClass('d_none');
      $(".texas_course_completion").removeClass('d_none');    
    } 
  });

  $(document).on('change', "select[name='course_id']", function(e) {
    $(".florida_citation_fields").addClass('d_none');
    $(".florida_case_fields").addClass('d_none');
    $("select[name='county_id']").removeClass('d_none');    
    $(".florida_citation_fields input, .florida_case_fields input").removeAttr('required');
    $("select[name='county_id").attr('required', 'required'); 

    if ($("select[name='course_id']").length && ($("select[name='course_id']").val() == '1' || $("select[name='course_id']").val() == '2')) { 
      $(".florida_citation_fields").removeClass('d_none');
      $(".florida_citation_fields input").attr('required', 'required');
      $(".florida_case_fields").addClass('d_none');
      $(".florida_case_fields input").removeAttr('required');
    } 
    else if ($("select[name='course_id']").length && $("select[name='course_id']").val() == '3') {
      $(".florida_citation_fields").addClass('d_none');  
      $(".florida_citation_fields input").removeAttr('required');
      $(".florida_case_fields").removeClass('d_none'); 
      $(".florida_case_fields input").attr('required', 'required');
    } 
    else if ($("select[name='course_id']").length && $("select[name='course_id']").val() == '4') { // texas
      $(".florida_citation_fields").addClass('d_none');
      $(".florida_citation_fields input").removeAttr('required');
      $(".florida_case_fields").addClass('d_none');
      $(".florida_case_fields input").removeAttr('required');
      $("select[name='county_id']").addClass('d_none');   
      $("select[name='county_id").removeAttr('required'); 
    } 
  });




  $(document).on('change', "select[name='state_id']",  function() { 
    let state = '';
    let state_id = '';
    // get value of state
    if ($(this).find('option:selected').length) {
      state = $(this).find('option:selected').text(); 
      state_id = $(this).find('option:selected').val(); 
    }
    // filter course county using ajax
    let arr = ['course_id', 'county_id'];
    let arr2 = ['Course*', 'County/Court*'];
  
    // make ajax request to create course and county dropdown
    $.ajax({
      url: '/course_county',
      type: "get",
      data: { state_id: state_id },
      async: false,
      success: function(response) {
        // add course and county options in course and county dropdowns
        $.each(arr, function (i, obj) {
          let data_str = "";
          data_str += `
          <option value="" selected disabled>Select ` + arr2[i] + `</option>`;
          $.each(response['data'][obj], function (i, obj1) {
            data_str += `<option value="` + obj1.id + `">` + obj1.name + `</option>`;
          });
          $('#'+obj).length ? $('#'+obj).removeAttr('disabled') : '';
          $('#'+obj).length ? $('#'+obj).html(data_str) : ''; // append course and county dropdown in new row
          
          // reset select2 for course and county dropdowns
        //   let course_county = $('select[name="' + obj + '"]');
        //   course_county.wrap('');
  
        //   if (course_county.length) {
        //     course_county.select2({
        //       placeholder: 'Please Select...',
        //       dropdownParent: course_county.parent()
        //     });
        //   }
        }); 
      },
      error: function (jqXHR, exception) {
          console.log('something went wrong');
      }
    });
  });













    $("li:first-child").addClass("first");
    $("li:last-child").addClass("last");
    $('[href="#"]').attr("href", "javascript:;");
    $('.menu-Bar').click(function() {
        $(this).toggleClass('open');
        $('.menuWrap').toggleClass('open');
        $('body').toggleClass('ovr-hiddn');
    });

    $('.loginUp').click(function(){
        $('.LoginPopup').fadeIn();
        $('.overlay').fadeIn();
    });

    $('.signUp').click(function(){
        $('.signUpPop').fadeIn();
        $('.overlay').fadeIn();
    });

     $('.closePop,.overlay').click(function(){
        $('.popupMain').fadeOut();
        $('.overlay').fadeOut();
    });

});


// Fancy Media
$('.fancybox-media').fancybox({
    openEffect: 'none',
    closeEffect: 'none',
    helpers: {
        media: {}
    }
});


// Slider For
$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: false,
    focusOnSelect: true
});


// Accordion
$('.myaccordi>li').click(function() {
    $(this).addClass('active');
    $(this).siblings().removeClass('active');
});
//  https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_accordion


// Sticky Navigation
$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 200) {
        $(".fixed").addClass("sticky");
    } else {
        $(".fixed").removeClass("sticky");
    }
});


// Normal Slider
$('.index-slider').slick({
  dots: false,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  slidesToScroll: 1,
});
 

 // Normal Slider
$('.main-slider').slick({
  dots: false,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay:true,
   autoplaySpeed: 2000,
  arrows:false,
});           

// Navigation Menu 
$(window).on('load', function() {
var currentUrl = window.location.href.substr(window.location.href.lastIndexOf("/") + 1);
$('ul.menu li a').each(function() {
    var hrefVal = $(this).attr('href');
    if (hrefVal == currentUrl) {
        $(this).removeClass('active');
        $(this).closest('li').addClass('active')
        $('ul.menu li.first').removeClass('active');
    }
});

});

// Tabbing JS
  $('[data-targetit]').on('click', function(e) {
  $(this).addClass('current');
  $(this).siblings().removeClass('current');
  var target = $(this).data('targetit');
  $('.' + target).siblings('[class^="box-"]').hide();
  $('.' + target).fadeIn();
  $(".tab-slider").slick("setPosition");
});

/* RESPONSIVE JS */
if ($(window).width() < 825) {
}

/*Mobile Slider */



mobileOnlySlider(".mob-service", true, false, true, 767);

function mobileOnlySlider($slidername, $dots, $arrows, $autoplay, $breakpoint) {
  var slider = $($slidername);
  var settings = {
    mobileFirst: true,
    dots: $dots,
    arrows: $arrows,
    autoplay: $autoplay,
    responsive: [
      {
        breakpoint: $breakpoint,
        settings: "unslick"
      }
    ]
  };

  slider.slick(settings);

  $(window).on("resize", function () {
    if ($(window).width() > $breakpoint) {
      return;
    }
    if (!slider.hasClass("slick-initialized")) {
      return slider.slick(settings);
    }
  });
} // Mobile Only Slider
