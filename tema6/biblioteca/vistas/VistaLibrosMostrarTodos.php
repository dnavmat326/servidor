<?php

    class VistaLibrosMostrarTodos {

        public static function render($libros) {

            include("./vistas/header.php");

            echo "<table class='table table-dark table-bordered text-center' style='font-size: 15px;align-items: center;' id='dataTable' width='100%' cellspacing='0'>";
            //Cabecera
            echo "<tr>";
            echo "<th> Isbn </th>";
            echo "<th> Titulo </th>";
            echo "<th> Subtitulo </th>";
            echo "<th> Descripcion </th>";
            echo "<th> Autor </th>";
            echo "<th> Editorial </th>";
            echo "<th> Categoria </th>";
            echo "<th> Imagen </th>";
            echo "<th> Ejemplares Total </th>";
            echo "<th> Ejemplares Disponibles </th>";

        
            echo "</tr>";
        
            //Contenido
            foreach ($libros as $libro) {
                echo '<tr>';
                echo '<td>' . $libro->getIsbn() . '</td>';
                echo '<td>' . $libro->getTitulo() . '</td>';
                echo '<td>' . $libro->getSubtitulo() . '</td>';
                echo '<td>' . $libro->getDescripcion() . '</td>';
                echo '<td>' . $libro->getAutor() . '</td>';
                echo '<td>' . $libro->getEditorial() . '</td>';
                echo '<td>' . $libro->getCategoria() . '</td>';
                echo '<td>' . $libro->getImagen() . '</td>';
                echo '<td>' . $libro->getEjemplaresTotales() . '</td>';
                echo '<td>' . $libro->getEjemplaresDisponibles() . '</td>';

                
        
            }
            echo "</table>";


            include("./vistas/footer.php");
        }

    }
?>