<?php

    class VistaUsuariosMostrarTodos {

        public static function render($usuarios) {

            include("./vistas/header.php");

            echo "<table class='table table-dark table-bordered text-center' style='font-size: 15px;align-items: center;' id='dataTable' width='100%' cellspacing='0'>";
            //Cabecera
            echo "<tr>";
            echo "<th> Dni </th>";
            echo "<th> Nombre </th>";
            echo "<th> Apellidos </th>";
            echo "<th> Edad </th>";
            echo "<th> Direccion </th>";
            echo "<th> Poblacion </th>";
            echo "<th> Telefono </th>";
            echo "<th> Email </th>";


        
            echo "</tr>";
        
            //Contenido
            foreach ($usuarios as $usuario) {
                echo '<tr>';
                echo '<td>' . $usuario->getDni() . '</td>';
                echo '<td>' . $usuario->getNombre() . '</td>';
                echo '<td>' . $usuario->getApellidos() . '</td>';
                echo '<td>' . $usuario->getEdad() . '</td>';
                echo '<td>' . $usuario->getDireccion() . '</td>';
                echo '<td>' . $usuario->getPoblacion() . '</td>';
                echo '<td>' . $usuario->getTelefono() . '</td>';
                echo '<td>' . $usuario->getEmail() . '</td>';

        
        
            }
            echo "</table>";


            include("./vistas/footer.php");
        }

    }
?>