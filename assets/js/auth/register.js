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
            Swal.fire(
                'Ingrese todos los campos!',
                'Ingrese un email válido',
                'warning'
            );
            return;
        }

        if(tipo_doc === '') {
            Swal.fire(
                'Ingrese todos los campos!',
                'Ingrese un tipo de documento válido',
                'warning'
            );
            return;
        }

        if(!validarEmail(email)){
            Swal.fire(
                'Ingrese todos los campos!',
                'Ingrese un email válido',
                'warning'
            );
            return;
        }

        if(!validarCaracteres(nombre)){
            Swal.fire(
                'Ingrese todos los campos!',
                'Ingrese un nombre válido',
                'warning'
            );
            return;
        }

        if(!validarNumero(number) || number.length == 0){
            Swal.fire(
                'Ingrese todos los campos!',
                'Ingrese un número válido',
                'warning'
            );
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
                // console.log(res.msg);
                document.getElementById("email").value = "";
                document.getElementById("name").value = "";
                document.getElementById("tipo_doc").value = 0;
                document.getElementById("number").value = "";
                document.getElementById("token").value = "";
            }
        }).fail( function( err ) {
            Swal.fire(
                'Mensaje de Error!',
                err.responseJSON.msg,
                'error'
            );
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