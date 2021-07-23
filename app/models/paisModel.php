<?php

    class paisModel extends Model{

        public $id;
        public $name;
        public $descripcion;
        public $imagen;
        public $status;

        /**
         * All Pais
         * @return Pais
         */
        public function all(){
            $sql = 'SELECT * FROM paises WHERE status = :status';

            try{
                return ($rows = parent::query($sql , ['status' => 1])) ? $rows : false;
            } catch(Exception $e) {
                throw $e;
            }
        }
    }