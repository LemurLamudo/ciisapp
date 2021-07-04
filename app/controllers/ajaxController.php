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
                $usuario           = new usuarioModel();
                $usuario->email    = $_POST['email'];

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

                $csrf = new Csrf();
                $mail->isHTML(true);
                $mail->Subject = 'Here is the subject';
                $mail->Body    = URL.'auth/register?token='.$csrf->get_token();
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->Send();

                json_output(json_build(201, null, "Revise su correo Electrónico"));

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