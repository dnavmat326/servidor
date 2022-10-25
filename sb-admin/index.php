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
            <h6 class="m-0 font-weight-bold text-primary">Proyectos</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                        "<td>" . $proyecto["fechaI"] . "</>" .
                                        "<td>" . $proyecto["fechaF"] . "</>" .
                                        "<td>" . $proyecto["dias"] . "</>" .
                                        "<td>" . $proyecto["porcentaje"] . "</>" .
                                        "<td>" . $proyecto["importancia"] . "</>" .
                                        "</tr>"
                                    );
                                }
                            } else {
                                echo ("<tr>" .
                                    "<td>" . $_SESSION["proyectos"]["nombre"] . "</>" .
                                    "<td>" . $_SESSION["proyectos"]["fechaI"] . "</>" .
                                    "<td>" . $_SESSION["proyectos"]["fechaF"] . "</>" .
                                    "<td>" . $_SESSION["proyectos"]["dias"] . "</>" .
                                    "<td>" . $_SESSION["proyectos"]["porcentaje"] . "</>" .
                                    "<td>" . $_SESSION["proyectos"]["importancia"] . "</>" .
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