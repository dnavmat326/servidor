<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>
<div class="col-md-8 themed-grid-col">
    <div class="flex-shrink-0 p-3 bg-white">
        <?php
        /*3. Tenemos el radio de un circulo almacenado en la variable $radio obtenida de
forma aleatoria, calcular y mostrar por pantalla el volumen de una esfera de ese
radio.*/

        $radio = rand(1, 5);

        echo (4 / 3) * pi() * pow($radio, 3);

        ?>
    </div>
</div>
<?php
include_once("../pie.php");
?>