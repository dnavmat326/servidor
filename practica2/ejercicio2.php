<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>
<div class="col-md-8 themed-grid-col">
    <div class="flex-shrink-0 p-3 bg-white">
        <?php
        /*2. Crea una cadena llamada $direccionIp y asígnale una dirección ip como
        192.168.11.200. A continuación, separa en un array con cada dígito de la dirección
        ip, y muestra cada dígito por separado (usa una función php). Seguidamente
        reconstruye en una cadena la dirección ip, pero que en lugar de separar por puntos
        los dígitos aparezcan separados por dos puntos (:) y muéstralo.*/

        $direccionIp = "192.168.11.200";

        $simbolo = ".";

        $separado = explode($simbolo, $direccionIp);

        print_r($separado);

        $simbolo2 = ":";

        $junto = implode($simbolo2, $separado);

        echo "<br>" . $junto;


        ?>
    </div>
</div>
<?php
include_once("../pie.php");
?>