async function get_type(url) {
    var uri = document.getElementById("uri").value;    
    var hook = 'bee_hook';
    var action = 'get';   
    var _res = null;

    await $.ajax({
        url:  `${uri}${url}`,
        type: 'post',
        dataType: 'json',
        cache: false,
        data: {
            hook, action
        },
        beforeSend: function() {

        }
    }).done(function(res) {
        _res = res;
    }).fail( function( err ) {
        alertify.notify("Ocurrio un error",'error', 8, null);
    }).always(function() {

    });

    return _res;
}

async function add_type(url, formData){
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
        alertify.notify('No se pudo cargar','error', 4, null);
    }).always(function() {
        
    });

    return _res;
}