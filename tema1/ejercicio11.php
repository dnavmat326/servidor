<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>
<div class="col-md-8 themed-grid-col">
    <div class="flex-shrink-0 p-3 bg-white">
        <?php
        /*11. Crea un array 7x7 con valores numéricos aleatorios excepto las diagonales que
deben ser 1. A continuación muestra el array y después genera un vector que
contenga la suma de cada fila y otro con la suma de cada columna.*/

        $array = [];
        for ($i = 0; $i < 7; $i++) {
            for ($j = 0; $j < 7; $j++) {
                if ($i == $j) {
                    $array[$i][$j] = 1;
                } else {
                    $array[$i][$j] = rand(0, 9);
                }
            }
        }

        $sumarFila = [];
        for ($i = 0; $i < 7; $i++) {
            $sumarFila[$i] = array_sum($array[$i]);
        }
        print_r($sumarFila);
        echo "<br>";

        $sumarColumna = [];
        for ($j = 0; $j < 7; $j++) {
            $sumarColumna[$j] = array_sum(array_column($array, $j));
        }
        print_r($sumarColumna);
        echo "<br>";



        for ($i = 0; $i < 7; $i++) {
            for ($j = 0; $j < 7; $j++) {
                echo $array[$i][$j] . " ";
            }
            echo "<br>";
        }
        ?>
    </div>
</div>
<?php
include_once("../pie.php");
?>