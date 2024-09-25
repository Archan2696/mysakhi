
//  $(document).ready(function(){
//             $('.inner-list li').on('click', function(event){
                
//                 $('.inner-list li').removeClass('active');
//                 // Add 'active' class to the clicked menu item
//                 $(this).addClass('active');
//             });
//         });




jQuery(function($) {
     var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
     $('.inner-list a').removeClass('active');
     $('.inner-list a').each(function() {
      if (this.href === path) {
       $(this).addClass('active');
      }
    });
});

jQuery(function($) {
     var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
     $('.sub-menu a').removeClass('active');
     $('.sub-menu a').each(function() {
      if (this.href === path) {
       $(this).addClass('active');
      }
    });
});


// document.addEventListener("DOMContentLoaded", function() {
//     // Get all menu items
//     var menuItems = document.querySelectorAll(".inner-list li a");

//     // Add click event listener to each menu item
//     menuItems.forEach(function(item) {
//         item.addEventListener("click", function() {
//             // Remove 'active' class from all menu items
//             menuItems.forEach(function(i) {
//                 i.classList.remove("active");
//             });

//             // Add 'active' class to the clicked menu item
//             item.classList.add("active");
//         });
//     });
// });







$(window).on("scroll", function () {
    if ($(".main-menu").length) {
      var headerScrollPos = 130;
      var stricky = $(".main-menu");
      if ($(window).scrollTop() > headerScrollPos) {
        stricky.addClass("stricky-fixed");
      } else if ($(this).scrollTop() <= headerScrollPos) {
        stricky.removeClass("stricky-fixed");
      }
    }
  });

$(window).on("scroll", function () {
    if ($(".mobile_menu").length) {
      var headerScrollPos = 130;
      var stricky = $(".mobile_menu");
      if ($(window).scrollTop() > headerScrollPos) {
        stricky.addClass("stricky-fixed");
      } else if ($(this).scrollTop() <= headerScrollPos) {
        stricky.removeClass("stricky-fixed");
      }
    }
  });
 
// Function to animate the counters
function animateCounters() {
    $('.counter').each(function () {
        var targetText = $(this).attr('data-target'); // Get the target value as text from data-target attribute
        var target = parseInt(targetText.replace(/,/g, '')); // Remove commas and parse as integer
        var startValueText = $(this).attr('data-start'); // Get the start value as text from data-start attribute
        var startValue = parseInt(startValueText.replace(/,/g, '')); // Remove commas and parse as integer
        var duration =2000;
        
        $(this).prop('Counter', startValue).animate({
            Counter: target
        }, {
            duration: duration,
            easing: 'swing',
            step: function (now) {
                $(this).text(formatNumber(Math.ceil(now))); // Format and display the number
            }
        });
    });
}

// Function to format numbers with commas

// function googleTranslateElementInit() {

//   new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
// }


function googleTranslateElementInit() {
    new google.translate.TranslateElement({
      pageLanguage: 'en',
      includedLanguages: 'bn,en,hi,gu,kn,ml,mr,pa,ta,te,ur',
      layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
      autoDisplay: false
    }, 'google_translate_element');
  }



function formatNumber(number) {
    return number.toLocaleString('en-IN');
}

// Call the animateCounters function when the document is ready
$(document).ready(function () {
    animateCounters();
});


 
$(document).ready(function(){
$(window).scroll(function(){
    var element = document.getElementById("whysection");
    var headerHeight = document.getElementById("mobile-menu").offsetHeight; 
    var offset = headerHeight +200; 
    var offsetPosition = element.offsetTop - offset;
    
    if ($(this).scrollTop() > offsetPosition) {
        var get_val=$("#get_val").val();
        var get_scroll_val=$("#get_scroll_val").val();
        if(get_val !=1 && get_scroll_val==2){
            $('.open-loginform').click();
            $('body').css('overflow', 'hidden');
            $("#get_scroll_val").val("0");
        }
    }
});
});

$(document).ready(function(){
    $('.btn-close').click(function(){
        $("#get_val").val("1");
        $('body').css('overflow', 'auto');
    });
});



// $(document).ready(function(){
// $(window).scroll(function(){
//     if ($(this).scrollTop() > 2000) {
//         var get_val=$("#get_val").val();
//         var get_scroll_val=$("#get_scroll_val").val();
//         if(get_val !=1 && get_scroll_val==2){
//             $('.open-loginform').click();
//             $('body').css('overflow', 'hidden');
//             $("#get_scroll_val").val("0");
//         }
//     }
// });
// });

// $(document).ready(function(){
//     $('.btn-close').click(function(){
//         $("#get_val").val("1");
//         $('body').css('overflow', 'auto');
//     });
// });


/*$(document).ready(function(){
    $('.google-translate').click(function(){
        $('.goog-te-gadget-simple').click();
    });
});*/


$(document).ready(function(){
    
    $('.expert-slider').slick({
    dots:false,
    infinite:true,
    speed: 300,
    slidesToShow:2,
    slidesToScroll:1,
    prevArrow: '<button class="slide-arrow prev-arrow"><i class="fa-solid fa-chevron-left"></i></button>',
    nextArrow: '<button class="slide-arrow next-arrow"><i class="fa-solid fa-chevron-left"></i></button>',
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
          dots:false
        }
      },
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          dots:false
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
    
    
    
    
    
    
    
    
    $('.patient-slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: true,
      dots: false,
      infinite: true,
      autoplaySpeed: 3000,
      autoplay: false,
      // speed: 9000,
      // pauseOnHover: false,
      // cssEase: 'linear',
      prevArrow: '<div class="prev-arrow t-arrow"><i class="fa-solid fa-chevron-left"></i></div>',
      nextArrow: '<div class="next-arrow t-arrow"><i class="fa-solid fa-chevron-right"></i></div>',
      responsive: [
        {
            breakpoint: 1367,
            settings: {
                slidesToShow: 1,
            }
        },
        {
            breakpoint: 1025,
            settings: {
                slidesToShow: 1,
            }
        },
        {
            breakpoint: 769,
            settings: {
                slidesToShow: 1,
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 1,
                centerMode: false,
            }
        },
        {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
        }
    ]
    });
    
    
    // scroll top 

    var scrollTop = $(".scrollTop");

    $(window).scroll(function() {
        var topPos = $(this).scrollTop();

        if (topPos > 100) {
            $(scrollTop).css("opacity", "1");

        } else {
            $(scrollTop).css("opacity", "0");
        }

    }); 

    $(scrollTop).click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 500);
        return false;

    });
    
});

 const likelihoodInput = document.getElementById('likelihood');
 const likelihoodLabels = document.querySelectorAll('#likelihood-labels span');
          
  likelihoodInput.addEventListener('input', () => {
    const value = likelihoodInput.value;
    likelihoodLabels.forEach((label, index) => {
      if (index + 1 == value) {
        label.style.fontWeight = 'bold';
      } else {
        label.style.fontWeight = 'normal';
      }
    });
  });

       $(document).ready(function(){
          $('.pahse-qa-box input').click(function(){
            // Hide all .qs-box elements
            $('.qs-box').hide();
            
            // Show the .qs-box of the clicked input
            var $qsBox = $(this).closest('.pahse-qa-box').find('.qs-box');
            $qsBox.show();
          });
        });
            




