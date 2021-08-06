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
                $usuario->token    = $token;
                
                $message =  mensaje_email($usuario->email, $token);

                if($usuario->one()){
                    json_output(json_build(400, null, "Correo ya registrado!"));
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
                $mail->CharSet = "UTF-8";
                $mail->Username ='nain.acero24@gmail.com';
                $mail->Password = 'dmtcbkxzjxlvnnph';

                $mail->setFrom('nain.acero24@gmail.com', 'XXII CONGRESO INTERNACIONAL DE INFORMÁTICA Y SISTEMAS');
                // $mail->AddAddress('a_nacerom@unjbg.edu.pe');
                $mail->AddAddress($usuario->email);
                $mail->isHTML(true);
                $mail->Subject = 'Confirmacion de preinscripcion al XVIII Postmaster';
                $mail->AddEmbeddedImage(IMAGES.'logo.png', 'logo_ciis');
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

                $valid = $csrf->validate($_POST['token'], false);
                if(!$valid) json_output(json_build(400, null, "Registro caducado!"));

                $data  = $usuario->token();
                if(!$data) json_output(json_build(400, null, "Token no encontrado!"));

                $usuario->id                = $data['id'];
                $usuario->name              = $_POST['name'];
                $usuario->type_document     = $_POST['tipo_doc'];
                $usuario->number_document   = $_POST['number'];

                if($info = $usuario->update()){
                  $data =  Auth::SignIn($info);
                  json_output(json_build(200, $data, "Usuario " . $usuario->name . " registrado!"));
                }

                json_output(json_build(400, null, "Ocurrio un Error!"));
            }catch(Exception $e){
                json_output(json_build(400, null, $e->getMessage()));
            }
        }

        function login(){
          try{

            $csrf = new Csrf();

            $usuario           = new usuarioModel();
            $usuario->email    = $_POST['email'];
            $usuario->number_document   = $_POST['number'];
            $usuario->token    = $_POST['token'];

            $valid = $csrf->validate($_POST['token'], false);
            if(!$valid) json_output(json_build(400, null, "Registro no válido!"));

            if($info = $usuario->signIn()){
              $data =  Auth::SignIn($info);
              json_output(json_build(200, $data, "Usuario " . $usuario->name . " inicio sesión!"));
            }
            
            json_output(json_build(400, null,"Credenciales Incorrectas!"));
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

        function get_all_paises(){
          try{
              $pais      = new paisModel();
              $paises    = $pais->all();
              json_output(json_build(201, $paises, 'Listado de Paises'));

          }catch(Exception $e){
              json_output(json_build(400, null, $e->getMessage()));
          }
        }
    }