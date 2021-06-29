
$(document).ready(function() {
    $('.bee_add_preinscripcion').on('submit' , bee_add_preinscripcion);

    function bee_add_preinscripcion(event){
        event.preventDefault();

        var form = $('.bee_add_preinscripcion'),
        hook = 'bee_hook',
        action = 'add',
        data = new FormData(form.get(0));

        email = $('#email').val();

        if(email === '' || email.length < 2) {

            Swal.fire(
                'Ingrese todos los campos!',
                'Ingrese un email válido',
                'warning'
              )
            return;
        }

        if(!validarEmail(email)){
            Swal.fire(
                'Ingrese todos los campos!',
                'Ingrese un email válido',
                'warning'
              )
            return;
        }

        function validarEmail(email) {
            emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
            if (emailRegex.test(email)) {
                return true;
            } else {
                return false;
            }
        }

        data.append('hook', hook);
        data.append('action', action);

        $.ajax({
            url: 'ajax/preinscripcion',
            type: 'post',
            dataType: 'json',
            contentType: false,
            processData: false,
            cache: false,
            data: data,
            beforeSend: function() {

            }
        }).done(function(res) {

            if(res.status == 201){
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Registrado Correctamente',
                    showConfirmButton: false,
                    timer: 1500
                })

                document.getElementById("email").value = "";
            }

        }).fail(function(err) {

            Swal.fire(
              'Revisar!',
              'Usuario ya preinscrito!',
              'warning'
            )
  
        }).always(function() {

        })
    }
});