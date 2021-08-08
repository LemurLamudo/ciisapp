(function () {
  "use-strict";

  const App = (function () {
    const nav = document.querySelector("header");
    let currentMenuItem;

    const init = function () {
      addListeners();

      if (document.querySelector("#ponencias")) loadPonentesPostmaster();
    };

    const headerStyling = () => {
      if (!nav.classList.contains("active")) {
        window.pageYOffset > 0 ? nav.classList.add("fixed") : nav.classList.remove("fixed");
      }
    };

    const toggleButton = () => {
      if (!nav.classList.contains("active")) {
        nav.classList.add("fixed");
      } else {
        window.pageYOffset > 0 ? nav.classList.add("fixed") : nav.classList.remove("fixed");
      }
      nav.classList.toggle("active");
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

    const showError = (element, error) => {
      const messageElement = document.createElement("p");
      messageElement.className = "error-label";
      messageElement.textContent = error.message ?? "Ocurrio un error";
      element.email.classList.add("isInvalid");
      if (element.lastElementChild.className === "error-label") {
        element.removeChild(element.lastElementChild);
      }
      element.insertAdjacentElement("beforeEnd", messageElement);
    };

    const addConfirmationMessage = () => {
      let conf = document.createElement("div");
      conf.className = "success-message";
      conf.innerHTML = `<img src="assets/images/icons/icon-check.svg" alt="confirmation icon" class="check-icon"><span class="confirmation-message">Para finalizar tu inscripción, revisa tu correo.</span>`;
      document
        .querySelector(".hero-event")
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
          .then(() => {
            addConfirmationMessage();
          })
          .catch((err) => {
            button.classList.remove("loading");
            showError(e.target, err);
          });
      }
    };

    const loadPonentesPostmaster = () => {
      postmasterService.getPonentes().then((res) => {
        let fragment = document.createDocumentFragment();
        if (res) {
          res.data.forEach((ponente) => {
            let item = document.createElement("div");
            item.className = "swiper-slide";
            item.innerHTML = Templates.cardTemplate(ponente);
            fragment.appendChild(item);
          });
        }
        document.querySelector("#ponencias").appendChild(fragment);

        const swiper = new Swiper(".swiper-container", {
          loop: true,
          slidesPerView: 1,
          slidesPerGroup: 1,
          spaceBetween: 10,
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
          breakpoints: {
            547: {
              slidesPerView: 2,
              slidesPerGroup: 3,
              spaceBetween: 20,
            },
            798: {
              slidesPerView: 3,
              slidesPerGroup: 3,
              spaceBetween: 30,
            },
            1024: {
              slidesPerView: 4,
              slidesPerGroup: 4,
              spaceBetween: 40,
            },
          },
        });
      });
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
