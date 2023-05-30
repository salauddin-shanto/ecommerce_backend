document.addEventListener("DOMContentLoaded", function() {
    // Get all the collapsible buttons
    var coll = document.getElementsByClassName("collapsible");
  
    // Get all the sidebar links
    var sidebarLinks = document.getElementsByClassName("sidebar-link");
  
    // Add click event listeners to each button
    for (var i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
          content.style.display = "none";
        } else {
          content.style.display = "block";
        }
  
        // Store the state of the collapsible element in local storage
        var elementId = this.getAttribute("id");
        var isExpanded = this.classList.contains("active");
        localStorage.setItem(elementId, isExpanded);
      });
  
      // Restore the state of the collapsible elements from local storage
      var elementId = coll[i].getAttribute("id");
      var isExpanded = localStorage.getItem(elementId);
      if (isExpanded === "true") {
        coll[i].classList.add("active");
        coll[i].nextElementSibling.style.display = "block";
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
  
    let menuToggle=document.querySelector('.toggle');
    let sidebar=document.querySelector('.sidebar');
    let main=document.querySelector('.main');
    menuToggle.onclick=function(){
        menuToggle.classList.toggle('active');
        sidebar.classList.toggle('active');
        main.classList.toggle('active');
    }
  
  });
  