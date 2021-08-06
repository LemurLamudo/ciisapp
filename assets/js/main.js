const fetchService = (function () {
  const BASE_API_URL = "ajax/";

  const fetchData = async (endpoint, settings = {}) => {
    const actions = {
      GET: "get",
      POST: "add",
      PUT: "update",
      DELETE: "delete",
      PATCH: "load",
    };

    settings.method = settings.method ?? "GET";

    if (settings.body instanceof FormData) {
      settings.body.append("action", actions[settings.method]);
      settings.body.append("hook", "bee_hook");
    } else {
      settings.body.action = actions[settings.method];
      settings.body.hook = "bee_hook";
    }

    settings.body = settings.headers?.["Content-type"]
      ? JSON.stringify(settings.body)
      : settings.body;
    settings.method = "POST";

    const defaultHeaders = {
      Accept: "application/json",
      "X-Requested-With": "XMLHttpRequest",
    };

    settings.headers = settings.headers
      ? { ...defaultHeaders, ...settings.headers }
      : defaultHeaders;

    try {
      const response = await fetch(BASE_API_URL + endpoint, settings);
      const json = await response.json();
      return response.ok
        ? json
        : Promise.reject({
            status: response.status,
            message: json.msg,
            data: json.data,
          });
    } catch (error) {
      return Promise.reject({
        message: "Ocurrio un error",
      });
    }
  };

  const get = async (endpoint, settings = {}) => fetchData(endpoint, settings);
  const post = async (endpoint, settings = {}) => {
    settings.method = "POST";
    return fetchData(endpoint, settings);
  };
  const put = async (endpoint, settings = {}) => {
    settings.method = "PUT";
    return fetchData(endpoint, settings);
  };
  const del = async (endpoint, settings = {}) => {
    settings.method = "DELETE";
    return fetchData(endpoint, settings);
  };
  const patch = async (endpoint, settings = {}) => {
    settings.method = "PATCH";
    return fetchData(endpoint, settings);
  };

  return {
    get,
    post,
    put,
    delete: del,
    patch,
  };
})();

const postmasterService = (function () {
  const ENDPOINT = "";

  const preinscribir = async (data) => {
    const settings = {
      body: data,
    };
    return await fetchService.post("preinscripcion", settings);
  };

  const getPonentes = async () => {
    const settings = {
      body: new FormData(),
    };
    return await fetchService.get("get_ponentes_postmaster", settings);
  };

  return {
    preinscribir,
    getPonentes,
  };
})();

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
      conf.innerHTML = `<img src="assets/images/icons/icon-check.svg" alt="confirmation icon" class="check-icon"><span class="confirmation-message">Gracias por preinscribirte, revisa tu correo.</span>`;
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
            message.textContent = err.message ?? "Ocurrio un error";
            e.target.email.classList.add("isInvalid");
            e.target.insertAdjacentElement("beforeEnd", message);
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
          slidesPerView: 4,
          loop: true,
          slidesPerGroup: 4,
          spaceBetween: 40,
          // navigation: {
          //   nextEl: ".swiper-button-next",
          //   prevEl: ".swiper-button-prev",
          // },
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
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

const Templates = (function () {
  const URI = document.getElementById("images").value;

  const cardTemplate = ({ photo, name }) => {
    const html = `<div class="card mb-3">
        <div class="card-header">
            <img src="${URI}postmaster/ponentes/${photo}" height="280" alt="#">
        </div>
        <div class="card-body">
            <div class="name-price text-right">
                <div class="teacher-info ">
                    <img src="${URI}paises/peru.jpg" alt="country-flag" class="card-icon">
                </div>
            </div>
            <div class="">
                <h3 class="c-title mb-1">${name}</h3>
                <p class="c-description"></p>
            </div>
            <div class="card-footer"><a href="javascript:void(0);" class="btn-link">Ver más <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><polyline points="268 112 412 256 268 400" style="fill:none;stroke:#3f4ce7;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px"/><line x1="392" y1="256" x2="100" y2="256" style="fill:none;stroke:#3f4ce7;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px"/></svg></a></div>
          </div>
      </div>`;
    return html;
  };

  return {
    cardTemplate,
  };
})();

const fieldValidation = (function () {
  const validate = (type, field) => {
    const isValid = {
      value: false,
      message: "",
    };

    switch (type) {
      case "email":
        isValid.value = isEmail(field.value);
        isValid.message = "Email invalido";
        break;
      case "phone":
        isValid.value = isPhone(field.value);
        isValid.message = "Telefono invalido";
        break;
      default:
        isValid.value = false;
    }

    if (!isValid.value) {
      writeError(field, isValid.message);
      removeError(field);
    }

    return isValid.value;
  };

  const writeError = (obj, msj) => {
    if (!obj.classList.contains("isInvalid")) {
      let errElem = document.createElement("p");
      errElem.className = "error-label";
      errElem.textContent = msj;
      obj.parentNode.appendChild(errElem);
      obj.classList.add("isInvalid");
    }
  };

  const removeError = (el) => {
    el.addEventListener("change", () => {
      if (el.classList.contains("isInvalid")) {
        el.classList.remove("isInvalid");
        el.parentNode.removeChild(el.nextElementSibling);
      }
    });
  };
  // ---
  // helpers
  // ---
  const isEmail = (email) => {
    let regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
  };

  const isPhone = (phone) => {
    let regex = /^([0-9]{10})+$/;
    return regex.test(phone);
  };

  return {
    validate,
  };
})();
//# sourceMappingURL=main.js.map
