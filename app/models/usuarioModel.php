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

        public $entidad;
        public $nivel;
        public $especialidad;
        public $fecha_nacimiento;
        public $number;
        public $sugerencia;
        public $c_update;

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

        /**
         * Update User
         * @return List<Usuario>
         */
        public function all() {
            $sql = 'SELECT COUNT(asistencia.user_id) AS repetidos, name, email FROM asistencia INNER JOIN users ON users.id = asistencia.user_id GROUP BY asistencia.user_id';
            
            try{
                return ($rows = parent::query($sql, [])) ? $rows : false;
            } catch(Exception $e) {
                throw $e;
            }
        }

        /**
         * Update Usuario
         */
        public function update_user(){

            $sql = 'UPDATE users SET name=:name, entidad=:entidad, nivel=:nivel, especialidad=:especialidad, number=:number, sugerencia=:sugerencia, c_update=:c_update, fecha_nacimiento=:fecha_nacimiento, name=:name, email=:email  WHERE id=:id';

            $data = [
                'id'                =>  $this->id,
                'entidad'           =>  $this->entidad,
                'nivel'             =>  $this->nivel,
                'especialidad'      =>  $this->especialidad,
                'fecha_nacimiento'  =>  $this->fecha_nacimiento,
                'number'            =>  $this->number,
                'sugerencia'        =>  $this->sugerencia,
                'c_update'          =>  1,
                'email'             =>  $this->email,
                'name'              =>  $this->name
            ];
    
            try{
                return ($rows = parent::query($sql, $data)) ? $rows : false;
            } catch (Exception $e) {
                throw $e;
            }
        }
    }
