<?php

class VistaJuego
{


    public static function renderPartida()
    {

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlackJack</title>
    <link rel="shortcut icon" href="./img/poker.gif" type="image/x-icon">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Exo:400,700');

        * {
            margin: 0px;
            padding: 0px;
        }

        body {
            font-family: 'Exo', sans-serif;
        }


        .area {
            background: #2E2E2E;
            background: -webkit-linear-gradient(to left, #8f94fb, #4e54c8);
            width: 100%;
            height: 100vh;


        }

        .circles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .circles li {
            position: absolute;
            display: block;
            list-style: none;
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.2);
            animation: animate 25s linear infinite;
            bottom: -150px;

        }

        .circles li:nth-child(1) {
            left: 25%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
        }


        .circles li:nth-child(2) {
            left: 10%;
            width: 20px;
            height: 20px;
            animation-delay: 2s;
            animation-duration: 12s;
        }

        .circles li:nth-child(3) {
            left: 70%;
            width: 20px;
            height: 20px;
            animation-delay: 4s;
        }

        .circles li:nth-child(4) {
            left: 40%;
            width: 60px;
            height: 60px;
            animation-delay: 0s;
            animation-duration: 18s;
        }

        .circles li:nth-child(5) {
            left: 65%;
            width: 20px;
            height: 20px;
            animation-delay: 0s;
        }

        .circles li:nth-child(6) {
            left: 75%;
            width: 110px;
            height: 110px;
            animation-delay: 3s;
        }

        .circles li:nth-child(7) {
            left: 35%;
            width: 150px;
            height: 150px;
            animation-delay: 7s;
        }

        .circles li:nth-child(8) {
            left: 50%;
            width: 25px;
            height: 25px;
            animation-delay: 15s;
            animation-duration: 45s;
        }

        .circles li:nth-child(9) {
            left: 20%;
            width: 15px;
            height: 15px;
            animation-delay: 2s;
            animation-duration: 35s;
        }

        .circles li:nth-child(10) {
            left: 85%;
            width: 150px;
            height: 150px;
            animation-delay: 0s;
            animation-duration: 11s;
        }


        @keyframes animate {

            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
                border-radius: 0;
            }

            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
                border-radius: 50%;
            }

        }
    </style>
</head>

