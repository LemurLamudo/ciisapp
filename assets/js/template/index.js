$(document).ready(function() {

    var uri = document.getElementById("uri").value;

    var token = localStorage.getItem("token");
    if(token == null) window.location.href = uri;
    var json = parseJwt(token);

    document.getElementById("icon").href= uri + 'panel?token=' + token;

    document.getElementById("panel").href= uri + 'panel?token=' + token;
    // document.getElementById("talleres").href= uri + 'talleres?token=' + token;
    // document.getElementById("ponencias").href= uri + 'ponencias?token=' + token;
    document.getElementById("certificado").href= uri + 'certificado?token=' + token;
    document.getElementById("profile").href= uri + 'panel/profile?token=' + token;

    $profile = document.getElementById("profile2");
    if($profile != null){
        $profile.href= uri + 'panel/profile?token=' + token;
    }
    
    $("#username").text(json.data.name);
    
    if(json.data.role == "ROLE_ADMIN"){
        var redirect = document.getElementById("sorteo");
        if(redirect != null){
            document.getElementById("sorteo").style.display = "block";
            document.getElementById("sorteo").innerHTML = `
            <a class="sidebar-link" href="${uri}usuario?token=${token}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus align-middle"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                <span class="align-middle">Sorteo</span>
            </a>
            `;
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

    // <a class="sidebar-link" href="<?php echo URL.'ponencias?token=' ?>" id="ponencias">
    //     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus align-middle"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
    //     <span class="align-middle">Ponencias</span>
    // </a>
});