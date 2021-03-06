<?php 
	$uri = $_SERVER["REQUEST_URI"];
	$detail = explode("?", $uri);
	$aux = substr($detail[0], 1, strlen($detail[0]));
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">

	<title>Congreso Internacional de Informática y Sistemas</title>
  <style>
.timetable{display:grid;grid-template-areas:". week" "time content";grid-template-columns:120px;grid-template-rows:60px}.timetable .weekend{background:#fbfbfc;color:#87a1ad}.timetable__week-names{grid-area:week;display:grid;grid-template-columns:repeat(5,1fr);text-transform:uppercase;font-size:12px;font-weight:600;color:#555}.timetable__week-names>div{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;width:100%;height:100%}.timetable__time-interval{grid-area:time;display:grid;grid-template-rows:repeat(6,1fr);font-size:13px;font-weight:600;color:#555}.timetable__time-interval>div{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;width:100%;height:100%}.timetable__content{grid-area:content;display:grid;grid-template-rows:repeat(6,1fr);grid-template-columns:repeat(5,1fr);border-right:1px solid #dcdcdc;border-bottom:1px solid #dcdcdc}.timetable__content>div{-webkit-box-shadow:inset 1px 0 0 #dcdcdc,inset 0 1px 0 0 #dcdcdc;box-shadow:inset 1px 0 0 #dcdcdc,inset 0 1px 0 0 #dcdcdc}.timetable .row-2{grid-row-end:span 2}.timetable .row-3{grid-row-end:span 3}.timetable__session{padding:1.6rem;height:100%;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center}.timetable__session-time{font-size:13px;font-weight:600;color:#555;margin-bottom:.5rem}.timetable__session-name{font-size:17px;font-weight:600;margin-bottom:.5rem}.timetable__session-presenter{font-size:13.5px}.timetable__session.attended{background-color:#ddf7e4}.timetable__session.skipped{background-color:#fee5e3}
  </style>
	<link href="<?php echo CSS.'app.css' ?>" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo PLUGINS.'alertify/css/alertify.min.css' ?>" />  
  	<link rel="stylesheet" href="<?php echo PLUGINS.'alertify/css/themes/default.min.css' ?>" /> 
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

	<script src="<?php echo JS.'global.js' ?>"></script>
</head>

<body>
	<input type="hidden" id="images" value="<?php echo IMAGES ?>">
	<input type="hidden" id="uri" value="<?php echo URL ?>">
	<div class="wrapper">

        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="<?php echo URL.'panel?token=' ?>" id="icon">
					<span class="align-middle">                        
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 349 106.7" width="140" height="42" fill="#fff" class="logo-white"><path fill-rule="evenodd" d="M286 104.7a5.2 5.2 0 01-3.4-.9 3.2 3.2 0 01-1.1-2.7v-6.6a.8.8 0 01.2-.5h1.3a.8.8 0 01.2.5v6.6a6.8 6.8 0 00.2 1.4 2.2 2.2 0 00.9.7l1.7.2h2.4l1.7-.2c.5-.2.8-.4.9-.7a3.2 3.2 0 00.3-1.4v-6.6a.8.8 0 01.2-.5h1.3a.8.8 0 01.2.5v6.6a3.2 3.2 0 01-1.1 2.7 5.4 5.4 0 01-3.5.9zm11.6 0c-.5 0-.8-.2-.8-.7v-9.5c0-.4.3-.6.8-.6a1.1 1.1 0 01.9.4l8.1 8.3h-.4v-8.1c0-.4.3-.6.8-.6s.9.2.9.6v9.5c0 .5-.3.7-.9.7a.9.9 0 01-.8-.4l-8.1-8.3h.4v8c0 .5-.3.7-.9.7zm16.9 0a4.9 4.9 0 01-2.9-.6 2.5 2.5 0 01-1.2-1.9c0-.3 0-.4.2-.6l.6-.2a1 1 0 01.9.7 1.3 1.3 0 00.6 1 5.7 5.7 0 001.8.3h1.6l1.5-.2a1.6 1.6 0 00.8-.6 5 5 0 00.2-1.2v-6.9c0-.4.3-.6.8-.6s.9.2.9.6v6.9a3 3 0 01-1 2.5 5.1 5.1 0 01-3.2.8zm10.4 0c-.5 0-.8-.2-.8-.7v-9.5c0-.4.3-.6.8-.6h5.3a4.4 4.4 0 012.5.6 2.2 2.2 0 01.8 2v.4a1.9 1.9 0 01-.8 1.7 2.5 2.5 0 011.6 2.6v.5a2.3 2.3 0 01-1 2.2 4 4 0 01-2.8.8zm.9-6.5h4.8a1 1 0 001-.4c.2-.2.2-.5.2-.9v-.4a1.7 1.7 0 00-.3-1 2.8 2.8 0 00-1.3-.3h-4.4zm0 5.2h4.7a2.9 2.9 0 001.6-.4 1.9 1.9 0 00.5-1.3v-.5a1.5 1.5 0 00-.5-1.3 2.3 2.3 0 00-1.6-.4h-4.7zm15.6 1.3a5.2 5.2 0 01-3.4-.9 3.2 3.2 0 01-1.1-2.7v-3.7a3.2 3.2 0 011.1-2.7 5.7 5.7 0 013.4-.8h2.5a7.2 7.2 0 012.9.6 2.7 2.7 0 011.1 1.9.7.7 0 01-.1.6h-.7a.8.8 0 01-.9-.6 1.1 1.1 0 00-.6-1 4.7 4.7 0 00-1.7-.3h-2.5l-1.7.2a1 1 0 00-.8.7 2.8 2.8 0 00-.3 1.3v3.7a3.2 3.2 0 00.3 1.4c.1.3.4.5.8.7l1.7.2h2.5l1.4-.2a1.6 1.6 0 00.8-.6 5 5 0 00.2-1.2v-.7h-1.6c-.6 0-.8-.2-.8-.7s.2-.7.8-.7h2.4q.9 0 .9.6v1.4a3 3 0 01-1 2.5 4.8 4.8 0 01-3.1.8zM200.9 85.5c-7.9 0-13.8-1.7-17.6-5.2s-5.7-9-5.7-16.3V41.9c0-7.4 1.9-12.9 5.7-16.4s9.6-5.2 17.5-5.2h12.6c6.5 0 11.5 1.3 14.9 3.8s5.5 6.4 6 11.7a3.2 3.2 0 01-.8 3.1 4.8 4.8 0 01-3.4 1.1c-2.6 0-4.1-1.4-4.5-4.1s-1.5-4.9-3.3-5.9-4.8-1.6-8.9-1.6h-12.6a25.2 25.2 0 00-8.6 1.2 7.9 7.9 0 00-4.5 4.1 20.8 20.8 0 00-1.3 8.2V64a20.3 20.3 0 001.3 8.1 7.9 7.9 0 004.5 4.1 25.5 25.5 0 008.7 1.3h12.5c4.1 0 7-.6 8.9-1.6s2.9-3 3.3-5.9 1.9-4.1 4.5-4.1a4.8 4.8 0 013.4 1.1 3.2 3.2 0 01.8 3.1c-.5 5.3-2.5 9.3-6 11.7s-8.4 3.7-14.9 3.7zm50.3 0a4.4 4.4 0 01-3.3-1 3.8 3.8 0 01-1.1-3v-57a4 4 0 011.1-3.1 6.1 6.1 0 016.6 0 3.9 3.9 0 011 3.1v57a3.7 3.7 0 01-1 3 4.4 4.4 0 01-3.3 1zm24.6 0a4.4 4.4 0 01-3.3-1 3.8 3.8 0 01-1.1-3v-57a4 4 0 011.1-3.1 6.1 6.1 0 016.6 0 4 4 0 011.1 3.1v57a3.8 3.8 0 01-1.1 3 4.4 4.4 0 01-3.3 1zm37.9 0q-8.8 0-13.8-3.3a14.7 14.7 0 01-6.3-10.2 3.7 3.7 0 011-3.2 4.4 4.4 0 013.3-1.1 4.6 4.6 0 013.2 1 4.9 4.9 0 011.4 3 6.1 6.1 0 003.3 4.5 19.3 19.3 0 007.9 1.3h15c4.5 0 7.5-.8 9.1-2.3s2.4-4.3 2.4-8.3-.8-7-2.5-8.5-4.6-2.3-9-2.3h-12.9c-6.6 0-11.4-1.5-14.6-4.4s-4.8-7.5-4.8-13.6 1.6-10.5 4.8-13.4 7.9-4.4 14.5-4.4h12.4c5.5 0 9.8 1.1 12.9 3.2a13.5 13.5 0 016 9.5 3.5 3.5 0 01-.8 3.2 4.9 4.9 0 01-3.5 1.1 4.5 4.5 0 01-3.1-1 5.4 5.4 0 01-1.3-3 5.6 5.6 0 00-3.2-3.8 18.4 18.4 0 00-7-1.1h-12.4q-6.3 0-8.4 2.1c-1.4 1.3-2.1 3.9-2.1 7.6s.7 6.4 2.2 7.8 4.2 2.1 8.4 2.1h12.9c6.8 0 11.9 1.6 15.2 4.6s5.1 7.9 5.1 14.3-1.7 11.1-5 14.1-8.4 4.5-15.3 4.5z"/><path fill-rule="evenodd" d="M144.8 64.4a4.6 4.6 0 00-4.5 3.3h-11.9V53.9h7.8a4.4 4.4 0 008.6-.9 4.3 4.3 0 00-4.3-4.3 4.5 4.5 0 00-4.2 3.1h-7.9v-13h11.9a4.8 4.8 0 104.5-6.3 4.7 4.7 0 00-4.5 3.4h-11.9v-12h7.9a4.2 4.2 0 004.2 3.3 4.3 4.3 0 100-8.6 4.5 4.5 0 00-4.2 3.1h-7.9v-8.2A13.4 13.4 0 00115.1 0H35.2a13.4 13.4 0 00-13.5 13.5v6.9h-7.1a4.4 4.4 0 00-4.2-3.3A4.5 4.5 0 006 21.4a4.4 4.4 0 004.3 4.4 4.4 4.4 0 004.2-3.3h7.2v13.1H9.3a4.6 4.6 0 00-4.5-3.4A4.7 4.7 0 000 37a4.8 4.8 0 004.8 4.8 4.6 4.6 0 004.5-3.3h12.4v13.7h-7.1a4.3 4.3 0 00-4.2-3.2A4.4 4.4 0 006 53.3a4.3 4.3 0 004.3 4.3 4.4 4.4 0 004.2-3.3h7.2v13.8H9.3a4.6 4.6 0 00-4.5-3.4 4.8 4.8 0 000 9.6A4.6 4.6 0 009.3 71h12.4v12.8h-7a4.3 4.3 0 00-4.2-3.2 4.4 4.4 0 00-4.4 4.3 4.3 4.3 0 004.3 4.3 4.4 4.4 0 004.3-3.3h7v7.3a13.4 13.4 0 0013.5 13.5h79.6a13.4 13.4 0 0013.5-13.5v-7.5h7.9a4.2 4.2 0 004.1 3.3 4.4 4.4 0 004.4-4.3 4.3 4.3 0 00-4.1-4.5 4.2 4.2 0 00-4.4 3.4h-7.9v-13h11.9a4.6 4.6 0 004.5 3.4 4.8 4.8 0 100-9.6zm-32.6 35.5H38a9.5 9.5 0 01-9.4-9.5v-74A9.5 9.5 0 0138 6.9h74.2a9.4 9.4 0 019.4 9.4v74a9.5 9.5 0 01-9.4 9.6zm-.9-91.1H38.8a8.2 8.2 0 00-8.2 8.1v73a8.2 8.2 0 008.2 8.1h72.5a8.1 8.1 0 008.1-8.1v-73a8.1 8.1 0 00-8.1-8.1zm5.6 80.2a6.7 6.7 0 01-6.7 6.7h-3v-4.4l-13.8-5v-1.5a2.8 2.8 0 001.8-2.7 3.2 3.2 0 00-3.1-2.9 2.9 2.9 0 00-2.9 2.9 3.3 3.3 0 001.8 2.7v3l13.6 5v2.8H76.5V84.9a3.2 3.2 0 001.9-2.8 3 3 0 00-6 0 3.1 3.1 0 001.7 2.7v10.9h-29v-2.8l13.7-5.3h.1v-2.8a3 3 0 001.7-2.7 2.9 2.9 0 00-2.9-2.9 2.9 2.9 0 00-3 2.8v.2a2.9 2.9 0 001.7 2.6v1.1l-13.7 5.3v4.5h-2.8a6.7 6.7 0 01-6.8-6.6V17.8a6.7 6.7 0 016.7-6.7h2.9V15l13.8 5v1.2a3.1 3.1 0 00-1.8 2.8 2.9 2.9 0 003.1 2.9 2.9 2.9 0 002.9-2.9 2.7 2.7 0 00-1.8-2.6v-2.9l-13.6-5v-2.4h29.2v10.1a3.2 3.2 0 00-1.9 2.8 2.9 2.9 0 002.9 2.9 2.9 2.9 0 003-2.8v-.2a2.9 2.9 0 00-1.7-2.6V11.1h27.9v2.2L91 18.6V22a3 3 0 001.2 5.7 3.2 3.2 0 003-3 3 3 0 00-1.6-2.7v-1.7l13.6-5.3v-3.9h3a6.7 6.7 0 016.7 6.7zm-62-36.3L63.1 41a2.7 2.7 0 00.6-1.7 2.6 2.6 0 00-.7-1.9 2 2 0 00-1.7-.9 2.5 2.5 0 00-1.7 1.1l-7.6 11-7.7-11a2 2 0 00-2.7-.8 1.3 1.3 0 00-.7.6 2.6 2.6 0 00-.7 1.9 2.7 2.7 0 00.6 1.7L49 52.7l-8.5 12.2a3 3 0 00-.6 1.8 2.6 2.6 0 00.7 1.9 2.1 2.1 0 001.7.8 2.3 2.3 0 001.7-1l8-11.6 8 11.6a2.1 2.1 0 001.7 1 2.3 2.3 0 001.7-.8 3.2 3.2 0 00.7-1.9 3 3 0 00-.6-1.8zm26.1 0L89.2 41a2.7 2.7 0 00.6-1.7 2.6 2.6 0 00-.7-1.9 2 2 0 00-1.7-.9 2.5 2.5 0 00-1.7 1.1l-7.6 11-7.7-11a2 2 0 00-2.7-.8 1.3 1.3 0 00-.7.6 2.6 2.6 0 00-.7 1.9 2.7 2.7 0 00.6 1.7l8.2 11.7-8.5 12.2a3 3 0 00-.6 1.8 2.6 2.6 0 00.7 1.9 2.1 2.1 0 001.7.8 2.3 2.3 0 001.7-1l8-11.6 8 11.6a2.1 2.1 0 001.7 1 2.3 2.3 0 001.7-.8 3.2 3.2 0 00.7-1.9 3 3 0 00-.6-1.8zm15.6-16.2a2.1 2.1 0 00-1.8.9 2.7 2.7 0 00-.7 2.1v26.9a3.4 3.4 0 00.7 2.2 2.5 2.5 0 001.8.8 2.7 2.7 0 001.9-.8 3.4 3.4 0 00.7-2.2V39.5a2.7 2.7 0 00-.7-2.1 2.5 2.5 0 00-1.9-.9zm11.1 0a2.5 2.5 0 00-1.9.9 3.9 3.9 0 00-.6 2.1v26.9a4.3 4.3 0 00.6 2.2 2.7 2.7 0 001.9.8 2.3 2.3 0 001.8-.8 3.4 3.4 0 00.7-2.2V39.5a2.7 2.7 0 00-.7-2.1 2.1 2.1 0 00-1.8-.9z"/></svg>
					</span>
				</a>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">Postmaster</li>
                    <li class="sidebar-item <?php echo ($aux == 'panel')?'active' : '' ?>">
                        <a class="sidebar-link" href="<?php echo URL.'panel?token=' ?>" id="panel">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus align-middle"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                        <span class="align-middle">Asistencia</span>
                        </a>
                    </li>
                    <!-- <li class="sidebar-item">
                        <a class="sidebar-link" href="<?php echo URL.'talleres?token=' ?>" id="talleres">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus align-middle"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                        <span class="align-middle">Talleres</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?php echo URL.'ponencias?token=' ?>" id="ponencias">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus align-middle"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                        <span class="align-middle">Ponencias</span>
                        </a>
                    </li>-->
                    <li class="sidebar-item <?php echo ($aux == 'certificado')?'active' : '' ?>">
                        <a class="sidebar-link" href="<?php echo URL.'certificado?token=' ?>" id="certificado">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus align-middle"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                        <span class="align-middle">Certificado</span>
                        </a>
                    </li> 
					<li class="sidebar-item" style="display:none" id="sorteo">
                        
                    </li>
                </ul>
            </div>
        </nav>

        <div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>
				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">1</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									1 Notificación
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-success" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Postmaster</div>
												<div class="text-muted small mt-1">20 de Agosto del 2021</div>
												<div class="text-muted small mt-1">100% Virtual</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Ver todas las notificaciones</a>
								</div>
							</div>
						</li>
						
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                <img src="<?php echo IMAGES.'avatar.png' ?>" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark" id="username"></span>
                            </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="<?php echo URL.'panel/profile?token=' ?>" id="profile"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href=""><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
								<a class="dropdown-item" href=""><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" id="logout">Cerrar Sesión</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			