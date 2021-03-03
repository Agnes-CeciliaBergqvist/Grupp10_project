// Toggle between adding and removing the "responsive" class when the user clicks on the hamburger //

// Variables
var x = document.getElementById("nav-bar");
const menus = document.querySelectorAll(".nav-bar-a");
const container = document.querySelector(".test");
const hidden = document.querySelector(".hidden");

// Listeners
x.addEventListener('click', myFunction);

//Functions

function myFunction() {

    if (container.classList.contains("test")) {

      container.classList.remove("test");
      hidden.classList.remove("hidden");
    } else {
      container.classList.add("test");
      hidden.classList.add("hidden");

    }
      
      for (i = 0; i < menus.length; i++) {

        if (menus[i].style.display !== "block") {
          menus[i].style.display = "block";
        } else {
          menus[i].style.display = "none";
        }
    } 
  }

