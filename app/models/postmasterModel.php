<?php

    class postmasterModel extends Model{

        public $id;
        public $name;
        public $subtitle;
        public $nationality;
        public $photo;
        public $description;
        public $social;
        public $asistencia;

        /**
         *
         * Model Postmaster
         * @return @List<Postmaster>
         */
        public function all(){
            
            $sql = 'SELECT c.id, c.photo, c.name, p.anio, ps.name as name_pais , pc.nombre as name_tema, pc.status as status_ponencia, pc.id as ponencia_id, pc.asistencia, pc.hora_ini, pc.hora_fin
                FROM users as c 
                INNER JOIN ponente as p ON c.id = p.user_id 
                INNER JOIN paises as ps ON ps.id = p.pais_id 
                INNER JOIN ponencia as pc ON p.id = pc.ponente_id 
                WHERE c.role = "ROLE_PONENTE"
                ORDER BY ponencia.hora_ini';

            try{
                return ($rows = parent::query($sql)) ? $rows : false;
            } catch(Exception $e) {
                throw $e;
            }
        }

        /**
         * Busca un Usuario
         * @return ponencia
         */
        public function one(){
            $sql = 'SELECT * FROM ponencia WHERE id = :id AND asistencia = 1 AND code = :code LIMIT 1';
            
            $data = [
                'code'   =>  $this->code,
                'id'     =>  $this->id
            ];

            try{
                return ($rows = parent::query($sql ,$data)) ? $rows[0] : false;
            } catch(Exception $e) {
                throw $e;
            }
        }
    }