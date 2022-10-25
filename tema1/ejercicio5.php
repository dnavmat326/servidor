<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>
<div class="col-md-8 themed-grid-col">
    <div class="flex-shrink-0 p-3 bg-white">
        <?php
        /*5. Tenemos una variable $numero que tiene un número de 0 a 99. Mostrarlo escrito.
Por ejemplo, para 56 mostrar: cincuenta y seis.*/

        $numero = rand(0, 99);

        echo $numero . "<br>";


        $formatterES = new NumberFormatter("es", NumberFormatter::SPELLOUT);
        echo $formatterES->format($numero);

        ?>
    </div>
</div>
<?php
include_once("../pie.php");
?>