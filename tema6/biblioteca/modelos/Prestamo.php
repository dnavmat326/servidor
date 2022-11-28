<?php
    class Prestamo{
        private $idPrestamo;
        private $idLibro;
        private $idUsuario;
        private $fecha_inicio;
        private $fecha_fin;
        private $estado;


        public function __construct($idLibro="", $idUsuario="",$fecha_inicio="",$fecha_fin="",$estado="")
        {
            $this->idLibro = $idLibro;
            $this->idUsuario = $idUsuario;
            $this->fecha_inicio = $fecha_inicio;
            $this->fecha_fin = $fecha_fin;
            $this->estado = $estado;
        }

        /**
         * Get the value of idPrestamo
         */ 
        public function getIdPrestamo()
        {
                return $this->idPrestamo;
        }

        /**
         * Set the value of idPrestamo
         *
         * @return  self
         */ 
        public function setIdPrestamo($idPrestamo)
        {
                $this->idPrestamo = $idPrestamo;

                return $this;
        }

        /**
         * Get the value of idLibro
         */ 
        public function getIdLibro()
        {
                return $this->idLibro;
        }

        /**
         * Set the value of idLibro
         *
         * @return  self
         */ 
        public function setIdLibro($idLibro)
        {
                $this->idLibro = $idLibro;

                return $this;
        }

        /**
         * Get the value of idUsuario
         */ 
        public function getIdUsuario()
        {
                return $this->idUsuario;
        }

        /**
         * Set the value of idUsuario
         *
         * @return  self
         */ 
        public function setIdUsuario($idUsuario)
        {
                $this->idUsuario = $idUsuario;

                return $this;
        }

        /**
         * Get the value of fecha_inicio
         */ 
        public function getFecha_inicio()
        {
                return $this->fecha_inicio;
        }

        /**
         * Set the value of fecha_inicio
         *
         * @return  self
         */ 
        public function setFecha_inicio($fecha_inicio)
        {
                $this->fecha_inicio = $fecha_inicio;

                return $this;
        }

        /**
         * Get the value of fecha_fin
         */ 
        public function getFecha_fin()
        {
                return $this->fecha_fin;
        }

        /**
         * Set the value of fecha_fin
         *
         * @return  self
         */ 
        public function setFecha_fin($fecha_fin)
        {
                $this->fecha_fin = $fecha_fin;

                return $this;
        }

        /**
         * Get the value of estado
         */ 
        public function getEstado()
        {
                return $this->estado;
        }

        /**
         * Set the value of estado
         *
         * @return  self
         */ 
        public function setEstado($estado)
        {
                $this->estado = $estado;

                return $this;
        }
    }








?>