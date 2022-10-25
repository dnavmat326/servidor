<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>
<div class="col-md-8 themed-grid-col">
    <div class="flex-shrink-0 p-3 bg-white">
        <?php
        /*12. Haz un diccionario de palabras español a inglés (20 palabras mínimo) con un array
asociativo. Haz un programa que dada una palabra compruebe si está en el
diccionario y si es así que muestre la traducción, y si no está que indique que no
está en el diccionario. A continuación, muestra el diccionario ordenador en
español */

        $diccionario = array(
            "uno" => "one", "dos" => "two", "tres" => "three", "cuatro" => "four", "cinco" => "five",
            "seis" => "six", "siete" => "seven", "ocho" => "eight", "nueve" => "nine", "diez" => "ten", "once" => "eleven",
            "doce" => "twelve", "trece" => "thirteen", "catorce" => "fourteen", "quince" => "fiveteen", "dieciseis" => "sixteen",
            "diecisiete" => "seventeen", "dieciocho" => "eighteen", "diecinueve" => "nineteen", "veinte" => "twenty"
        );

        $traducir = "quince";

        if (array_key_exists($traducir, $diccionario)) {
            echo $diccionario[$traducir];
        } else {
            echo "Palabra no encontrada";
        }
        ?>
    </div>
</div>
<?php
include_once("../pie.php");
?>