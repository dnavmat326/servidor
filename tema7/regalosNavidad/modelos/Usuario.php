<?php
class Usuario
{
        private $idUsuario;
        private $nombre;
        private $email;
        private $password;



        public function __construct($nombre = "", $email = "", $password = "")
        {
                $this->nombre = $nombre;
                $this->email = $email;
                $this->password = $password;


        }



        /**
         * Get the value of idUsuario
         */
        public function getidUsuario()
        {
                return $this->idUsuario;
        }

        /**
         * Set the value of idUsuario
         *
         * @return  self
         */
        public function setidUsuario($idUsuario)
        {
                $this->idUsuario = $idUsuario;

                return $this;
        }

        /**
         * Get the value of nombre
         */
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        /**
         * Get the value of email
         */
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of password
         */
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }
}








?>