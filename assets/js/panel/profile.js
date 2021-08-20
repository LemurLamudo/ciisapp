$(document).ready(async function() {

    var uri = document.getElementById("uri").value;

    var token = localStorage.getItem("token");

    var json = parseJwt(token);

    $("#name").val(json.data.name );
    $("#email").val(json.data.email );

    $('.bee_add_update_usuario').on('submit' , bee_add_update_usuario);

    async function bee_add_update_usuario(event){
        event.preventDefault();

        var form = $('.bee_add_update_usuario'), data = new FormData(form.get(0));
        
        $data = await add_update_data('panel/update_user', data);
    
        if($data != null){
            window.location.reload(true);
        }
    }

    
    async function add_update_data(url, formData){
        var uri = document.getElementById("uri").value;       
        var hook = 'bee_hook';
        var action = 'get';
        var _res = null;

        formData.append('hook', hook);
        formData.append('action', action);
        var token = localStorage.getItem("token");

        await $.ajax({
            url: `${uri}${url}?token=`  + token,
            type: 'post',
            dataType: 'json',
            contentType: false,
            processData: false,
            cache: false,
            data: formData,
            beforeSend: function() {

            }
        }).done(function(res) {
            _res = res;
        }).fail( function( err ) {
            alertify.notify('Ingrese todos los campos','error', 4, null);
        }).always(function() {
            
        });

        return _res;
    }

    function parseJwt (token) {
        var base64Url = token.split('.')[1];
        var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
        var jsonPayload = decodeURIComponent(atob(base64).split('').map(function(c) {
            return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
        }).join(''));
    
        return JSON.parse(jsonPayload);
    };

});