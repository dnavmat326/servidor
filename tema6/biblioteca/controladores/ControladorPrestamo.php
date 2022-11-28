<?php

    class ControladorPrestamo {


        public static function mostrarPrestamos() {
            //LLamar al modelo para obtener todos los prestamos en un array de Prestamo
            $prestamos = PrestamoBD::getPrestamos();

            //Llamar a una vista para pintar esas películas
            VistaPrestamosMostrarTodos::render($prestamos);
        }

      


    }



?>