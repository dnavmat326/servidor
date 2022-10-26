<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>
<div class="col-md-8 themed-grid-col">
    <div class="flex-shrink-0 p-3 bg-white">
        <?php
        /*3. Crear un array llamado $word_list_en con 50 palabras en inglés. Crea otro array
        llamado $word_list_es con las mismas 50 palabras en el mismo orden, pero en
        español. El ejercicio consiste en hacer un traductor literal de español a inglés o
        viceversa, debe recorrer una cadena de texto y devolverla en el idioma traduciendo
        una por una las palabras (se supone que están en la misma posición en los
        arrays).*/

        $word_list_en = array(
            "one", "two", "three", "four", "five", "six", "seven", "eight", "nine",
            "ten"
        );
        $word_list_es = array(
            "uno", "dos", "tres", "cuatro", "cinco", "seis", "siete", "ocho", "nueve",
            "diez"
        );

        $palabra = "cuatro";


        if (in_array($palabra, $word_list_en)) {
            echo $word_list_es[array_search($palabra, $word_list_en)];
        }
        if (in_array($palabra, $word_list_es)) {
            echo $word_list_en[array_search($palabra, $word_list_es)];
        }

        ?>
    </div>
</div>
<?php
include_once("../pie.php");
?>