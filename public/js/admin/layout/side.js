document.addEventListener("DOMContentLoaded", function() {
  // Get all the collapsible buttons
  var coll = document.getElementsByClassName("collapsible");

  // Get all the sidebar links
  var sidebarLinks = document.getElementsByClassName("sidebar-link");

  // Add click event listeners to each button
  for (var i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
      var content = this.nextElementSibling;

      // Close all other collapsible menus
      for (var j = 0; j < coll.length; j++) {
        if (coll[j] !== this) {
          var parentMenu = coll[j].closest('.sub-menu');
          if (!parentMenu || !parentMenu.classList.contains('active')) {
            coll[j].classList.remove("active");
            coll[j].nextElementSibling.style.display = "none";
            localStorage.setItem(coll[j].getAttribute("id"), "false");
          }
        }
      }

      // Toggle the current menu
      this.classList.toggle("active");
      if (content.style.display === "block") {
        content.style.display = "none";
        localStorage.setItem(this.getAttribute("id"), "false");
      } else {
        content.style.display = "block";
        localStorage.setItem(this.getAttribute("id"), "true");
      }
    });

    // Restore the state of the collapsible elements from local storage
    var elementId = coll[i].getAttribute("id");
    var isExpanded = localStorage.getItem(elementId);
    if (isExpanded === "true") {
      coll[i].classList.add("active");
      coll[i].nextElementSibling.style.display = "block";

      // Expand the parent menus
      var parentMenu = coll[i].closest('.sub-menu');
      while (parentMenu) {
        var parentButton = parentMenu.previousElementSibling;
        parentButton.classList.add("active");
        parentButton.nextElementSibling.style.display = "block";
        parentMenu = parentButton.closest('.sub-menu');
      }
    } else {
      coll[i].classList.remove("active");
      coll[i].nextElementSibling.style.display = "none";
    }
  }

  // Add click event listeners to each sidebar link
  for (var j = 0; j < sidebarLinks.length; j++) {
    sidebarLinks[j].addEventListener("click", function() {
      // Remove active-link class from all links
      for (var k = 0; k < sidebarLinks.length; k++) {
        sidebarLinks[k].classList.remove("active-link");
      }
      // Add active-link class to the clicked link
      this.classList.add("active-link");

      // Store the active link in local storage
      localStorage.setItem("activeLink", this.textContent);
    });

    // Check if the current link is the active link and add the active-link class
    var activeLink = localStorage.getItem("activeLink");
    if (activeLink && sidebarLinks[j].textContent === activeLink) {
      sidebarLinks[j].classList.add("active-link");
    }
  }

  let menuToggle = document.querySelector('.toggle');
  let sidebar = document.querySelector('.sidebar');
  let main = document.querySelector('.main');
  menuToggle.onclick = function() {
    menuToggle.classList.toggle('active');
    sidebar.classList.toggle('active');
    main.classList.toggle('active');
  }
});
