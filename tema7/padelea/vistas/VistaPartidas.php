<?php
class VistaPartidas
{

    public static function render($partidas)
    {

?>

<?php include("header.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Padelea</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info text-center">Partidas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" style="font-size: 15px;" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Ciudad</th>
                            <th>Lugar</th>
                            <th>Cubierto</th>
                            <th>Estado</th>
                            <th>Información</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Ciudad</th>
                            <th>Lugar</th>
                            <th>Cubierto</th>
                            <th>Estado</th>
                            <th>Información</th>
                            <th>Eliminar</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php

        foreach ($partidas as $partida) {
            if ($partida->getCubierto() == 1) {
                $partida->setCubierto("Si");
            }
            if ($partida->getCubierto() == 0) {
                $partida->setCubierto("No");
            }

            echo ("<tr>" .
                "<td>" . $partida->getFecha() . "</>" .
                "<td>" . $partida->getHora() . "</>" .
                "<td>" . $partida->getCiudad() . "</>" .
                "<td>" . $partida->getLugar() . "</>" .
                "<td>" . $partida->getCubierto() . "</>" .
                "<td>" . $partida->getEstado() . "</>" .

                "<td><a href='enrutador.php?accion=informacion&id=" . $partida->getIdPartida() . "' class='btn btn-info btn-circle'> <i class='fas fa-info-circle'></i></a></>" .
                "<td><a href='enrutador.php?accion=eliminar&id=" . $partida->getIdPartida() . "'class='btn btn-danger btn-circle'><i class='fas fa-trash'></i></a></>" .
                "</tr>"
            );

        }


                        ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>








</body>

</html>
<?php include("footer.php");
    }

    public static function renderPartida($partida)
    {

?>

<?php include("header.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Padelea</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info text-center">Partida Detalle</h6>
        </div>
        <div class="card-body">
            <?php
        $id = $partida->getIdPartida();
        if ($partida->getEstado() == "abierta") {
            if ($partida->getidJugador1() != unserialize($_SESSION['jugador'])->getIdJugador() && $partida->getidJugador2() != unserialize($_SESSION['jugador'])->getIdJugador() && $partida->getidJugador3() != unserialize($_SESSION['jugador'])->getIdJugador() && $partida->getidJugador4() != unserialize($_SESSION['jugador'])->getIdJugador()) {


            ?>


            <a class="btn bg-danger text-white"
                href="enrutador.php?accion=apuntarse&id=<?php echo $id; ?> ">Apuntarse</a>






            <?php
            }
            if ($partida->getidJugador1() == unserialize($_SESSION['jugador'])->getIdJugador() || $partida->getidJugador2() == unserialize($_SESSION['jugador'])->getIdJugador() || $partida->getidJugador3() == unserialize($_SESSION['jugador'])->getIdJugador() || $partida->getidJugador4() == unserialize($_SESSION['jugador'])->getIdJugador()) {
            ?>

            <a class="btn bg-danger text-white"
                href="enrutador.php?accion=desapuntarse&id=<?php echo $id; ?>">Desapuntarse</a>

            <?php

            }

        }







            ?>
            <div class="table-responsive">
                <table class="table table-bordered text-center" style="font-size: 15px;" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Ciudad</th>
                            <th>Lugar</th>
                            <th>Cubierto</th>
                            <th>Estado</th>
                            <th>Jugador 1</th>
                            <th>Jugador 2</th>
                            <th>Jugador 3</th>
                            <th>Jugador 4</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Ciudad</th>
                            <th>Lugar</th>
                            <th>Cubierto</th>
                            <th>Estado</th>
                            <th>Jugador 1</th>
                            <th>Jugador 2</th>
                            <th>Jugador 3</th>
                            <th>Jugador 4</th>

                        </tr>
                    </tfoot>
                    <tbody>

                        <?php

        if ($partida->getCubierto() == 1) {
            $partida->setCubierto("Si");
        }
        if ($partida->getCubierto() == 0) {
            $partida->setCubierto("No");
        }
        $jugador1 = "";
        $jugador2 = "";
        $jugador3 = "";
        $jugador4 = "";
        $_SESSION['contador'] = "";
        $_SESSION['desapuntarse'] = "";

        if ($partida->getidJugador1() != null) {
            $jugador1 = JugadorBD::getJugador($partida->getidJugador1());
        } else {
            $_SESSION['contador'] = "idJugador1";
        }
        if ($partida->getidJugador2() != null) {
            $jugador2 = JugadorBD::getJugador($partida->getidJugador2());
        } else {
            $_SESSION['contador'] = "idJugador2";
        }
        if ($partida->getidJugador3() != null) {
            $jugador3 = JugadorBD::getJugador($partida->getidJugador3());
        } else {
            $_SESSION['contador'] = "idJugador3";
        }
        if ($partida->getidJugador4() != null) {
            $jugador4 = JugadorBD::getJugador($partida->getidJugador4());
        } else {
            $_SESSION['contador'] = "idJugador4";
        }

        if ($partida->getidJugador1() == unserialize($_SESSION['jugador'])->getIdJugador()) {
            $_SESSION['desapuntarse'] = "idJugador1";
        }
        if ($partida->getidJugador2() == unserialize($_SESSION['jugador'])->getIdJugador()) {
            $_SESSION['desapuntarse'] = "idJugador2";
        }
        if ($partida->getidJugador3() == unserialize($_SESSION['jugador'])->getIdJugador()) {
            $_SESSION['desapuntarse'] = "idJugador3";
        }
        if ($partida->getidJugador4() == unserialize($_SESSION['jugador'])->getIdJugador()) {
            $_SESSION['desapuntarse'] = "idJugador4";
        }


        echo ("<tr>" .
            "<td>" . $partida->getFecha() . "</>" .
            "<td>" . $partida->getHora() . "</>" .
            "<td>" . $partida->getCiudad() . "</>" .
            "<td>" . $partida->getLugar() . "</>" .
            "<td>" . $partida->getCubierto() . "</>" .
            "<td>" . $partida->getEstado() . "</>" .
            "<td>" . $jugador1 . "</>" .
            "<td>" . $jugador2 . "</>" .
            "<td>" . $jugador3 . "</>" .
            "<td>" . $jugador4 . "</></tr>"
        );




                        ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>








</body>

</html>
<?php include("footer.php");
    }
}
?>