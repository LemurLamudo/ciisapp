
$(document).ready(function() {
    bee_get_postmaster();

    function bee_get_postmaster(event){
        hook = 'bee_hook',
        action = 'get';
        $.ajax({
            url: 'ajax/get_ponentes_postmaster',
            type: 'post',
            dataType: 'json',
            cache: false,
            data: {
                hook, action
            },
            beforeSend: function() {

            }
        }).done(function(res) {
            if(res.status === 201) {
                console.log(res.data);
            }else{
                console.log(res.data, '¡Upss!');
            }
        }).fail(function(err) {
            console.log('Hubo un error en la petición' , '¡Upss!');
        }).always(function() {

        })
    }
});