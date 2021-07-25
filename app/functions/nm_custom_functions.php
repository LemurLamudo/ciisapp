<?php

    function en_custom(){
        return 'en_custom FUNCTION';
    }

    function mensaje_email($email, $token){

        $message = '
            <html>
            <head>
                <meta name="viewport" content="width=device-width">
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <meta charset="ISO-8859-1">
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
                        <img src="cid:logo_ciis" width="140" heigth="42">
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
                                                    <a href="'.URL.'auth/register?email='.$email.'&token='.$token.'" target="_blank"
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
        return $message;
    }