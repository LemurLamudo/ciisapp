$(document).ready(function() {

    var uri = document.getElementById("uri").value;

    var token = localStorage.getItem("token");
    if(token == null) window.location.href = uri;

    document.getElementById("c_ponencia").href = uri + 'ponencias/create?token=' + token;
});