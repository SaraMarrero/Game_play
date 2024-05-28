<?php
    namespace Model;

    class Usuario extends ActiveRecords{
        protected static $tabla = 'usuario';
        protected static $columnasDB = ['dniUsuario', 'nombreUsuario', 'apellidosUsuario', 'emailUsuario', 'passwordUsuario', 'administrador'];

        public $dniUsuario;
        public $nombreUsuario;
        public $apellidosUsuario;
        public $emailUsuario;
        public $passwordUsuario;
        public $administrador;

        public function __construct($args = []) {
            $this->dniUsuario = $args['dniUsuario'] ?? null;
            $this->nombreUsuario = $args['nombreUsuario'] ?? '';
            $this->apellidosUsuario = $args['apellidosUsuario'] ?? '';
            $this->emailUsuario = $args['emailUsuario'] ?? '';

            // Verifica si se proporcionó una contraseña y si es un registro
            if(isset($args['passwordUsuario']) && isset($args['isRegister']) && $args['isRegister']){
                $this->passwordUsuario = password_hash($args['passwordUsuario'], PASSWORD_DEFAULT);
            } else {
                // No es un registro, simplemente asigna la contraseña proporcionada
                $this->passwordUsuario = $args['passwordUsuario'] ?? '';
            }

            $this->administrador = $args['administrador'] ?? 0;
        }

        // Valida el formulario de registrar un usuario
        public function validarRegister(){
            $letter = substr($this->dniUsuario, -1);
            $numbers = intval(substr($this->dniUsuario, 0, -1));

            // Valida el dni
            if(substr("TRWAGMYFPDXBNJZSQVHLCKE", $numbers % 23, 1) == $letter && strlen($letter) == 1 && strlen ($numbers) == 8 ){
                $dniValidado = true;
            } else{
                $dniValidado = false;
                self::$errores['dni'] = "El dni no es válido";
            }

            // Valida el nombre
            if(!empty($this->nombreUsuario) && !is_numeric($this->nombreUsuario) && !preg_match("/[0-9]/", $this->nombreUsuario)){
                $nombreValidado = true;
            } else{
                $nombreValidado = false;
                self::$errores['nombre'] = "El nombre no es válido";
            }

            // Valida los apellidos
            if(!empty($this->apellidosUsuario) && !is_numeric($this->apellidosUsuario) && !preg_match("/[0-9]/", $this->apellidosUsuario)){
                $apellidosValidado = true;
            } else{
                $apellidosValidado = false;
                self::$errores['apellidos'] = "Los apellidos no son válidos";
            }

            // Valida el email
            if(!empty($this->emailUsuario) && filter_var($this->emailUsuario, FILTER_VALIDATE_EMAIL)){
                $emailValidado = true;
            } else{
                $emailValidado = false;
                self::$errores['email'] = "El email no es válido";
            }

            // Valida la contraseña
            if(!empty($this->passwordUsuario)){
                $passwordValidado = true;
            } else{
                $passwordValidado = false;
                self::$errores['password'] = "La contraseña no es válida";
            }

            return self::$errores;
        }

        // Valida el formulario del login
        public function validarLogin(){

            // Valida el email
            if(!empty($this->emailUsuario) && filter_var($this->emailUsuario, FILTER_VALIDATE_EMAIL)){
                $emailValidado = true;
            } else{
                $emailValidado = false;
                self::$errores['email'] = "El email no es válido";
            }

            // Valida la contraseña
            if(!empty($this->passwordUsuario)){
                $passwordValidado = true;
            } else{
                $passwordValidado = false;
                self::$errores['password'] = "La contraseña no es válida";
            }

            return self::$errores;
        }
    }
?>