document.addEventListener("DOMContentLoaded", function () {
    const openMenu = document.getElementById("openMenu");
    const closeMenu = document.getElementById("closeMenu");
    const sideMenu = document.getElementById("sideMenu");
  
    openMenu.addEventListener("click", function () {
      sideMenu.classList.add("active");
    });
  
    closeMenu.addEventListener("click", function () {
      sideMenu.classList.remove("active");
    });
  });