<?php

    class ControladorLibro {


        public static function mostrarLibros() {
            //LLamar al modelo para obtener todos los libros en un array de Libro
            $libros = LibroBD::getLibros();

            //Llamar a una vista para pintar esos libros
            VistaLibrosMostrarTodos::render($libros);
        }

      


    }



?>