$(document).ready(function () {
  $(".bee_add_preinscripcion").on("submit", bee_add_preinscripcion);

  function bee_add_preinscripcion(event) {
    event.preventDefault();

    var form = $(".bee_add_preinscripcion"),
      hook = "bee_hook",
      action = "add",
      data = new FormData(form.get(0));

    email = $("#email").val();

    if (email === "" || email.length < 2) {
      Swal.fire("Ingrese todos los campos!", "Ingrese un email válido", "warning");
      return;
    }

    if (!validarEmail(email)) {
      Swal.fire("Ingrese todos los campos!", "Ingrese un email válido", "warning");
      return;
    }

    function validarEmail(email) {
      emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
      if (emailRegex.test(email)) {
        return true;
      } else {
        return false;
      }
    }

    data.append("hook", hook);
    data.append("action", action);

    for (var pair of data.entries()) {
      console.log(pair[0] + ", " + pair[1]);
    }

    $.ajax({
      url: "ajax/preinscripcion",
      type: "post",
      dataType: "json",
      contentType: false,
      processData: false,
      cache: false,
      data: data,
      beforeSend: function () {},
    })
      .done(function (res) {
        alertify.notify(res.msg, "warning", 4, null);
        document.getElementById("email").value = "";
      })
      .fail(function (err) {
        alertify.notify(err, "error", 4, null);
      })
      .always(function () {});
  }
});
