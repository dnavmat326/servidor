<?php
class Enlace
{
        private $idEnlace;
        private $nombre;
        private $link;
        private $precio;
        private $imagen;
        private $prioridad;
        private $idRegalo;



        public function __construct($nombre = "", $link = "", $precio = "", $imagen = "", $prioridad = "", $idRegalo = "")
        {
                $this->nombre = $nombre;
                $this->link = $link;
                $this->precio = $precio;
                $this->imagen = $imagen;
                $this->prioridad = $prioridad;
                $this->idRegalo = $idRegalo;

        }




        /**
         * Get the value of idEnlace
         */
        public function getIdEnlace()
        {
                return $this->idEnlace;
        }

        /**
         * Set the value of idEnlace
         *
         * @return  self
         */
        public function setIdEnlace($idEnlace)
        {
                $this->idEnlace = $idEnlace;

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
         * Get the value of link
         */
        public function getLink()
        {
                return $this->link;
        }

        /**
         * Set the value of link
         *
         * @return  self
         */
        public function setLink($link)
        {
                $this->link = $link;

                return $this;
        }

        /**
         * Get the value of precio
         */
        public function getPrecio()
        {
                return $this->precio;
        }

        /**
         * Set the value of precio
         *
         * @return  self
         */
        public function setPrecio($precio)
        {
                $this->precio = $precio;

                return $this;
        }

        /**
         * Get the value of imagen
         */
        public function getImagen()
        {
                return $this->imagen;
        }

        /**
         * Set the value of imagen
         *
         * @return  self
         */
        public function setImagen($imagen)
        {
                $this->imagen = $imagen;

                return $this;
        }

        /**
         * Get the value of prioridad
         */
        public function getPrioridad()
        {
                return $this->prioridad;
        }

        /**
         * Set the value of prioridad
         *
         * @return  self
         */
        public function setPrioridad($prioridad)
        {
                $this->prioridad = $prioridad;

                return $this;
        }

        /**
         * Get the value of idRegalo
         */
        public function getIdRegalo()
        {
                return $this->idRegalo;
        }

        /**
         * Set the value of idRegalo
         *
         * @return  self
         */
        public function setIdRegalo($idRegalo)
        {
                $this->idRegalo = $idRegalo;

                return $this;
        }
}








?>