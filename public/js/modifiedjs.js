/* Set the width of the side navigation to 250px */
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

// slid toggle for category side bar
$(document).ready(function(){
  $("#dropdown-btn1").click(function(){
    $("#dropdown-container1").slideToggle("slow", function(){
      $('#side1').toggleClass("fa-caret-up");
    });
  });
});

$(document).ready(function(){
  $("#dropdown-btn2").click(function(){
    $("#dropdown-container2").slideToggle("slow", function(){
      $('#side2').toggleClass("fa-caret-up");
    });
  });
});

$(document).ready(function(){
  $("#dropdown-btn3").click(function(){
    $("#dropdown-container3").slideToggle("slow", function(){
      $('#side3').toggleClass("fa-caret-up");
    });
  });
});

$(document).ready(function(){
  $("#dropdown-btn4").click(function(){
    $("#dropdown-container4").slideToggle("slow", function(){
      $('#side4').toggleClass("fa-caret-up");
    });
  });
});

$(document).ready(function(){
  $("#dropdown-btn5").click(function(){
    $("#dropdown-container5").slideToggle("slow", function(){
      $('#side5').toggleClass("fa-caret-up");
    });
  });
});

// validation for quantity
var quantity = document.getElementById("quantity").value;
function validation() {
  if (quantity <= 0) {
    alert("Invalid Quantity");
  } 
  // else if (quantity > 99) {
  //   alert("You Can Have Maximum 99 Product");
  // }
};
