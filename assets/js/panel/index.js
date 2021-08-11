bee_get_postmaster();

async function bee_get_postmaster() {
  $data = await get_type("ajax/get_ponentes_postmaster");

  var formData = new FormData();
  $asistencia = await add_type("panel/get_asistencia", formData);

  if ($data != null) {
    $ponencias = $("#ponencias");
    var uri = document.getElementById("images").value;
    let adicional = "";
    let htmlOptions = "";
    $data.data.forEach((ponente) => {
      if (ponente.status_ponencia == 1) {
        var aux = false;
        if ($asistencia.data) {
          $asistencia.data.forEach((asistencia) => {
            if (asistencia.ponencia_id == ponente.ponencia_id) {
              aux = true;
            }
          });
        }
        htmlOptions += `
                        <div class="col-12 mb-4 mb-md-0" style="opacity:0.5"> 
                            <div class="card mb-3 shadow-none">
                            <div class="row g-0">
                                <div class="col-md-2 d-flex align-items-center justify-content-center">
                                <div class="d-flex" style="width:100px;height:100px;border-radius:50%;overflow:hidden;"><img class="card-img-top" src="${uri}postmaster/ponentes/${ponente.photo}" alt="Unsplash"></div>
                                </div>
                                <div class="col-md-8">
                                <div class="card-body text-left">
                                    <h5 class="card-title">${ponente.name}</h5>
                                    <p class="card-text">${ponente.hora_ini} - ${ponente.hora_fin}</p>
                                    <p class="card-text">${ponente.name_tema}</p>
                                </div>
                                </div> `;

        if (aux)
          htmlOptions += `<div class="col-md-2 d-flex justify-content-end align-items-center"><a href="#" class="btn btn-success">Asistencia</a></div>`;
        else
          htmlOptions += `<div class="col-md-2 d-flex justify-content-end align-items-center"><a href="#" class="btn btn-danger">Falta</a></div>`;

        htmlOptions += `</div>
                            </div>
                        </div>
                        `;
      }

      if (ponente.asistencia == 1 && !aux) {
        adicional += `
                        <div class="col-12 mb-4 mb-md-0">
                            <div class="card mb-3 shadow-none">
                              <div class="row g-0">
                                <div class="col-md-2 d-flex align-items-center justify-content-center">
                                <div class="d-flex" style="width:100px;height:100px;border-radius:50%;overflow:hidden;"><img class="card-img-top" src="${uri}postmaster/ponentes/${ponente.photo}"></div>
                                </div>
                                <div class="col-md-6">
                                  <div class="card-body text-left">
                                    <h5 class="card-title">${ponente.name}</h5>
                                    <p class="card-text">${ponente.name_tema}</p>
                                  </div>
                                </div>
                                <div class="col-md-4 d-flex justify-content-center align-items-center"><div class="input-group"><input class="form-control py-2" type="text" placeholder="Ingresa código" name="code" id="code" ><button class="btn btn-primary" onclick="marcar_asistencia(${ponente.ponencia_id})">Marcar asistencia</button></div></div>
                              </div>
                            </div>
                        </div> 
                        <hr>
                        `;
      }
    });
    $ponencias.html(adicional + htmlOptions);

    var codeId = getParameterByName('code');
    var code = document.getElementById("code");
    if(codeId != null && code != null){
      code.value = codeId;
    }
  }

  function getParameterByName(name) {
      name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
      var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
      results = regex.exec(location.search);
      return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
  }
}

async function marcar_asistencia($id) {
  var formData = new FormData();
  var $code = $("#code").val();

  formData.append("ponencia_id", $id);
  formData.append("code", $code);
  $asistencia = await add_type("panel/asistencia", formData);

  if ($asistencia != null) {
    alertify.notify("Asistencia Guardada", "success", 4, null);
    bee_get_postmaster();
  }
}
