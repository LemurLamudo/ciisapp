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
        public $token;
        public $password;
        public $status;

        /**
         *
         * Model Usuario
         * @return @id
         */
        public function add(){
            $sql = 'INSERT INTO users(email, token) VALUES(:email, :token)';

            $user = [
                'email'     =>  $this->email,
                'token'     =>  $this->token,
            ];

            try{
                return ($this->id = parent::query($sql, $user)) ? $this->id : false;
            }catch(Exception $e){
                throw $e;
            }
        }

        /**
         *
         * Model Usuario
         * @return @id
         */
        public function add_complete(){
            $sql = 'INSERT INTO users(email, role, name, type_document, number_document, phone, photo) 
                    VALUES(:email, :role, :name , :type_document , :number_document , :phone, :photo)';

            $user = [
                'email'           =>  $this->email,
                'role'            =>  $this->role,
                'name'            =>  $this->name,
                'type_document'   =>  $this->type_document,
                'number_document' =>  $this->number_document,
                'phone'           =>  $this->phone,
                'photo'           =>  $this->photo
            ];

            try{
                return ($this->id = parent::query($sql, $user)) ? $this->id : false;
            }catch(Exception $e){
                throw $e;
            }
        }

        /**
         * Busca un Usuario
         * @return Usuario
         */
        public function one(){
            $sql = 'SELECT * FROM users WHERE email = :email LIMIT 1';

            try{
                return ($rows = parent::query($sql , ['email' => $this->email])) ? $rows[0] : false;
            } catch(Exception $e) {
                throw $e;
            }
        }

        /**
         * Busca un Token
         * @return Usuario
         */
        public function token(){
            $sql = 'SELECT * FROM users WHERE token = :token LIMIT 1';

            try{
                return ($rows = parent::query($sql , ['token' => $this->token])) ? $rows[0] : false;
            } catch(Exception $e) {
                throw $e;
            }
        }

        /**
         * Update User
         * @return Usuario
         */
        public function update(){

            $sql = 'UPDATE users SET name=:name, type_document=:type_document, number_document=:number_document WHERE id=:id';

            $data = [
                'id'                =>  $this->id,
                'name'              =>  $this->name,
                'type_document'     =>  $this->type_document,
                'number_document'   =>  $this->number_document
            ];
    
            try{
                return ($rows = parent::query($sql, $data)) ? $rows : false;
            } catch (Exception $e) {
                throw $e;
            }
        }

        /**
         * Update User
         * @return Usuario
         */
        public function signIn(){
            $sql = 'SELECT * FROM users WHERE email = :email and number_document = :number_document LIMIT 1';

            try{
                return ($rows = parent::query($sql , ['email' => $this->email, 'number_document' => $this->number_document])) ? $rows[0] : false;
            } catch(Exception $e) {
                throw $e;
            }
        }
    }
