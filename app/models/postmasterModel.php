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
            $sql = 'SELECT * FROM postmaster';

            try{
                return ($rows = parent::query($sql)) ? $rows : false;
            } catch(Exception $e) {
                throw $e;
            }
        }
    }