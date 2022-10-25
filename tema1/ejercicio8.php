<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>
<div class="col-md-8 themed-grid-col">
    <div class="flex-shrink-0 p-3 bg-white">
        <?php
        /*8. Crea un generador aleatorio de apuesta de la Lotería Primitiva. Cada vez que
recargues la página aparecerá una combinación diferente.*/
        $array = array(rand(1, 99), rand(1, 99), rand(1, 99), rand(1, 99), rand(1, 99), rand(1, 99), rand(1, 99), rand(1, 99));
        function pintar($array)
        {
            for ($i = 0; $i < count($array); $i++) {
                echo $array[$i] . " ";
            }
        }
        pintar($array);
        ?>
    </div>
</div>
<?php
include_once("../pie.php");
?>