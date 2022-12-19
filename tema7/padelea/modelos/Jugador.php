<?php
class Jugador
{
        private $idJugador;
        private $email;
        private $password;
        private $nombre;
        private $apodo;
        private $nivel;
        private $edad;



        public function __construct($email = "", $password = "", $nombre = "", $apodo = "", $nivel = "", $edad = "")
        {
                $this->email = $email;
                $this->password = $password;
                $this->nombre = $nombre;
                $this->apodo = $apodo;
                $this->nivel = $nivel;
                $this->edad = $edad;

        }

        public function __toString()
        {
                return $this->nombre."(".$this->apodo.")-> Nivel ".$this->nivel;
        }


        /**
         * Get the value of idJugador
         */
        public function getIdJugador()
        {
                return $this->idJugador;
        }

        /**
         * Set the value of idJugador
         *
         * @return  self
         */
        public function setIdJugador($idJugador)
        {
                $this->idJugador = $idJugador;

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
         * Get the value of apodo
         */
        public function getApodo()
        {
                return $this->apodo;
        }

        /**
         * Set the value of apodo
         *
         * @return  self
         */
        public function setApodo($apodo)
        {
                $this->apodo = $apodo;

                return $this;
        }

        /**
         * Get the value of nivel
         */
        public function getNivel()
        {
                return $this->nivel;
        }

        /**
         * Set the value of nivel
         *
         * @return  self
         */
        public function setNivel($nivel)
        {
                $this->nivel = $nivel;

                return $this;
        }

        /**
         * Get the value of edad
         */
        public function getEdad()
        {
                return $this->edad;
        }

        /**
         * Set the value of edad
         *
         * @return  self
         */
        public function setEdad($edad)
        {
                $this->edad = $edad;

                return $this;
        }
}








?>