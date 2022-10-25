<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>
<div class="col-md-8 themed-grid-col">
    <div class="flex-shrink-0 p-3 bg-white">
        <?php
        /*1.1. Crea un array de nombres de clientes, que contengan nombre de la empresa de al
menos 5 clientes.
[“Cosentino”, “Garciden”, “Deretil”, “Makito”, “Globomatik”]
A continuación, crea una función llamada:
convierteClientes($nombres, $opcion)
donde el primer parámetro sea el array con los nombres de los clientes, y el
segundo parámetro pueden ser tres opciones:
- “L”: transforma todos los strings del array $nombres a minúsculas y lo
devuelve.
- “U”: transforma todos los strings del array $nombres a mayúsculas y lo
devuelve.
- “M”: transforma todos los strings del array $nombres de modo que la
primera letra de cada nombre de empresa sea mayúscula y el resto
minúscula. Lo devuelve.
Muestra un ejemplo de la función con cada una de las diferentes opciones.*/

        $nombres = array("cosentino", "garciden", "Deretil", "Makito", "globomatik");
        $opcion = "";
        function convierteClientes($nombres, $opcion)
        {
            if ($opcion == "L") {
                for ($i = 0; $i < count($nombres); $i++) {
                    $nombres[$i] = strtolower($nombres[$i]);
                }
                return $nombres;
            }
            if ($opcion == "U") {
                for ($i = 0; $i < count($nombres); $i++) {
                    $nombres[$i] = strtoupper($nombres[$i]);
                }
                return $nombres;
            }
            if ($opcion == "M") {
                for ($i = 0; $i < count($nombres); $i++) {
                    $nombres[$i] = ucwords($nombres[$i]);
                }
                return $nombres;
            }
        }

        $opcion = "L";
        print_r(convierteClientes($nombres, $opcion));
        echo "<br>";
        $opcion = "U";
        print_r(convierteClientes($nombres, $opcion));
        echo "<br>";
        $opcion = "M";
        print_r(convierteClientes($nombres, $opcion));
        echo "<br>";

        ?>
    </div>
</div>
<?php
include_once("../pie.php");
?>