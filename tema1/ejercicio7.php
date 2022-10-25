<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>
<div class="col-md-8 themed-grid-col">
    <div class="flex-shrink-0 p-3 bg-white">
        <?php
        /*7. Hacer una página PHP que para un array de 5 elementos muestre por pantalla la
tabla de multiplicar de dichos elementos (del 1 al 10) (for o while)*/
        $array = array(rand(1, 100), rand(1, 100), rand(1, 100), rand(1, 100), rand(1, 100));
        for ($i = 0; $i < count($array); $i++) {
            for ($j = 1; $j < 11; $j++) {
                echo $array[$i] . "*" . $j . "=" . $array[$i] * $j . "<br>";
            }
            echo "<br>";
        }
        ?>
    </div>
</div>
<?php
include_once("../pie.php");
?>