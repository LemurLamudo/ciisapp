<?php

    class usuarioModel extends Model{

        public $id;
        public $email;
        public $role;
        public $name;
        public $type_document;
        public $number_document;
        public $phone;
        public $photo;
        public $password;

        /**
         *
         * Model Usuario
         * @return @id
         */
        public function add(){
            $sql = 'INSERT INTO users(email,created_ad) VALUES(:email, :created_ad)';

            $user = [
                'email'     =>  $this->email,
                'created_ad'=>  $this->created_ad
            ];

            try{
                return ($this->id = parent::query($sql, $user)) ? $this->id : false;
            }catch(Exception $e){
                throw $e;
            }
        }
    }
