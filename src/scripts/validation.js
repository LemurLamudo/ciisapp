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
