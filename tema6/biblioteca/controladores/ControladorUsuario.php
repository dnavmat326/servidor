<?php

    class ControladorUsuario {


        public static function mostrarUsuarios() {
            //LLamar al modelo para obtener todos los prestamos en un array de Prestamo
            $usuarios = UsuarioBD::getUsuarios();

            //Llamar a una vista para pintar esas películas
            VistaUsuariosMostrarTodos::render($usuarios);
        }

      


    }



?>