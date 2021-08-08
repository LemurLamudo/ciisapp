<?php

    class asistenciaModel extends Model{

        public $id;
        public $fecha;
        public $hora;
        public $user_id;
        public $ponencia_id;
        public $status;
        public $code;
        
        /**
         *
         * Model Asistencia
         * @return @List<Asistencia> @user
         */
        public function all(){
            $sql = 'SELECT * FROM asistencia WHERE user_id = :user_id';

            try{
                return ($rows = parent::query($sql, ['user_id' => $this->user_id])) ? $rows : false;
            } catch(Exception $e) {
                throw $e;
            }
        }

        public function asistencia(){
            $sql = 'INSERT INTO asistencia(fecha, hora, user_id, ponencia_id) 
            VALUES(:fecha, :hora, :user_id , :ponencia_id)';

            $data = [
                'fecha'           =>  $this->fecha,
                'hora'            =>  $this->hora,
                'user_id'         =>  $this->user_id,
                'ponencia_id'     =>  $this->ponencia_id
            ];

            try{
                return ($rows = parent::query($sql, $data)) ? $rows : false;
            } catch(Exception $e) {
                throw $e;
            }
        }
    }