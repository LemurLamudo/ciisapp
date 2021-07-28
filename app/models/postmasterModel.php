<?php

    class postmasterModel extends Model{

        public $id;
        public $name;
        public $subtitle;
        public $nationality;
        public $photo;
        public $description;
        public $social;

        /**
         *
         * Model Postmaster
         * @return @List<Postmaster>
         */
        public function all(){
            $sql = 'SELECT c.id, c.photo, c.name, p.anio, ps.name as name_pais , pc.nombre as name_tema
                FROM users as c 
                INNER JOIN ponente as p ON c.id = p.user_id 
                INNER JOIN paises as ps ON ps.id = p.pais_id 
                INNER JOIN ponencia as pc ON p.id = pc.ponente_id 
                WHERE c.role = "ROLE_PONENTE"';

            try{
                return ($rows = parent::query($sql)) ? $rows : false;
            } catch(Exception $e) {
                throw $e;
            }
        }
    }