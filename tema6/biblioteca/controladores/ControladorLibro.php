<?php

    class ControladorLibro {


        public static function mostrarLibros() {
            //LLamar al modelo para obtener todos los prestamos en un array de Prestamo
            $libros = LibroBD::getLibros();

            //Llamar a una vista para pintar esas películas
            VistaLibrosMostrarTodos::render($libros);
        }

      


    }



?>