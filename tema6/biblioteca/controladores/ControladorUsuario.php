<?php

    class ControladorUsuario {


        public static function mostrarUsuarios() {
            //LLamar al modelo para obtener todos los usuarios en un array de Usuario
            $usuarios = UsuarioBD::getUsuarios();

            //Llamar a una vista para pintar esos usuarios
            VistaUsuariosMostrarTodos::render($usuarios);
        }

      


    }



?>