<body>
    <div class="area text-white circles">


        <div class="row">
            <div class="col-3 me-5">



                <iframe class="mb-2" src="https://giphy.com/embed/UulUogL7W22KFNbJKl" frameborder="0"></iframe>
                <form action="./enrutador.php" method="get">
                    <input class="border border-white btn btn-dark btn-lg mb-5 ms-5" type="submit" name="nuevaPartida"
                        id="nuevaPartida" value="Nueva Partida">
                </form>
                <form action="./enrutador.php" method="get">
                    <input class="border border-white btn btn-dark btn-lg mb-5 ms-5" type="submit" name="plantarse"
                        id="plantarse" value="Plantarse">
                </form>
                <form action="./enrutador.php" method="get">
                    <input class="border border-white btn btn-dark btn-lg mb-5 ms-5" type="submit" name="pedir"
                        id="pedir" value="Pedir">
                </form>
                <?php $r = $_SESSION['resultado'];
        echo "<h2 class='border border-white btn btn-dark btn-lg p-3 ms-5 mt-5' style='
        font-size: 30px;
    '>Resultado actual: <br>" . $r . "</h2>"; ?>
            </div>
            <div class="col-5 me-5">

                <?php
        $partida = unserialize($_SESSION['partida']);
        $jugador = $partida->getJugador();
        $maquina = $partida->getMaquina();
        $ruta = "./img/";

        $carta = $maquina->getMano()[count($maquina->getMano()) - 1];
        if ($carta->getPalo() == "corazones") {
            switch ($carta->getFigura()) {
                case "as":
                    $ruta .= "asCorazones.png";
                    break;
                case 2:
                    $ruta .= "dosCorazones.png";
                    break;
                case 3:
                    $ruta .= "tresCorazones.png";
                    break;
                case 4:
                    $ruta .= "cuatroCorazones.png";
                    break;
                case 5:
                    $ruta .= "cincoCorazones.png";
                    break;
                case 6:
                    $ruta .= "seisCorazones.png";
                    break;
                case 7:
                    $ruta .= "sieteCorazones.png";
                    break;
                case 8:
                    $ruta .= "ochoCorazones.png";
                    break;
                case 9:
                    $ruta .= "nueveCorazones.png";
                    break;
                case "jota":
                    $ruta .= "jotaCorazones.png";
                    break;
                case "reina":
                    $ruta .= "reinaCorazones.png";
                    break;
                case "rey":
                    $ruta .= "reyCorazones.png";
                    break;

            }
        }
        if ($carta->getPalo() == "diamantes") {
            switch ($carta->getFigura()) {
                case "as":
                    $ruta .= "asDiamantes.png";
                    break;
                case 2:
                    $ruta .= "dosDiamantes.png";
                    break;
                case 3:
                    $ruta .= "tresDiamantes.png";
                    break;
                case 4:
                    $ruta .= "cuatroDiamantes.png";
                    break;
                case 5:
                    $ruta .= "cincoDiamantes.png";
                    break;
                case 6:
                    $ruta .= "seisDiamantes.png";
                    break;
                case 7:
                    $ruta .= "sieteDiamantes.png";
                    break;
                case 8:
                    $ruta .= "ochoDiamantes.png";
                    break;
                case 9:
                    $ruta .= "nueveDiamantes.png";
                    break;
                case "jota":
                    $ruta .= "jotaDiamantes.png";
                    break;
                case "reina":
                    $ruta .= "reinaDiamantes.png";
                    break;
                case "rey":
                    $ruta .= "reyDiamantes.png";
                    break;

            }
        }
        if ($carta->getPalo() == "picas") {
            switch ($carta->getFigura()) {
                case "as":
                    $ruta .= "asPicas.png";
                    break;
                case 2:
                    $ruta .= "dosPicas.png";
                    break;
                case 3:
                    $ruta .= "tresPicas.png";
                    break;
                case 4:
                    $ruta .= "cuatroPicas.png";
                    break;
                case 5:
                    $ruta .= "cincoPicas.png";
                    break;
                case 6:
                    $ruta .= "seisPicas.png";
                    break;
                case 7:
                    $ruta .= "sietePicas.png";
                    break;
                case 8:
                    $ruta .= "ochoPicas.png";
                    break;
                case 9:
                    $ruta .= "nuevePicas.png";
                    break;
                case "jota":
                    $ruta .= "jotaPicas.png";
                    break;
                case "reina":
                    $ruta .= "reinaPicas.png";
                    break;
                case "rey":
                    $ruta .= "reyPicas.png";
                    break;

            }
        }
        if ($carta->getPalo() == "treboles") {
            switch ($carta->getFigura()) {
                case "as":
                    $ruta .= "asTreboles.png";
                    break;
                case 2:
                    $ruta .= "dosTreboles.png";
                    break;
                case 3:
                    $ruta .= "tresTreboles.png";
                    break;
                case 4:
                    $ruta .= "cuatroTreboles.png";
                    break;
                case 5:
                    $ruta .= "cincoTreboles.png";
                    break;
                case 6:
                    $ruta .= "seisTreboles.png";
                    break;
                case 7:
                    $ruta .= "sieteTreboles.png";
                    break;
                case 8:
                    $ruta .= "ochoTreboles.png";
                    break;
                case 9:
                    $ruta .= "nueveTreboles.png";
                    break;
                case "jota":
                    $ruta .= "jotaTreboles.png";
                    break;
                case "reina":
                    $ruta .= "reinaTreboles.png";
                    break;
                case "rey":
                    $ruta .= "reyTreboles.png";
                    break;

            }
        }


        echo "<br>";
        echo "<h1 class='h1 text-center'>Crupier</h1>";
        switch ($partida->getEstadoM()) {
            case "jugando":
                echo "<div class='row d-flex justify-content-center align-items-center m-5'><div class='col d-flex justify-content-end align-items-center'>";
                echo "<img src='" . $ruta . "' alt='' class='img w-75'></div><div class='col d-flex justify-content-start align-items-center'>";
                echo "<h2 class=''>Puntuación " . $_SESSION['contadorMaquina'] . "/21</h2></div></div>";
                break;
            case "plantado":
                echo "<div class='row d-flex justify-content-center align-items-center m-5'><div class='col d-flex justify-content-end align-items-center'>";
                echo "<img src='" . $ruta . "' alt='' class='img w-75'></div><div class='col d-flex justify-content-start align-items-center'>";
                echo "<h2 class=''>Puntuación " . $_SESSION['contadorMaquina'] . "/21</h2></div></div>";
                break;
            case "ganado":
                echo "<div class='row d-flex justify-content-center align-items-center m-5'><div class='col d-flex justify-content-end align-items-center'>";
                echo "<img src='" . $ruta . "' alt='' class='img w-75'></div><div class='col d-flex justify-content-start align-items-center'>";
                echo "<h2 class=''>Puntuación " . $_SESSION['contadorMaquina'] . "/21</h2></div></div>";
                break;
            case "perdido":
                echo "<div class='row d-flex justify-content-center align-items-center m-5'><div class='col d-flex justify-content-end align-items-center'>";
                echo "<img src='" . $ruta . "' alt='' class='img w-75'></div><div class='col d-flex justify-content-start align-items-center'>";
                echo "<h2 class=''>Puntuación " . $_SESSION['contadorMaquina'] . "/21</h2></div></div>";
                break;

        }



        echo "<br>";
        $carta = $jugador->getMano()[count($jugador->getMano()) - 1];
        $ruta = "./img/";

        if ($carta->getPalo() == "corazones") {
            switch ($carta->getFigura()) {
                case "as":
                    $ruta .= "asCorazones.png";
                    break;
                case 2:
                    $ruta .= "dosCorazones.png";
                    break;
                case 3:
                    $ruta .= "tresCorazones.png";
                    break;
                case 4:
                    $ruta .= "cuatroCorazones.png";
                    break;
                case 5:
                    $ruta .= "cincoCorazones.png";
                    break;
                case 6:
                    $ruta .= "seisCorazones.png";
                    break;
                case 7:
                    $ruta .= "sieteCorazones.png";
                    break;
                case 8:
                    $ruta .= "ochoCorazones.png";
                    break;
                case 9:
                    $ruta .= "nueveCorazones.png";
                    break;
                case "jota":
                    $ruta .= "jotaCorazones.png";
                    break;
                case "reina":
                    $ruta .= "reinaCorazones.png";
                    break;
                case "rey":
                    $ruta .= "reyCorazones.png";
                    break;

            }
        }
        if ($carta->getPalo() == "diamantes") {
            switch ($carta->getFigura()) {
                case "as":
                    $ruta .= "asDiamantes.png";
                    break;
                case 2:
                    $ruta .= "dosDiamantes.png";
                    break;
                case 3:
                    $ruta .= "tresDiamantes.png";
                    break;
                case 4:
                    $ruta .= "cuatroDiamantes.png";
                    break;
                case 5:
                    $ruta .= "cincoDiamantes.png";
                    break;
                case 6:
                    $ruta .= "seisDiamantes.png";
                    break;
                case 7:
                    $ruta .= "sieteDiamantes.png";
                    break;
                case 8:
                    $ruta .= "ochoDiamantes.png";
                    break;
                case 9:
                    $ruta .= "nueveDiamantes.png";
                    break;
                case "jota":
                    $ruta .= "jotaDiamantes.png";
                    break;
                case "reina":
                    $ruta .= "reinaDiamantes.png";
                    break;
                case "rey":
                    $ruta .= "reyDiamantes.png";
                    break;

            }
        }
        if ($carta->getPalo() == "picas") {
            switch ($carta->getFigura()) {
                case "as":
                    $ruta .= "asPicas.png";
                    break;
                case 2:
                    $ruta .= "dosPicas.png";
                    break;
                case 3:
                    $ruta .= "tresPicas.png";
                    break;
                case 4:
                    $ruta .= "cuatroPicas.png";
                    break;
                case 5:
                    $ruta .= "cincoPicas.png";
                    break;
                case 6:
                    $ruta .= "seisPicas.png";
                    break;
                case 7:
                    $ruta .= "sietePicas.png";
                    break;
                case 8:
                    $ruta .= "ochoPicas.png";
                    break;
                case 9:
                    $ruta .= "nuevePicas.png";
                    break;
                case "jota":
                    $ruta .= "jotaPicas.png";
                    break;
                case "reina":
                    $ruta .= "reinaPicas.png";
                    break;
                case "rey":
                    $ruta .= "reyPicas.png";
                    break;

            }
        }
        if ($carta->getPalo() == "treboles") {
            switch ($carta->getFigura()) {
                case "as":
                    $ruta .= "asTreboles.png";
                    break;
                case 2:
                    $ruta .= "dosTreboles.png";
                    break;
                case 3:
                    $ruta .= "tresTreboles.png";
                    break;
                case 4:
                    $ruta .= "cuatroTreboles.png";
                    break;
                case 5:
                    $ruta .= "cincoTreboles.png";
                    break;
                case 6:
                    $ruta .= "seisTreboles.png";
                    break;
                case 7:
                    $ruta .= "sieteTreboles.png";
                    break;
                case 8:
                    $ruta .= "ochoTreboles.png";
                    break;
                case 9:
                    $ruta .= "nueveTreboles.png";
                    break;
                case "jota":
                    $ruta .= "jotaTreboles.png";
                    break;
                case "reina":
                    $ruta .= "reinaTreboles.png";
                    break;
                case "rey":
                    $ruta .= "reyTreboles.png";
                    break;

            }
        }


        echo "<h1 class='h1 text-center'>Jugador</h1>";

        switch ($partida->getEstadoJ()) {
            case "jugando":
                echo "<div class='row d-flex justify-content-center align-items-center m-5'><div class='col d-flex justify-content-end align-items-center'>";
                echo "<img src='" . $ruta . "' alt='' class='img w-75'></div><div class='col d-flex justify-content-start align-items-center'>";
                echo "<h2 class=''>Puntuación " . $_SESSION['contadorJugador'] . "/21</h2></div></div>";
                break;
            case "plantado":
                echo "<div class='row d-flex justify-content-center align-items-center m-5'><div class='col d-flex justify-content-end align-items-center'>";
                echo "<img src='" . $ruta . "' alt='' class='img w-75'></div><div class='col d-flex justify-content-start align-items-center'>";
                echo "<h2 class=''>Puntuación " . $_SESSION['contadorJugador'] . "/21</h2></div></div>";
                break;
            case "ganado":
                echo "<div class='row d-flex justify-content-center align-items-center m-5'><div class='col d-flex justify-content-end align-items-center'>";
                echo "<img src='" . $ruta . "' alt='' class='img w-75'></div><div class='col d-flex justify-content-start align-items-center'>";
                echo "<h2 class=''>Puntuación " . $_SESSION['contadorJugador'] . "/21</h2></div></div>";
                break;
            case "perdido":
                echo "<div class='row d-flex justify-content-center align-items-center m-5'><div class='col d-flex justify-content-end align-items-center'>";
                echo "<img src='" . $ruta . "' alt='' class='img w-75'></div><div class='col d-flex justify-content-start align-items-center'>";
                echo "<h2 class=''>Puntuación " . $_SESSION['contadorJugador'] . "/21</h2></div></div>";
                break;

        }

        if ($_SESSION['result']) {
            echo "<h2 class='border border-white btn btn-dark btn-lg p-3 ms-5 mt-5' style='
        font-size: 30px;
    '>Resultado Final: " . $r . "</h2>";
        }



                ?>
            </div>
        </div>

        <!-- Efecto fondo -->
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </div>
</body>

</html>

<?php

    }



}
?>