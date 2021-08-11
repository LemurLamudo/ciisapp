$(document).ready(function () {
  var token = localStorage.getItem("token");
  if (token == null) window.location.href = uri;
  var json = parseJwt(token);

  $("#descargar").click(function() {
    alertify.notify('Aún no esta disponible','success', 12, null);
  });

  $("#name").text(json.data.name);
  $("#certificate-name").text(json.data.name.toUpperCase());

  function parseJwt(token) {
    var base64Url = token.split(".")[1];
    var base64 = base64Url.replace(/-/g, "+").replace(/_/g, "/");
    var jsonPayload = decodeURIComponent(
      atob(base64)
        .split("")
        .map(function (c) {
          return "%" + ("00" + c.charCodeAt(0).toString(16)).slice(-2);
        })
        .join("")
    );

    return JSON.parse(jsonPayload);
  }

  function resizeCertificate() {
    $(".certificate").css({
      "font-size": $(".certificate").width() * 0.01575 + "px",
    });
  }

  resizeCertificate();

  $(window).resize(function () {
    resizeCertificate();
  });
});
