<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>
<div class="col-md-8 themed-grid-col">
    <div class="flex-shrink-0 p-3 bg-white">
        <?php
        /*2. Tenemos dos cadenas $cadena1 con valor "hola a todo el mundo" y $cadena2 con
    valor "mi nombre es <nombre y apellidos del alumno/a>". Se pide:
    - $cadena3 contendrá el valor de la concatenación de $cadena1 y $cadena2,
    mostrar por pantalla el contenido de $cadena3
    - $cadena1 contendrá el resultado de la concatenación de sí misma con
    $cadena2, mostrar por pantalla el contenido de $cadena1*/



        $cadena1 = "hola a todo el mundo";
        $cadena2 = "mi nombre es Pepe";

        $cadena3 = $cadena1 . "&nbsp;" . $cadena2;

        echo $cadena3 . "<br>";

        $cadena1 = $cadena1 . "&nbsp;" . $cadena2;

        echo $cadena1;


        ?>
    </div>
</div>
<?php
include_once("../pie.php");
?>