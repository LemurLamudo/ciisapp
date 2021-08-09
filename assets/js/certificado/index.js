$(document).ready(function() {
    var token = localStorage.getItem("token");
    if(token == null) window.location.href = uri;
    var json = parseJwt(token);

    $("#name").text(json.data.name);

    function parseJwt (token) {
        var base64Url = token.split('.')[1];
        var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
        var jsonPayload = decodeURIComponent(atob(base64).split('').map(function(c) {
            return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
        }).join(''));
    
        return JSON.parse(jsonPayload);
    };
});