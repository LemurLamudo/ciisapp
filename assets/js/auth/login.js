$(document).ready(function() {
    $('.bee_add_sigIn').on('submit' , bee_add_sigIn);

    function bee_add_sigIn(event){
        event.preventDefault();
        var form = $('.bee_add_sigIn'),
            hook = 'bee_hook',
            action = 'add',
            data = new FormData(form.get(0))
            email = $('#email').val(),
            number = $('#number').val(),
            token = $('#token').val();

        if(email === '' || email.length < 2) {
            alertify.notify('Ingrese un email válido','warning', 4, null);
            return;
        }

        if(!validarEmail(email)){
            alertify.notify('Ingrese un email válido','warning', 4, null);
            return;
        }

        data.append('hook', hook);
        data.append('action', action);
        var uri = document.getElementById("uri").value;

        $.ajax({
            url: uri + 'ajax/login',
            type: 'post',
            dataType: 'json',
            contentType: false,
            processData: false,
            cache: false,
            data: data,
            beforeSend: function() {

            }
        }).done(function(res) {
            if(res.status === 200) {
                localStorage.setItem("token", res.data);
                
                document.getElementById("email").value = "";
                document.getElementById("number").value = "";

                var codeId = getParameterByName('code');
                if(codeId != null){
                  window.location.href = uri + 'panel?token=' + res.data + '&code=' + codeId;
                }else {
                    window.location.href = uri + 'panel?token=' + res.data;
                }
            }
        }).fail( function( err ) {
            console.error(err);
            alertify.notify(err.responseJSON.msg,'error', 8, null);
        }).always(function() {
            
        })
    }

    function validarEmail(email) {
        emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        return (emailRegex.test(email)) ? true : false;
    }

    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }

    function validarNumero(num){
        numero = /^([0-9])*$/;
        return (numero.test(num)) ? true : false;
    }
});
