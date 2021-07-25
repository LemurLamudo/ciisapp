(function () {
  "use-strict";

  const App = (function () {
    const nav = document.querySelector("header");
    let currentMenuItem;

    const init = function () {
      addListeners();
    };

    const headerStyling = () => {
      if (!nav.classList.contains("active")) {
        window.pageYOffset > 0 ? nav.classList.add("fixed") : nav.classList.remove("fixed");
      }
    };

    const toggleButton = () => {
      nav.classList.toggle("active");
      nav.classList.toggle("fixed");
    };

    const toggleSubmenu = (submenu) => {
      if (submenu.classList.contains("active")) {
        submenu.parentNode.querySelector("svg path").setAttribute("d", "M112 184l144 144 144-144");
        submenu.classList.remove("active");
        currentMenuItem = false;
      } else {
        submenu.parentNode.querySelector("svg path").setAttribute("d", "M112 328l144-144 144 144");
        submenu.classList.add("active");
        currentMenuItem = submenu;
      }
    };

    const toggleOnMenuClick = (e) => {
      let submenu = e.target.parentNode.querySelector(".sub-menu");
      if (currentMenuItem && submenu !== currentMenuItem) {
        toggleSubmenu(currentMenuItem);
      }
      toggleSubmenu(submenu);
    };

    const closeOpenMenu = (e) => {
      if (currentMenuItem && !e.target.classList.contains("nav-link")) {
        toggleSubmenu(currentMenuItem);
      }
    };

    const addConfirmationMessage = () => {
      let conf = document.createElement("div");
      conf.className = "success-message";
      conf.innerHTML = `<img src="assets/images/icons/icon-check.svg" alt="confirmation icon" class="check-icon"><span class="confirmation-message">¡Gracias por preinscribirte!</span>`;
      document
        .querySelector(".hero-content")
        .replaceChild(conf, document.querySelector(".bee_add_preinscripcion"));
    };

    const submitEmail = (e) => {
      e.preventDefault();
      const data = new FormData(e.target);
      const button = document.querySelector(".btn-hero");
      button.classList.add("loading");
      if (fieldValidation.validate("email", e.target.email)) {
        postmasterService
          .preinscribir(data)
          .then((res) => {
            addConfirmationMessage();
          })
          .catch((err) => {
            button.classList.remove("loading");
            const message = document.createElement("p");
            message.className = "error-label";
            message.textContent = err.data ? `${err.data} ya esta preinscrito` : "Ocurrio un error";
            e.target.email.classList.add("isInvalid");
            e.target.insertAdjacentElement("beforeEnd", message);
          });
      }
    };

    const addListeners = () => {
      window.addEventListener("scroll", headerStyling);
      document.querySelector(".menu-btn").addEventListener("click", toggleButton);
      document.querySelector(".nav-list").addEventListener("click", toggleOnMenuClick);
      document.addEventListener("click", closeOpenMenu);

      document.querySelector(".bee_add_preinscripcion")?.addEventListener("submit", submitEmail);
    };

    return {
      init,
    };
  })();

  document.addEventListener("DOMContentLoaded", App.init());
})();
