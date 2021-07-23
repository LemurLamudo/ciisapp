$(document).ready(function() {

    var uri = document.getElementById("uri").value;

    var token = localStorage.getItem("token");
    if(token == null) window.location.href = uri;
    var json = parseJwt(token);

    document.getElementById("icon").href= uri + 'panel?token=' + token;

    document.getElementById("panel").href= uri + 'panel?token=' + token;
    // document.getElementById("talleres").href= uri + 'talleres?token=' + token;
    // document.getElementById("ponencias").href= uri + 'ponencias?token=' + token;
    // document.getElementById("certificado").href= uri + 'certificado?token=' + token;
    
    $("#username").text(json.data.name);
    
    if(json.data.role == "ROLE_ADMIN"){
        var redirect = document.getElementById("l_ponencia");
        if(redirect != null){
            document.getElementById("l_ponencia").style.display = "block";
            document.getElementById("l_ponencia").href = uri + 'ponencias/listar?token=' + token;
        }
    }
    
    $("#logout").click(function() {
        var uri = document.getElementById("uri").value;
        localStorage.removeItem('token');
        localStorage.clear();

        window.location.href = uri;
    });

    function parseJwt (token) {
        var base64Url = token.split('.')[1];
        var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
        var jsonPayload = decodeURIComponent(atob(base64).split('').map(function(c) {
            return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
        }).join(''));
    
        return JSON.parse(jsonPayload);
    };
});