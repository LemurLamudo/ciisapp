<?php

    function to_object($array){
        return json_decode(json_encode($array));
    }

    function get_sitename(){
        return 'CIIS';
    }

    function now(){
        return date('Y-m-d H:i:s');
    }

    function validate_token(){
        $token = $_GET["token"];
        try{
            return Auth::Check(($token));
        } catch(Exception $e){
            Redirect(URL);
        }
    }

    function validate_token_admin(){
        $info = validate_token();

        if($info->data->role != "ROLE_ADMIN"){
            Redirect(URL);
        }
    }

    function Redirect($url, $permanent = false)
    {
        header('Location: ' . $url, true, $permanent ? 200 : 301);
        exit();
    }

    function json_output($json , $die = true)
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-type: application/json;charset=utf-8');

        if(is_array($json)){
            $json = json_encode($json);
        }

        echo $json;

        if($die){
            die;
        }

        return true;
    }

    function json_build($status = 200 , $data = null , $msg = ''){


        if(empty($msg) || $msg == ''){

            switch ($status) {
                case '200':
                    $msg = 'OK';
                    break;

                case '201':
                    $msg = 'Created';
                    break;

                case '400':
                    $msg = 'Invalid request';
                    break;

                case '403':
                    $msg = 'Access denied';
                    break;

                case '404':
                    $msg = 'Not found';
                    break;

                case '500':
                    $msg = 'Internal Server Error';
                    break;

                case '550':
                    $msg = 'Permission denied';
                    break;
                    
                default:
                    break;
            }
        }

        http_response_code($status);

        $json =
        [
            'status'    =>  $status,
            'error'     =>  false,
            'msg'       =>  $msg,
            'data'      =>  $data
        ];

        $error_codes = [400,403,404,405,500];

        if(in_array($status , $error_codes)){
            $json['error'] = true;
        }
        return json_encode($json);
    }

    function get_module($view,$data = [])
    {
        $file_to_include = MODULES.$view.'Module.php';
        $output = '';

        // Por si queremos trabajar con objeto
        $d = to_object($data);

        if(!is_file($file_to_include)){
            return false;
        }

        ob_start();
        require_once $file_to_include;
        $output = ob_get_clean();
        return $output;
    }

    function gen_uuid() {
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
            mt_rand( 0, 0xffff ),
            mt_rand( 0, 0x0fff ) | 0x4000,
            mt_rand( 0, 0x3fff ) | 0x8000,
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }

    