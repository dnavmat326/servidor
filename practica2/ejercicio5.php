<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>
<div class="col-md-8 themed-grid-col">
    <div class="flex-shrink-0 p-3 bg-white">
        <?php
        /*5. Mejora el programa anterior de tal manera que el mensaje original lo divida primero
en un array de palabras considerando el espacio en blanco como separador
únicamente. A continuación, debe poner cada palabra del revés (hola ->aloh).
Seguidamente encriptará cada palabra usando la función del ejercicio anterior.
Finalmente devolverá un string con cada palabra encriptada añadiendo un espacio
en blanco entre cada palabra. El desencriptador hará lo contrario (y no digo más).
Muestra el programa funcionando encriptando y desencriptando.*/

        $mensaje = "hola que tal";
        $clave = 3;



        function encriptar($mensaje, $clave)
        {
            $array = str_split($mensaje, 1);

            for ($i = 0; $i < count($array); $i++) {
                $array[$i] = chr(ord($array[$i]) + $clave);
            }

            return implode($array);
        }


        function desencriptar($mensaje, $clave)
        {

            $array = str_split($mensaje, 1);

            for ($i = 0; $i < count($array); $i++) {
                $array[$i] = chr(ord($array[$i]) - $clave);
            }

            return implode($array);
        }
        $array = explode(" ", $mensaje);
        for ($i = 0; $i < count($array); $i++) {
            $array[$i] = strrev($array[$i]);
            $array[$i] = encriptar($array[$i], $clave);
        }
        $mensaje = implode(" ", $array);
        echo $mensaje . "<br>";

        $array = explode(" ", $mensaje);
        for ($i = 0; $i < count($array); $i++) {
            $array[$i] = strrev($array[$i]);
            $array[$i] = desencriptar($array[$i], $clave);
        }
        $mensaje = implode(" ", $array);
        echo $mensaje . "<br>";



        ?>
    </div>
</div>
<?php
include_once("../pie.php");
?>