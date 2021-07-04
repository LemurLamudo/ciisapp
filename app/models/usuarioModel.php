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
            $sql = 'INSERT INTO users(email) VALUES(:email)';

            $user = [
                'email'     =>  $this->email
            ];

            try{
                return ($this->id = parent::query($sql, $user)) ? $this->id : false;
            }catch(Exception $e){
                throw $e;
            }
        }

        /**
         * Busca un Usuario
         */
        public function one(){
            $sql = 'SELECT * FROM users WHERE email = :email LIMIT 1';

            try{
                return ($rows = parent::query($sql , ['email' => $this->email])) ? $rows[0] : false;
            } catch(Exception $e) {
                throw $e;
            }
        }
    }
