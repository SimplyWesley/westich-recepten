<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script>
  $('.toggle').click(function() {
    "use strict";
    $('nav ul').slideToggle();
  });



  $(window).resize(function() {
    "use strict";
    if ($(window).width() > 780) {
      $('nav ul').removeAttr('style');
    }
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/codemirror@5.57.0/lib/codemirror.min.js"></script>

<script>
  document.getElementById("searchbar").addEventListener("keyup", function() {
    // Get the input value
    var inputValue = document.getElementById("searchbar").value.toLowerCase();
    inputValue = inputValue.normalize("NFD");
    // Get all the recipe divs
    var recipeDivs = document.getElementsByClassName("recipe-div");
    // Loop through all the recipe divs
    for (var i = 0; i < recipeDivs.length; i++) {
      // Get the title and soort of the recipe
      var recipeTitle = recipeDivs[i].getElementsByClassName("recepth1")[0].innerHTML.toLowerCase();
      var recipeSoort = recipeDivs[i].getElementsByClassName("recepth3")[1].innerHTML.toLowerCase();
      var recipeLand = recipeDivs[i].getElementsByClassName("recepth3")[2].innerHTML.toLowerCase();
      recipeLand = recipeLand.normalize("NFD");
      // Check if the title or soort contains the input value
      if (recipeTitle.indexOf(inputValue) > -1 || recipeSoort.indexOf(inputValue) > -1 || recipeLand.indexOf(inputValue) > -1) {
        // Show the recipe div
        recipeDivs[i].style.display = "block";
      } else {
        // Hide the recipe div
        recipeDivs[i].style.display = "none";
      }
    }
  });
</script>