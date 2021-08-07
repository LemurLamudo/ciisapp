const Templates = (function () {
  const URI = document.getElementById("images").value;

  const cardTemplate = ({ photo, name }) => {
    const html = `<div class="card mb-3">
        <div class="card-header">
            <img src="${URI}postmaster/ponentes/${photo}" alt="#">
        </div>
        <div class="card-body">
            <div class="name-price text-right">
                <div class="teacher-info ">
                    <img src="${URI}paises/peru.jpg" alt="country-flag" class="card-icon">
                </div>
            </div>
            <div class="">
                <h3 class="c-title mb-1">${name}</h3>
                <p class="c-description"></p>
            </div>
            <div class="card-footer"><a href="javascript:void(0);" class="btn-link">Ver más <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><polyline points="268 112 412 256 268 400" style="fill:none;stroke:#3f4ce7;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px"/><line x1="392" y1="256" x2="100" y2="256" style="fill:none;stroke:#3f4ce7;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px"/></svg></a></div>
          </div>
      </div>`;
    return html;
  };

  return {
    cardTemplate,
  };
})();
