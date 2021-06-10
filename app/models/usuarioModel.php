<?php

    class usuarioModel extends Model{

        public $id;
        public $name;
        public $email;
        public $password;
        public $created_ad;

        /**
         *
         * Model Usuario
         * @return @id
         */

        public function add(){
            $sql = 'INSERT INTO users(name,email,password,created_ad) VALUES(:name,:email,:password,:created_ad)';

            $user =
            [
                'name'      =>  $this->name,
                'email'     =>  $this->email,
                'password'  =>  $this->password,
                'created_ad'=>  $this->created_ad
            ];

            try{
                return ($this->id = parent::query($sql, $user)) ? $this->id : false;
            }catch(Exception $e){
                throw $e;
            }
        }

        /**
        * Model Usuario
        *
        * @return bool
        */
        public function update()
        {
            $sql = 'UPDATE users SET name=:name, email=:email, password=:password, created_ad=:created_ad WHERE id=:id';
            $user =
            [
                'id'        =>  $this->id,
                'name'      =>  $this->name,
                'email'     =>  $this->email,
                'password'  =>  $this->password,
                'created_ad'=>  $this->created_ad
            ];

            try {
            return (parent::query($sql, $user)) ? true : false;
            } catch (Exception $e) {
            throw $e;
            }
        }
    }
