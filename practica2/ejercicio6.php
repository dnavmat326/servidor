<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

</html>
<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>
<div class="col-md-8 themed-grid-col">
    <div class="flex-shrink-0 p-3 bg-white">
        <?php
        /*6. Vamos a crear un programa que calcule el IVA de un carrito de la compra. El
        carrito será un array bidimensional asociativo de este tipo: (Puedes añadir más
        productos y más campos a tu elección)
        $carrito = array(
        array("id" => 1234, "nombre" => "PS4", "precio" => 349.95, "cant" => 2, "iva_r" => 0),
        array("id" => 1235, "nombre" => "iPhone XS", "precio" => 1249.95, "cant" => 1, "iva_r" => 0),
        array("id" => 1236, "nombre" => "Chocolate", "precio" => 9.95, "cant" => 5, "iva_r" => 1)
        )
        Deberéis crear una función llamada subtotal($linea_pedido) que calcule el precio de
        cada línea de pedido, multiplicando el precio por la cantidad y aplicando el iva
        correspondiente, si iva_r es 0 será del 21% y si iva_r es 1 será del 10%.
        Mostrar en una tabla HTML el carrito de la compra (nombre, precio, cantidad y
        subtotal). En la última fila aparecerá el total del pedido a pagar.
        Se tendrá en cuenta la visualización y el estilo del carrito de la compra resultante.*/
        $carrito = array(
            array("id" => 1234, "nombre" => "PS4", "precio" => 349.95, "cant" => 2, "iva_r" => 0),
            array("id" => 1235, "nombre" => "iPhone XS", "precio" => 1249.95, "cant" => 1, "iva_r" => 0),
            array("id" => 1236, "nombre" => "Chocolate", "precio" => 9.95, "cant" => 5, "iva_r" => 1),
            array("id" => 1237, "nombre" => "Botella", "precio" => 3.95, "cant" => 3, "iva_r" => 0)
        );

        function subtotal($linea)
        {

            $subtotal = $linea["precio"] * $linea["cant"];
            if ($linea["iva_r"] == 1) {
                $iva = $subtotal * 0.1;
                return $subtotal + $iva;
            }
            if ($linea["iva_r"] == 0) {
                $iva = $subtotal * 0.21;
                return $subtotal + $iva;
            }
        }

        echo "<table class='table table-dark table-bordered text-center'>";
        echo "<thead class='h4'>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Subtotal</th></thead>";
        $total = 0;
        foreach ($carrito as $linea) {
            echo "<tr>";
            echo "<td>" . $linea["nombre"] . "</td>";
            echo "<td>" . $linea["precio"] . "</td>";
            echo "<td>" . $linea["cant"] . "</td>";
            echo "<td>" . subtotal($linea) . "</td>";
            $total += subtotal($linea);
            echo "</tr>";
        }
        echo "<tr class='h5'>";
        echo "<td colspan=3>Total:</>";
        echo "<td>" . $total . "</>";
        echo "</tr>";
        echo "</table>";



        ?>
    </div>
</div>
<?php
include_once("../pie.php");
?>