// Toggle between adding and removing the "responsive" class when the user clicks on the hamburger //

function myFunction() {
    var x = document.getElementById("nav-bar");
    if (x.style.display === "block") {
      x.style.display += "none";
    } else {
      x.style.display = "block";
    }
  }