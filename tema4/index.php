<?php include("header.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info text-center">Proyectos</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" style="font-size: 15px;" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>FechaInicio</th>
                            <th>FechaFin</th>
                            <th>DiasTranscurridos</th>
                            <th>Porcentaje</th>
                            <th>Importancia</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>FechaInicio</th>
                            <th>FechaFin</th>
                            <th>DiasTranscurridos</th>
                            <th>Porcentaje</th>
                            <th>Importancia</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php

                        if (isset($_SESSION["proyectos"])) {
                            if (isset($_SESSION["proyectos"][0]) && is_array($_SESSION["proyectos"][0])) {
                                foreach ($_SESSION["proyectos"] as $proyecto) {
                                    echo ("<tr>" .
                                        "<td>" . $proyecto["nombre"] . "</>" .
                                        "<td>" . date('d/m/Y', strtotime($proyecto["fechaI"])) . "</>" .
                                        "<td>" . date('d/m/Y', strtotime($proyecto["fechaF"])) . "</>" .
                                        "<td>" . $proyecto["dias"] . "</>" .
                                        "<td>" . $proyecto["porcentaje"] . "</>" .
                                        "<td>" . $proyecto["importancia"] . "</>" .
                                        "<td><a href='verProyecto.php?id=" . $proyecto["id"] . "' class='btn btn-info btn-circle'> <i class='fas fa-info-circle'></i></a></>" .
                                        "<td><a href='controlador.php?accion=eliminar&id=" . $proyecto["id"] . "'class='btn btn-danger btn-circle'><i class='fas fa-trash'></i></a></>" .
                                        "</tr>"
                                    );
                                }
                            } else if ($_SESSION["proyectos"] != array()) {
                                echo ("<tr>" .
                                    "<td>" . $_SESSION["proyectos"]["nombre"] . "</>" .
                                    "<td>" . date('d/m/Y', strtotime($proyecto["fechaI"])) . "</>" .
                                    "<td>" . date('d/m/Y', strtotime($proyecto["fechaF"])) . "</>" .
                                    "<td>" . $_SESSION["proyectos"]["dias"] . "</>" .
                                    "<td>" . $_SESSION["proyectos"]["porcentaje"] . "</>" .
                                    "<td>" . $_SESSION["proyectos"]["importancia"] . "</>" .
                                    "<td><a href='verProyecto.php?id=" . $proyecto["id"] . "' class='btn btn-info btn-circle'> <i class='fas fa-info-circle'></i></a></>" .
                                    "<td><a href='controlador.php?accion=eliminar&id=" . $proyecto["id"] . "'class='btn btn-danger btn-circle'><i class='fas fa-trash'></i></a></>" .
                                    "</tr>"
                                );
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>








</body>

</html>
<?php include("footer.php"); ?>