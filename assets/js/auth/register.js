$(document).ready(function() {
    $('.bee_add_new_usuario').on('submit' , bee_add_new_usuario);

    function bee_add_new_usuario(event){
        event.preventDefault();
        var form = $('.bee_add_new_usuario'),
            hook = 'bee_hook',
            action = 'add',
            data = new FormData(form.get(0))
            email = $('#email').val(),
            nombre = $('#name').val(),
            tipo_doc = $('#tipo_doc').val(),
            number = $('#number').val(),
            token = $('#token').val();
            
        if(email === '' || email.length < 2) {
            alertify.notify('Ingrese un email válido','warning', 4, null);
            return;
        }

        if(tipo_doc === '') {
            alertify.notify('Ingrese un tipo de documento válido','warning', 4, null);
            return;
        }

        if(!validarEmail(email)){
            alertify.notify('Ingrese un email válido','warning', 4, null);
            return;
        }

        if(!validarCaracteres(nombre)){
            alertify.notify('Ingrese un nombre válido','warning', 4, null);
            return;
        }

        if(!validarNumero(number) || number.length == 0){
            alertify.notify('Ingrese un número válido','warning', 4, null);
            return;
        }
        
        data.append('hook', hook);
        data.append('action', action);

        $.ajax({
            url: '/ciisapp/ajax/register',
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
                document.getElementById("name").value = "";
                document.getElementById("tipo_doc").value = 0;
                document.getElementById("number").value = "";
                document.getElementById("token").value = "";

                window.location.href = '/ciisapp/panel';
            }
        }).fail( function( err ) {
            alertify.notify(err.responseJSON.msg,'error', 8, null);
        }).always(function() {
            
        })
    }

    function validarEmail(email) {
        emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        return (emailRegex.test(email)) ? true : false;
    }

    function validarCaracteres(caracter) {
        caracteregex = /[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/;
        return (caracteregex.test(caracter)) ? true : false;
    }

    function validarNumero(num){
        numero = /^([0-9])*$/;
        return (numero.test(num)) ? true : false;
    }

});