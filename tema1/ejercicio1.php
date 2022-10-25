<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>
<div class="col-md-8 themed-grid-col">
    <div class="flex-shrink-0 p-3 bg-white">
        <?php
        /*1. Partiendo de 2 variables $primera y $segunda con valores aleatorios, hacer una
        página PHP que calcule y muestre por pantalla:
        - la diferencia de $primera menos $segunda
        - la división de $primera entre $segunda
        Añade un comentario que explique la función de generar números aleatorios.*/

        $primera = rand();
        $segunda = rand();

        echo "Primer numero: " . $primera . "<br>";
        echo "Segundo numero: " . $segunda . "<br>";
        echo "Diferencia: " . $primera - $segunda . "<br>";
        echo "Division: " . $primera / $segunda . "<br>";


        ?>
    </div>
</div>
<?php
include_once("../pie.php");
?>