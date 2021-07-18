(function () {
  "use-strict";

  const nav = document.querySelector("header");
  let currentMenuItem;

  function toggleSubmenu(submenu) {
    if (submenu.classList.contains("active")) {
      submenu.parentNode.querySelector("svg path").setAttribute("d", "M112 184l144 144 144-144");
      submenu.classList.remove("active");
      currentMenuItem = false;
    } else {
      submenu.parentNode.querySelector("svg path").setAttribute("d", "M112 328l144-144 144 144");
      submenu.classList.add("active");
      currentMenuItem = submenu;
    }
  }

  window.addEventListener("scroll", () => {
    if (!nav.classList.contains("active"))
      window.pageYOffset > 0 ? nav.classList.add("fixed") : nav.classList.remove("fixed");
  });

  document.querySelector(".menu-btn").addEventListener("click", () => {
    nav.classList.toggle("active");
    nav.classList.toggle("fixed");
  });

  document.querySelector(".nav-list").addEventListener("click", (e) => {
    let submenu = e.target.parentNode.querySelector(".sub-menu");
    if (currentMenuItem && submenu !== currentMenuItem) {
      toggleSubmenu(currentMenuItem);
    }
    toggleSubmenu(submenu);
  });

  document.addEventListener("click", (e) => {
    if (currentMenuItem && !e.target.classList.contains("nav-link")) {
      toggleSubmenu(currentMenuItem);
    }
  });
})();
