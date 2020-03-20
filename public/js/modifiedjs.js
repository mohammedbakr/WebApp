/* Set the left of the side navigation to 0px */
function openNav() {
  document.getElementById("mySidenav").style.left = "0px";
}

/* Set the left of the side navigation to -250px */
function closeNav() {
  document.getElementById("mySidenav").style.left = "-250px";
}

/* Side navigation bar button */
$(document).ready(function(){
  $("#sidebars").on('click', function() {
    $("#mySidenav").toggleClass("open");
    $(this).toggleClass("active");
  });
});

/* fade for search */
$(document).ready(function(){
  $("#fade").click(function() {
    $("#fadetoggle").fadeToggle("normal", "swing");
    $("#fadetoggle").toggleClass("slideInUp");
    $("#icon").toggleClass("fa-times");
  });
});

// slid Up & Down toggle for category side bar $('#side1').toggleClass("fa-caret-up");
$(document).ready(function(){
  $("button.dropdown-btn").click(function(){
    $(this).next().slideToggle('slow');
    $("div.dropdown-container").not($(this).next()).slideUp('slow');
  });
});

// validation for quantity
// var quantity = document.getElementById("quantity").value;
// function validation() {
//   if (quantity <= 0) {
//     alert("Invalid Quantity");
//   } 
  // else if (quantity > 99) {
  //   alert("You Can Have Maximum 99 Product");
  // }
// };


// Validation for Search for mobile Search
function validForm() {
  var x = document.forms["my-Form"]["q"].value;
  if (x == "" || x == null) {
    alert("Product must be filled out");
    return false;
  }
}
// Validation for Search For laptops
function validateForm() {
  var x = document.forms["myForm"]["q"].value;
  if (x == "" || x == null) {
    $(".search-form").submit(function () {
      var isFormValid = true;
      $('.bubble').remove();
      
          if ($.trim($(this).val()).length === 0) {
              $(this).addClass("highlight");
              isFormValid = false;
          } else {
              $(this).removeClass("highlight");
              isFormValid = true;
          }
      if (!isFormValid) {
          $('.search-form').after("<span class='bubble'><span class='exclaimationMark'>!</span>Product must be filled out</span>");
      }
      return isFormValid;
    });
    
    $('html').click(function () {
      $('.bubble').remove();
    });
    return false;
  }
}



// All Department Button slide 
$(document).ready(function(){
  $(".my-button").on('click', function() {
    $(".departments").slideToggle('fast');
  });
});

// Scroll
$(document).ready(function(){
  // Scroll for whole page
  $(function() {  
    $("html").niceScroll({
      cursorcolor: "#19afd0",
      cursorwidth: "5px",
      cursorborder: "1px solid #19afd0",
      zindex: "9999",
      railalign: 'right'
    });
  });
});

// Scroll Up
$(document).ready(function(){
  const scrollBtn = $("#scroll-up");
  // On window Scrolling
  $(window).scroll(function(){
    $(this).scrollTop() >= 500 ? scrollBtn.fadeIn(500) : scrollBtn.fadeOut(500);
  });
  scrollBtn.click(function(){
    $("html, body").animate({ scrollTop : 0}, 1000);
  });
});

$("#slider").owlCarousel({
  autoplay: true,
  autoplayTimeout: 6000,
  autoplayHoverPause: true,
  nav: true,
  transitionStyle: true,
  dots: true,
  loop: true,
  ltr: true,
  smartSpeed: 1000,
  navText: [
      "<i class='fa fa-chevron-right'></i>",
      "<i class='fa fa-chevron-left'></i>"
  ],
  responsive: {
      0: {
          items: 1
      },
      600: {
          items: 1
      },
      1000: {
          items: 1
      }
  }
});