<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    
    //Load Composer's autoloader
    require 'vendor/autoload.php';
    
    class ajaxController extends Controller {

        private $accepted_actions = ['add','get','load','update','delete'];
        private $required_params = ['hook','action'];

        function __construct()
        {
            foreach ($this->required_params as $param) {
                if(!isset($_POST[$param])) {
                    json_output(json_build(403));
                }
            }

            if(!in_array($_POST['action'] , $this->accepted_actions)) {
                json_output(json_build(403));
            }
        }
        
        function index()
        {
            json_output(json_build(403));
        }

        function preinscripcion(){
            try{
                $csrf = new Csrf();
                $token = $csrf->get_token();

                $usuario           = new usuarioModel();
                $usuario->email    = $_POST['email'];
              
                $message = '
                <html>
                <head>
                  <meta name="viewport" content="width=device-width">
                  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                  <title>CIIS Email</title>
                  <style>
                    @media only screen and (max-width: 620px) {
                      table[class=body] h1 {
                        font-size: 28px !important;
                        margin-bottom: 10px !important;
                      }
                
                      table[class=body] p,
                      table[class=body] ul,
                      table[class=body] ol,
                      table[class=body] td,
                      table[class=body] span,
                      table[class=body] a {
                        font-size: 16px !important;
                      }
                
                      table[class=body] .wrapper,
                      table[class=body] .article {
                        padding: 10px !important;
                      }
                
                      table[class=body] .content {
                        padding: 0 !important;
                      }
                
                      table[class=body] .container {
                        padding: 0 !important;
                        width: 100% !important;
                      }
                
                      table[class=body] .main {
                        border-left-width: 0 !important;
                        border-radius: 0 !important;
                        border-right-width: 0 !important;
                      }
                
                      table[class=body] .btn table {
                        width: 100% !important;
                      }
                
                      table[class=body] .btn a {
                        width: 100% !important;
                      }
                
                      table[class=body] .img-responsive {
                        height: auto !important;
                        max-width: 100% !important;
                        width: auto !important;
                      }
                    }
                    @media all {
                      .ExternalClass {
                        width: 100%;
                      }
                
                      .ExternalClass,
                      .ExternalClass p,
                      .ExternalClass span,
                      .ExternalClass font,
                      .ExternalClass td,
                      .ExternalClass div {
                        line-height: 100%;
                      }
                
                      .apple-link a {
                        color: inherit !important;
                        font-family: inherit !important;
                        font-size: inherit !important;
                        font-weight: inherit !important;
                        line-height: inherit !important;
                      }
                
                      #MessageViewBody a {
                        color: inherit;
                        text-decoration: none;
                        font-size: inherit;
                        font-family: inherit;
                        font-weight: inherit;
                        line-height: inherit;
                      }
                
                      .btn-primary table td:hover {
                        background-color: #34495e !important;
                      }
                
                      .btn-primary a:hover {
                        background-color: #34495e !important;
                        border-color: #34495e !important;
                      }
                    }
                  </style>
                </head>';
                
              $message.= '<body
                  style="background-color: #f6f6f6; font-family: '. chr(39).'Segoe UI'.chr(39) .', sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
                  <span class="preheader"
                    style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">Confirmacion
                    de preinscripcion</span>
                  <table border="0" cellpadding="0" cellspacing="0" class="body"
                    style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;">
                    <tr>
                      <td style="font-family: '. chr(39).'Segoe UI'.chr(39) .', sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
                      <td class="container"
                        style="font-family: '. chr(39).'Segoe UI'.chr(39) .', sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
                        <div style="padding: 13px 0;text-align: center;">
                          <svg xmlns="http://www.w3.org/2000/svg" width="140" height="42" viewBox="0 0 349 106.7" class="logo-color">
                            <defs>
                              <linearGradient id="a" x1="39.9" x2="110.2" y1="53.4" y2="53.4" gradientUnits="userSpaceOnUse">
                                <stop offset="0" stop-color="#009fe3" />
                                <stop offset=".2" stop-color="#0384c0" />
                                <stop offset=".6" stop-color="#086396" />
                                <stop offset=".8" stop-color="#0a4f7c" />
                                <stop offset="1" stop-color="#0b4772" />
                              </linearGradient>
                            </defs>
                            <path fill="#3c3c3b"
                              d="M286 104.7a5.2 5.2 0 01-3.4-.9 3.2 3.2 0 01-1.1-2.7v-6.6a.8.8 0 01.2-.5h1.3a.8.8 0 01.2.5v6.6a6.8 6.8 0 00.2 1.4 2.2 2.2 0 00.9.7l1.7.2h2.4l1.7-.2c.5-.2.8-.4.9-.7a3.2 3.2 0 00.3-1.4v-6.6a.8.8 0 01.2-.5h1.3a.8.8 0 01.2.5v6.6a3.2 3.2 0 01-1.1 2.7 5.4 5.4 0 01-3.5.9zm11.6 0c-.5 0-.8-.2-.8-.7v-9.5c0-.4.3-.6.8-.6a1.1 1.1 0 01.9.4l8.1 8.3h-.4v-8.1c0-.4.3-.6.8-.6s.9.2.9.6v9.5c0 .5-.3.7-.9.7a.9.9 0 01-.8-.4l-8.1-8.3h.4v8c0 .5-.3.7-.9.7zm16.9 0a4.9 4.9 0 01-2.9-.6 2.5 2.5 0 01-1.2-1.9c0-.3 0-.4.2-.6l.6-.2a1 1 0 01.9.7 1.3 1.3 0 00.6 1 5.7 5.7 0 001.8.3h1.6l1.5-.2a1.6 1.6 0 00.8-.6 5 5 0 00.2-1.2v-6.9c0-.4.3-.6.8-.6s.9.2.9.6v6.9a3 3 0 01-1 2.5 5.1 5.1 0 01-3.2.8zm10.4 0c-.5 0-.8-.2-.8-.7v-9.5c0-.4.3-.6.8-.6h5.3a4.4 4.4 0 012.5.6 2.2 2.2 0 01.8 2v.4a1.9 1.9 0 01-.8 1.7 2.5 2.5 0 011.6 2.6v.5a2.3 2.3 0 01-1 2.2 4 4 0 01-2.8.8zm.9-6.5h4.8a1 1 0 001-.4c.2-.2.2-.5.2-.9v-.4a1.7 1.7 0 00-.3-1 2.8 2.8 0 00-1.3-.3h-4.4zm0 5.2h4.7a2.9 2.9 0 001.6-.4 1.9 1.9 0 00.5-1.3v-.5a1.5 1.5 0 00-.5-1.3 2.3 2.3 0 00-1.6-.4h-4.7zm15.6 1.3a5.2 5.2 0 01-3.4-.9 3.2 3.2 0 01-1.1-2.7v-3.7a3.2 3.2 0 011.1-2.7 5.7 5.7 0 013.4-.8h2.5a7.2 7.2 0 012.9.6 2.7 2.7 0 011.1 1.9.7.7 0 01-.1.6h-.7a.8.8 0 01-.9-.6 1.1 1.1 0 00-.6-1 4.7 4.7 0 00-1.7-.3h-2.5l-1.7.2a1 1 0 00-.8.7 2.8 2.8 0 00-.3 1.3v3.7a3.2 3.2 0 00.3 1.4c.1.3.4.5.8.7l1.7.2h2.5l1.4-.2a1.6 1.6 0 00.8-.6 5 5 0 00.2-1.2v-.7h-1.6c-.6 0-.8-.2-.8-.7s.2-.7.8-.7h2.4q.9 0 .9.6v1.4a3 3 0 01-1 2.5 4.8 4.8 0 01-3.1.8zM200.9 85.5c-7.9 0-13.8-1.7-17.6-5.2s-5.7-9-5.7-16.3V41.9c0-7.4 1.9-12.9 5.7-16.4s9.6-5.2 17.5-5.2h12.6c6.5 0 11.5 1.3 14.9 3.8s5.5 6.4 6 11.7a3.2 3.2 0 01-.8 3.1 4.8 4.8 0 01-3.4 1.1c-2.6 0-4.1-1.4-4.5-4.1s-1.5-4.9-3.3-5.9-4.8-1.6-8.9-1.6h-12.6a25.2 25.2 0 00-8.6 1.2 7.9 7.9 0 00-4.5 4.1 20.8 20.8 0 00-1.3 8.2V64a20.3 20.3 0 001.3 8.1 7.9 7.9 0 004.5 4.1 25.5 25.5 0 008.7 1.3h12.5c4.1 0 7-.6 8.9-1.6s2.9-3 3.3-5.9 1.9-4.1 4.5-4.1a4.8 4.8 0 013.4 1.1 3.2 3.2 0 01.8 3.1c-.5 5.3-2.5 9.3-6 11.7s-8.4 3.7-14.9 3.7zm50.3 0a4.4 4.4 0 01-3.3-1 3.8 3.8 0 01-1.1-3v-57a4 4 0 011.1-3.1 6.1 6.1 0 016.6 0 3.9 3.9 0 011 3.1v57a3.7 3.7 0 01-1 3 4.4 4.4 0 01-3.3 1zm24.6 0a4.4 4.4 0 01-3.3-1 3.8 3.8 0 01-1.1-3v-57a4 4 0 011.1-3.1 6.1 6.1 0 016.6 0 4 4 0 011.1 3.1v57a3.8 3.8 0 01-1.1 3 4.4 4.4 0 01-3.3 1zm37.9 0q-8.8 0-13.8-3.3a14.7 14.7 0 01-6.3-10.2 3.7 3.7 0 011-3.2 4.4 4.4 0 013.3-1.1 4.6 4.6 0 013.2 1 4.9 4.9 0 011.4 3 6.1 6.1 0 003.3 4.5 19.3 19.3 0 007.9 1.3h15c4.5 0 7.5-.8 9.1-2.3s2.4-4.3 2.4-8.3-.8-7-2.5-8.5-4.6-2.3-9-2.3h-12.9c-6.6 0-11.4-1.5-14.6-4.4s-4.8-7.5-4.8-13.6 1.6-10.5 4.8-13.4 7.9-4.4 14.5-4.4h12.4c5.5 0 9.8 1.1 12.9 3.2a13.5 13.5 0 016 9.5 3.5 3.5 0 01-.8 3.2 4.9 4.9 0 01-3.5 1.1 4.5 4.5 0 01-3.1-1 5.4 5.4 0 01-1.3-3 5.6 5.6 0 00-3.2-3.8 18.4 18.4 0 00-7-1.1h-12.4q-6.3 0-8.4 2.1c-1.4 1.3-2.1 3.9-2.1 7.6s.7 6.4 2.2 7.8 4.2 2.1 8.4 2.1h12.9c6.8 0 11.9 1.6 15.2 4.6s5.1 7.9 5.1 14.3-1.7 11.1-5 14.1-8.4 4.5-15.3 4.5z" />
                            <path fill="url(#a)"
                              d="M144.8 64.4a4.6 4.6 0 00-4.5 3.3h-11.9V53.9h7.8a4.4 4.4 0 008.6-.9 4.3 4.3 0 00-4.3-4.3 4.5 4.5 0 00-4.2 3.1h-7.9v-13h11.9a4.8 4.8 0 104.5-6.3 4.7 4.7 0 00-4.5 3.4h-11.9v-12h7.9a4.2 4.2 0 004.2 3.3 4.3 4.3 0 100-8.6 4.5 4.5 0 00-4.2 3.1h-7.9v-8.2A13.4 13.4 0 00115.1 0H35.2a13.4 13.4 0 00-13.5 13.5v6.9h-7.1a4.4 4.4 0 00-4.2-3.3A4.5 4.5 0 006 21.4a4.4 4.4 0 004.3 4.4 4.4 4.4 0 004.2-3.3h7.2v13.1H9.3a4.6 4.6 0 00-4.5-3.4A4.7 4.7 0 000 37a4.8 4.8 0 004.8 4.8 4.6 4.6 0 004.5-3.3h12.4v13.7h-7.1a4.3 4.3 0 00-4.2-3.2A4.4 4.4 0 006 53.3a4.3 4.3 0 004.3 4.3 4.4 4.4 0 004.2-3.3h7.2v13.8H9.3a4.6 4.6 0 00-4.5-3.4 4.8 4.8 0 000 9.6A4.6 4.6 0 009.3 71h12.4v12.8h-7a4.3 4.3 0 00-4.2-3.2 4.4 4.4 0 00-4.4 4.3 4.3 4.3 0 004.3 4.3 4.4 4.4 0 004.3-3.3h7v7.3a13.4 13.4 0 0013.5 13.5h79.6a13.4 13.4 0 0013.5-13.5v-7.5h7.9a4.2 4.2 0 004.1 3.3 4.4 4.4 0 004.4-4.3 4.3 4.3 0 00-4.1-4.5 4.2 4.2 0 00-4.4 3.4h-7.9v-13h11.9a4.6 4.6 0 004.5 3.4 4.8 4.8 0 100-9.6zm-32.6 35.5H38a9.5 9.5 0 01-9.4-9.5v-74A9.5 9.5 0 0138 6.9h74.2a9.4 9.4 0 019.4 9.4v74a9.5 9.5 0 01-9.4 9.6zm-.9-91.1H38.8a8.2 8.2 0 00-8.2 8.1v73a8.2 8.2 0 008.2 8.1h72.5a8.1 8.1 0 008.1-8.1v-73a8.1 8.1 0 00-8.1-8.1zm5.6 80.2a6.7 6.7 0 01-6.7 6.7h-3v-4.4l-13.8-5v-1.5a2.8 2.8 0 001.8-2.7 3.2 3.2 0 00-3.1-2.9 2.9 2.9 0 00-2.9 2.9 3.3 3.3 0 001.8 2.7v3l13.6 5v2.8H76.5V84.9a3.2 3.2 0 001.9-2.8 3 3 0 00-6 0 3.1 3.1 0 001.7 2.7v10.9h-29v-2.8l13.7-5.3h.1v-2.8a3 3 0 001.7-2.7 2.9 2.9 0 00-2.9-2.9 2.9 2.9 0 00-3 2.8v.2a2.9 2.9 0 001.7 2.6v1.1l-13.7 5.3v4.5h-2.8a6.7 6.7 0 01-6.8-6.6V17.8a6.7 6.7 0 016.7-6.7h2.9V15l13.8 5v1.2a3.1 3.1 0 00-1.8 2.8 2.9 2.9 0 003.1 2.9 2.9 2.9 0 002.9-2.9 2.7 2.7 0 00-1.8-2.6v-2.9l-13.6-5v-2.4h29.2v10.1a3.2 3.2 0 00-1.9 2.8 2.9 2.9 0 002.9 2.9 2.9 2.9 0 003-2.8v-.2a2.9 2.9 0 00-1.7-2.6V11.1h27.9v2.2L91 18.6V22a3 3 0 001.2 5.7 3.2 3.2 0 003-3 3 3 0 00-1.6-2.7v-1.7l13.6-5.3v-3.9h3a6.7 6.7 0 016.7 6.7zm-62-36.3L63.1 41a2.7 2.7 0 00.6-1.7 2.6 2.6 0 00-.7-1.9 2 2 0 00-1.7-.9 2.5 2.5 0 00-1.7 1.1l-7.6 11-7.7-11a2 2 0 00-2.7-.8 1.3 1.3 0 00-.7.6 2.6 2.6 0 00-.7 1.9 2.7 2.7 0 00.6 1.7L49 52.7l-8.5 12.2a3 3 0 00-.6 1.8 2.6 2.6 0 00.7 1.9 2.1 2.1 0 001.7.8 2.3 2.3 0 001.7-1l8-11.6 8 11.6a2.1 2.1 0 001.7 1 2.3 2.3 0 001.7-.8 3.2 3.2 0 00.7-1.9 3 3 0 00-.6-1.8zm26.1 0L89.2 41a2.7 2.7 0 00.6-1.7 2.6 2.6 0 00-.7-1.9 2 2 0 00-1.7-.9 2.5 2.5 0 00-1.7 1.1l-7.6 11-7.7-11a2 2 0 00-2.7-.8 1.3 1.3 0 00-.7.6 2.6 2.6 0 00-.7 1.9 2.7 2.7 0 00.6 1.7l8.2 11.7-8.5 12.2a3 3 0 00-.6 1.8 2.6 2.6 0 00.7 1.9 2.1 2.1 0 001.7.8 2.3 2.3 0 001.7-1l8-11.6 8 11.6a2.1 2.1 0 001.7 1 2.3 2.3 0 001.7-.8 3.2 3.2 0 00.7-1.9 3 3 0 00-.6-1.8zm15.6-16.2a2.1 2.1 0 00-1.8.9 2.7 2.7 0 00-.7 2.1v26.9a3.4 3.4 0 00.7 2.2 2.5 2.5 0 001.8.8 2.7 2.7 0 001.9-.8 3.4 3.4 0 00.7-2.2V39.5a2.7 2.7 0 00-.7-2.1 2.5 2.5 0 00-1.9-.9zm11.1 0a2.5 2.5 0 00-1.9.9 3.9 3.9 0 00-.6 2.1v26.9a4.3 4.3 0 00.6 2.2 2.7 2.7 0 001.9.8 2.3 2.3 0 001.8-.8 3.4 3.4 0 00.7-2.2V39.5a2.7 2.7 0 00-.7-2.1 2.1 2.1 0 00-1.8-.9z" />
                          </svg>
                        </div>
                        <div class="content"
                          style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 550px; padding: 10px;text-align: center;">
                          <table class="main"
                            style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">
                            <tr>
                              <td class="wrapper"
                                style="font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 50px 40px;color: #363b3e;">
                                <table border="0" cellpadding="0" cellspacing="0"
                                  style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                                  <tr>
                                    <td style=" font-size: 14px; vertical-align: top;">
                                      <p
                                        style="font-size: 30px; font-weight: bold; margin: 0; Margin-bottom: 25px;">
                                        Confirma tu preinscripción al XVIII Postmaster</p>
                                      <p
                                        style="font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 35px;">
                                        Para confirmar tu preinscripción al XVII Postmaster, por favor presiona el boton de abajo.</p>
                                      <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary"
                                        style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;">
                                        <tbody>
                                          <tr>
                                            <td align="center"
                                              style="font-size: 14px; vertical-align: top; padding-bottom: 15px;">
                                              <table border="0" cellpadding="0" cellspacing="0"
                                                style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                                                <tbody>
                                                  <tr>
                                                    <td
                                                      style="font-size: 14px; vertical-align: top; background-color: #3f4ce7; border-radius: 5px; text-align: center;">
                                                      <a href="'.URL.'auth/register?email='.$_POST['email'].'&token='.$token.'" target="_blank"
                                                        style="display: inline-block; color: #ffffff; background-color: #3f4ce7; border: solid 1px #3f4ce7; border-radius: 2px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 15px 30px;border-color: #3f4ce7;">Confirmar
                                                        preinscripción</a>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                      <p
                                        style="font-size: 14px; font-weight: normal; margin: 20px 0;">
                                        Gracias por preinscribirte, nos vemos en el evento.</p>
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                          <div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%;">
                            <table border="0" cellpadding="0" cellspacing="0"
                              style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                              <tr>
                                <td class="content-block"
                                  style="vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                                  <span><a href="https://www.facebook.com/ciistacna"><svg class="social-icon"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#9ba0a3">
                                        <path
                                          d="M13.397,20.997v-8.196h2.765l0.411-3.209h-3.176V7.548c0-0.926,0.258-1.56,1.587-1.56h1.684V3.127 C15.849,3.039,15.025,2.997,14.201,3c-2.444,0-4.122,1.492-4.122,4.231v2.355H7.332v3.209h2.753v8.202H13.397z">
                                        </path>
                                      </svg></a></span>
                                  <span><a href="https://www.youtube.com/user/ciistacna"><svg class="social-icon"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#9ba0a3">
                                        <path
                                          d="M21.593,7.203c-0.23-0.858-0.905-1.535-1.762-1.766C18.265,5.007,12,5,12,5S5.736,4.993,4.169,5.404 c-0.84,0.229-1.534,0.921-1.766,1.778c-0.413,1.566-0.417,4.814-0.417,4.814s-0.004,3.264,0.406,4.814 c0.23,0.857,0.905,1.534,1.763,1.765c1.582,0.43,7.83,0.437,7.83,0.437s6.265,0.007,7.831-0.403c0.856-0.23,1.534-0.906,1.767-1.763 C21.997,15.281,22,12.034,22,12.034S22.02,8.769,21.593,7.203z M9.996,15.005l0.005-6l5.207,3.005L9.996,15.005z">
                                        </path>
                                      </svg></a></span>
                                  <span class="apple-link"
                                    style="color: #999999; font-size: 12px; text-align: center;display: block;margin-top: 7px;">Enviado
                                    por el
                                    XXII
                                    CIIS, <a href="'. BASEPATH .'"
                                      style="text-decoration: underline; color: #999999; font-size: 12px; text-align: center;">Visítanos</a></span>
                                  <br><span style="display: block;">© 2021 ESIS</span>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </table>
                </body>
                
                </html>';
                $usuario->token    = $token;

                if($usuario->one()){
                    json_output(json_build(200, null, "Correo ya registrado!"));
                }

                if(!$id = $usuario->add()){
                    json_output(json_build(400, null, "Hubo error al guardar el registro!"));
                }

                $mail = new PHPMailer();
                $mail->IsSMTP();
                
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'tls';
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 587;
                $mail->Username ='nain.acero24@gmail.com';
                $mail->Password = 'dmtcbkxzjxlvnnph';

                $mail->setFrom('nain.acero24@gmail.com', 'XXII CONGRESO INTERNACIONAL DE INFORMÁTICA Y SISTEMAS');
                // $mail->AddAddress('a_nacerom@unjbg.edu.pe');
                $mail->AddAddress($usuario->email);
                $mail->isHTML(true);
                $mail->Subject = 'Confirmacion de preinscripcion al XVIII Postmaster';
                $mail->Body    = $message;
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->Send();

                json_output(json_build(201, null, "Revise su correo Electrónico"));
            }catch(Exception $e){
                json_output(json_build(400, null, $e->getMessage()));
            }
        }

        function register(){
            try{
                $csrf = new Csrf();
                $usuario           = new usuarioModel();
                $usuario->token    = $_POST['token'];

                $valid = $csrf->validate($_POST['token'], true);
                if($valid) json_output(json_build(400, null, "Registro caducado!"));

                $data  = $usuario->token();
                if(!$data) json_output(json_build(400, null, "Token no encontrado!"));
                
                $usuario->id                = $data['id'];
                $usuario->name              = $_POST['name'];
                $usuario->type_document     = $_POST['tipo_doc'];
                $usuario->number_document   = $_POST['number'];

                if($usuario->update()){
                    json_output(json_build(200, null, "Usuario " . $usuario->name . " registrado!"));
                }

                json_output(json_build(400, "Ocurrio un Error!"));
            }catch(Exception $e){
                json_output(json_build(400, null, $e->getMessage()));
            }
        }

        function get_ponentes_postmaster(){
            try{
                $postmaster         = new postmasterModel();
                $list_postmaster    = $postmaster->all();
                json_output(json_build(201, $list_postmaster));

            }catch(Exception $e){
                json_output(json_build(400, null, $e->getMessage()));
            }
        }
    }