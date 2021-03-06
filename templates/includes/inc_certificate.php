<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Certificado</title>
</head>
<style>
  * {
    margin:0;
    padding: 0;
    box-sizing:border-box; 
  }
  html{
    background: url('<?php echo IMAGES.'certificado/certificado_bg.jpeg'?>') no-repeat center center fixed;
    background-size: cover;
    font-family: 'Segoe UI', sans-serif;
  }
  .container{
    padding-left:18%;
  }
  .row {
    vertical-align:middle;
  }

  .row:first-child {
    margin-top: 30px;
  }

  .img-div {
    display: inline-block;
    width: 22%;
    margin-right:54px;
    vertical-align: middle;
  }

  .img-div:last-child {
    margin-right:0;
  }

  .temarios {
    display:table-cell;
    width: 25%;
    vertical-align:top;
    padding-right: 50px;
    border-right: 8px solid #0080fb;
  }

  .temarios h2{
    font-size: 40px;
    margin-bottom: 20px;
  }

  .main {
    display:table-cell;
    padding: 0 50px;
    width: 60%;
  }

  .main h2 {
    font-size: 65px;
    margin-bottom: 20px;
    font-weight: 800;
  }

  .div {
    display: inline-block;
    vertical-align: middle;
  }

  .div:last-child {
    margin-left: 10px;
    max-width: 65%;
  }

  .text-center {
    text-align: center;
  }

  .title {
    padding: 50px 0;
    font-size: 54px;
    font-weight: 700;
  }

  .title span:first-child {
    color: #0080fb;
  }

  .table {
    display: table-row;
  }
  .table-row {
    display: table-row;
  }

  p, li{
    font-size: 24px;
  }

  .nombre-participante {
    display:block;
    padding: 10px 0;
    font-size: 38px;
  }

  .tipo-participante {
    font-weight: 800;
    display: block;
    padding: 10px 0;
    font-size: 30px;
  }

  .row:last-child {
    margin-top: 180px;
  }

  .firma {
    display: inline-block;
    margin-left: 48px;
  }

  .firma p {
    font-size: 19px;
  }

  .firma:first-child{
    margin-left: 0;
  }

  .line {
    background: #000;
    height: 2px;
    width: 100%;
    margin-bottom: 10px; 
  }
</style>
<body>
  <div class="container">
    <div class="row">
      <div class="img-div">
        <div class="div"><img src="<?php echo IMAGES.'certificado/unjbg.png' ?>" alt="unjbg"  height="95"></div>
        <div class="div"><span>UNIVERSIDAD NACIONAL JORGE BASADRE GROHMANN</span></div>
      </div>
      <div class="img-div">
        <div class="div">
          <img src="<?php echo IMAGES.'certificado/esis.png' ?>" alt="esis"  height="95">
        </div>
        <div class="div">
          <span>ESCUELA PROFESIONAL DE INGENIERIA EN INFORMATICA Y SISTEMAS</span>
        </div>
      </div>
      <div class="img-div">
        <div class="div"><img src="<?php echo IMAGES.'certificado/circulo_estudios.jfif' ?>" alt="circulo_estudios"  height="95"></div>
        <div class="div" style="width:40%"><span>CIRCULO DE ESTUDIOS DE LA ESIS</span></div>
      </div>
      <div class="img-div">
        <img src="<?php echo IMAGES.'certificado/ciis.png' ?>" alt="ciis" width="238" height="73">
      </div>
    </div>
    <div class="row text-center title">
      <span>XVIII </span><span>POSTMASTER</span>
    </div>
    <div class="row table">
      <div class="table-row">
        <div class="temarios">
          <h2 class="text-center">TEMARIO</h2>
          <ul>
            <li>*sin definir*</li>
            <li>Implementacion NIST Cybersecurity Framework</li>
            <li>Gesti??n de servicios en la transformaci??n, caso de estudio regi??n centro</li>
            <li>Riesgos tecnol??gicos para ingenieros</li>
            <li>Modernizaci??n del estado en el sector justicia</li>
            <li>Transformaci??n digital guiado por datos en Banca Digital</li>
            <li>Introducci??n a Bases de Datos y SQL</li>
          </ul>
        </div>
        <div class="main text-center">
          <h2>CERTIFICADO</h2>
          <p>Otorgado a:</p>
          <span class="nombre-participante">NOMBRE DEL PARTICIPANTE</span>
          <p>Por su participaci??n en calidad de:</p>
          <span class="tipo-participante">ASISTENTE</span>
          <p style="text-align:justify;">En el evento acad??mico denominado XVIII POSTMASTER 2021, organizado por el C??rculo de Estudios de la ESIS, de la Escuela Profesional de Ingenier??a en Inform??tica y Sistemas de la Facultad de Ingenier??a de la Universidad Nacional Jorge Basadre Grohmann, llevado acabo v??a online, con una duraci??n de 10 horas acad??micas.</p>
          <p style="text-align:right;">Tacna, 20 de agosto del 2021</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="firma text-center">
        <div class="line"></div>
        <p>Dr. JORGE LUIS LOZANO CERVERA</p>
        <p>Vicerrector Acad??mico</p>
        <p>U. N. Jorge Basadre Grohmann</p>
      </div>
      <div class="firma text-center">
        <div class="line"></div>
        <p>Mgr. GIANFRANCO ALEXEY M??LAGA TEJADA</p>
        <p>Decano</p>
        <p>Facultad de ingenier??a</p>
      </div>
      <div class="firma text-center">
        <div class="line"></div>
        <p>Dr. ERBERT FRANCISCO OSCO MAMANI</p>
        <p>Director</p>
        <p>E. P. de Ingenier??a en Inform??tica y Sistemas</p>
      </div>
      <div class="firma text-center">
        <div class="line"></div>
        <p>Est. JAVIER ALEX JIMENEZ MENDOZA</p>
        <p>Director</p>
        <p>Comit?? Organizador XVIII POSTMASTER</p>
      </div>
    </div>
  </div>
</body>
</html>