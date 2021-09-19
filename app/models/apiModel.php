<?php

    class apiModel extends Model{

        /**
         * By Developer Nain Acero
         * WEB SERVICE V1 PHP
         */

        public $id;

        public function ApiCreate($json){
            try {

                $_petitions = (array) $json->_petitions;
                $_create_rows = "";
                $_values = "";

                if(count($_petitions) > 0){

                    foreach($_petitions as $item){
                        $_create_rows = $_create_rows . $item->name . ',';

                        if($item->type != "string"){
                            $_values = $_values . $item->value . ',';
                        }else {
                            $_values = $_values . "'" . $item->value . "'" . ',';
                        }
                    }

                    if($_petitions > 1) $_create_rows = substr($_create_rows, 0, -1);
                    if($_petitions > 1) $_values = substr($_values, 0, -1);

                    $_query = "INSERT INTO $json->_table ($_create_rows) VALUES ($_values);";

                    ($this->id = parent::query($_query, [])) ? $this->id : false;
                    
                    json_output(json_build(200, $this->ClientResponse(["_id" => $this->id], [] ,200), "Query Builder!"));
                }else {
                    json_output(json_build(401, $this->ClientResponse([], [["mensaje" => "Incluir parametros."]] ,500), "Query Builder!"));
                }

            } catch (\Error $e) {
                json_output(json_build(500, $this->ClientResponse([], [["mensaje" => $e->getMessage()]] ,500), "Query Builder!"));
            } catch (\Exception $e) {
                json_output(json_build(500, $this->ClientResponse([], [["mensaje" => $e->getMessage()]] ,500), "Query Builder!"));
            }
        }

        public function ApiUpdate($json, $id){
            try {
                $_petitions = (array) $json->_petitions;
                $_update_rows = "";
    
                if(count($_petitions) > 0){
    
                    foreach($_petitions as $item){
    
                        if($item->type != "string"){
                            $_update_rows = $_update_rows . $item->name . '='. $item->value . ',';
                        }else {
                            $_update_rows = $_update_rows . $item->name . '='. "'" . $item->value . "'" . ',';
                        }
                    }
    
                    if($_petitions > 1) $_update_rows = substr($_update_rows, 0, -1);
    
                    $query = "UPDATE $json->_table SET $_update_rows WHERE id = $id;"; 

                    $_status = ($rows = parent::query($query, [])) ? $rows : false;

                    json_output(json_build(200, $this->ClientResponse(["_status" => $_status], [] ,200), "Query Builder!"));
                }else {
                    json_output(json_build(401, $this->ClientResponse([], [["mensaje" => "Incluir parametros."]] ,500), "Query Builder!"));
                }
            } catch (\Error $e) {
                json_output(json_build(500, $this->ClientResponse([], [["mensaje" => $e->getMessage()]] ,500), "Query Builder!"));
            } catch (\Exception $e) {
                json_output(json_build(500, $this->ClientResponse([], [["mensaje" => $e->getMessage()]] ,500), "Query Builder!"));
            }
        }

        public function Apiquery($json){
            try {

                $_petitions = (array) $json->_petitions;
                $_query = "";

                if(count($_petitions) > 0){

                    foreach($_petitions as $item){
                        if($item->name == "_script"){
                            $_query = "SELECT * FROM query WHERE nombre = '$item->value' LIMIT 1";
                            $_query = ($rows = parent::query($_query , ["'$item->name'" => "'$item->value'"])) ? $rows[0]["consulta"] : "";
                        }else {
    
                            if($item->type != "string"){
                                $_query = str_replace($item->name, $item->value, $_query);
                            }else {
                                $_query = str_replace($item->name, "'$item->value'", $_query);
                            }
                        }
                    }

                    $_result = ($rows = parent::query($_query , [])) ? $rows : "";

                    json_output(json_build(200, $this->ClientResponse($_result, [] ,200), "Query Builder!"));
                }else {
                    json_output(json_build(401, $this->ClientResponse([], [["mensaje" => "Incluir parametros."]] ,500), "Query Builder!"));
                }

            } catch (\Error $e) {
                json_output(json_build(500, $this->ClientResponse([], [["mensaje" => $e->getMessage()]] ,500), "Query Builder!"));
            } catch (\Exception $e) {
                json_output(json_build(500, $this->ClientResponse([], [["mensaje" => $e->getMessage()]] ,500), "Query Builder!"));
            }
        }

        public function ClientResponse($data, $errores = [] ,$status = 200, $message = ""){
            $response = array(
                'connectTo'         => 'SRVSQL',
                'connectToLogin'    => 'S',
                '_status'           => $status,
                '_messages'         => array(
                    'success'       => $message
                ),
                '_errores'          => $errores,
                '_data'             => $data
            );
    
            return $response;
        }
    }