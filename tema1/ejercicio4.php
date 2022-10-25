<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>
<div class="col-md-8 themed-grid-col">
    <div class="flex-shrink-0 p-3 bg-white">
        <?php
        /*4. Tenemos los coeficientes de una ecuación de 2º grado (ax2 + bx + c = 0) en tres
variables $a, $b y $c, muestra la ecuación y sus soluciones. Si no existen, debe
indicarse por pantalla*/

        $a = rand();
        $b = rand();
        $c = rand();

        $resultado1 = (-$b + sqrt(pow($b, 2) - 4 * $a * $c)) / (2 * $a);
        $resultado2 = (-$b - sqrt(pow($b, 2) - 4 * $a * $c)) / (2 * $a);

        if (is_nan($resultado1))
            echo "Resultado 1 no existe <br>";
        else  echo $resultado1 . "<br/>";

        if (is_nan($resultado2))
            echo "Resultado 2 no existe";
        else  echo $resultado2;

        ?>
    </div>
</div>
<?php
include_once("../pie.php");
?>