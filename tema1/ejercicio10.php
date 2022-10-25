<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>
<div class="col-md-8 themed-grid-col">
    <div class="flex-shrink-0 p-3 bg-white">
        <?php
        /*10. Rellena un array de 10 números enteros, con los 10 primeros números naturales.
Calcula la media de los que están en posiciones pares y muestra los impares por
pantalla.*/
        $array = array();
        $contador = 0;
        $suma = 0;

        for ($i = 0; $i < 10; $i++) {
            $array[$i] = $i;
            if ($i % 2 != 0) {
                echo "Impar " . $array[$i] . "<br>";
            } else {
                $suma += $array[$i];
                $contador++;
            }
        }
        echo "Media Pares " . $suma / $contador;
        ?>
    </div>
</div>
<?php
include_once("../pie.php");
?>