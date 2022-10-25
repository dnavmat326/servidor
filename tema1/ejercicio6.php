<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>
<div class="col-md-8 themed-grid-col">
    <div class="flex-shrink-0 p-3 bg-white">
        <?php
        /*6. Dado un DNI guardado en una variable $dni, obtener la letra y mostrar por
pantalla el DNI completo DNI-LETRA. El documento nacional de identidad DNI en
España consta de un numero de 8 cifras y de una letra. La letra del DNI se obtiene
a partir de los números como describen los pasos siguientes:
- Calcular el resto de dividir el número de DNI entre 23
- El número obtenido esta entre 0 y 22. Seleccionar una letra asociada a dicho
número en la siguiente tabla:
0 -> T, 1 -> R, 2 -> W, 3 -> A, 4 -> G, 5 -> M, 6 -> Y, 7 -> F, 8 -> P, 9 -> D, 10 -> X, 11 ->
B, 12 -> N, 13 -> J, 14 -> Z, 15 -> S, 16 -> Q, 17 -> V, 18 -> H, 19 -> L, 20 -> C, 21 -> K,
22 -> E*/

        $num = 11111111;

        $letra = $num % 23;

        switch ($letra) {
            case 0:
                echo $num . "T";
                break;
            case 1:
                echo $num . "R";
                break;
            case 2:
                echo $num . "W";
                break;
            case 3:
                echo $num . "A";
                break;
            case 4:
                echo $num . "G";
                break;
            case 5:
                echo $num . "M";
                break;
            case 6:
                echo $num . "Y";
                break;
            case 7:
                echo $num . "F";
                break;
            case 8:
                echo $num . "P";
                break;
            case 9:
                echo $num . "D";
                break;
            case 10:
                echo $num . "X";
                break;
            case 11:
                echo $num . "B";
                break;
            case 12:
                echo $num . "N";
                break;
            case 13:
                echo $num . "J";
                break;
            case 14:
                echo $num . "Z";
                break;
            case 15:
                echo $num . "S";
                break;
            case 16:
                echo $num . "Q";
                break;
            case 17:
                echo $num . "V";
                break;
            case 18:
                echo $num . "H";
                break;
            case 19:
                echo $num . "L";
                break;
            case 20:
                echo $num . "C";
                break;
            case 21:
                echo $num . "K";
                break;
            case 22:
                echo $num . "E";
                break;
        }
        ?>
    </div>
</div>
<?php
include_once("../pie.php");
?>