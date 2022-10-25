<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>
<div class="col-md-8 themed-grid-col">
    <div class="flex-shrink-0 p-3 bg-white">
        <?php
        /*14. Crea un array de notas de alumnos. Cada elemento del array debe contener las
notas de un alumno, incluyendo nombre, materia y nota. Haz un programa con 10
notas de alumnos. Luego debes mostrar las notas ordenadas en orden
descendente por alumno, luego ordenadas por nombre, luego mostrar la nota
media del curso, y el número de alumnos suspensos.*/

        $notas = array(
            array("nombre" => "Pepe", "materia" => "Servidor", "nota" => 9),
            array("nombre" => "Pepe", "materia" => "Cliente", "nota" => 4),
            array("nombre" => "Luis", "materia" => "Servidor", "nota" => 3),
            array("nombre" => "Luis", "materia" => "Cliente", "nota" => 2),
            array("nombre" => "Pedro", "materia" => "Servidor", "nota" => 8),
            array("nombre" => "Pedro", "materia" => "Cliente", "nota" => 3),
            array("nombre" => "Jose", "materia" => "Servidor", "nota" => 6),
            array("nombre" => "Jose", "materia" => "Cliente", "nota" => 4),
            array("nombre" => "Ana", "materia" => "Servidor", "nota" => 8),
            array("nombre" => "Ana", "materia" => "Cliente", "nota" => 9),
        );


        array_multisort(array_column($notas, "nombre"), SORT_DESC, array_column($notas, "nota"), $notas);

        foreach ($notas as $valor) {
            echo $valor["nombre"] . " " . $valor["materia"] . " " . $valor["nota"] . "<br>";
        }

        echo "<br>Nota media " . array_sum(array_column($notas, "nota")) / count($notas) . "<br>";

        function suspensos($nota)
        {
            return $nota < 5;
        }
        echo "Suspensos " . count(array_filter(array_column($notas, "nota"), "suspensos"));
        ?>
    </div>
</div>
<?php
include_once("../pie.php");
?>