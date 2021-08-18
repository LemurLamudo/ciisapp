$(document).ready(async function() {

    var uri = document.getElementById("uri").value;
    var token = localStorage.getItem("token");
    var hook = 'bee_hook';
    var action = 'get'; 

    $('#obtener_usuarios').click(function(){
        $.ajax({
            url:  `${uri}usuario/sorteo?token=${token}`,
            type: 'post',
            dataType: 'json',
            cache: false,
            data: {
                hook, action
            },
            beforeSend: function() {
    
            }
        }).done(function(res) {
            if(res.data.length > 0){
                let htmlOptions = "";
                var con = 0;
                res.data.forEach((usuario) => {
                    if(con == 0){
                        htmlOptions += `
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">${usuario["name"]}</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                            <img src="https://image.flaticon.com/icons/png/512/61/61496.png" width="24" height="24"/>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        `;
                    }else {
                        htmlOptions += `
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">${usuario["name"]}</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                            <img src="https://futooro.com/wp-content/uploads/2018/11/numero-2-numerologia.png" width="24" height="24"/>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        `;
                    }

                    con ++;
                });
                $usuarios = $("#ganadores");
                $usuarios.html(htmlOptions);
                alertify.notify("Sorteo XVIII POSTMASTER",'success', 4, null);
            }
        }).fail( function( err ) {
            console.error(err);
            alertify.notify("Ocurrio un error",'error', 8, null);
        }).always(function() {
            
        });
    });

    $.ajax({
        url:  `${uri}usuario/all?token=${token}`,
        type: 'post',
        dataType: 'json',
        cache: false,
        data: {
            hook, action
        },
        beforeSend: function() {

        }
    }).done(function(res) {
        if(res.data.length > 0){
            let htmlOptions = "";
            res.data.forEach((usuario) => {
                if (usuario.repetidos == 8) {
                    htmlOptions += `
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">${usuario["name"]}</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                        <img src="https://img.icons8.com/dotty/80/000000/checked-user-male.png" width="24" height="24"/>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    `;
                }
            });
            $usuarios = $("#usuarios");
            $usuarios.html(htmlOptions);
        }
    }).fail( function( err ) {
        alertify.notify("Ocurrio un error",'error', 8, null);
    }).always(function() {

    });
});