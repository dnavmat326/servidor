<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>BIBLIOTECA</title>
    <!-- Custom fonts for this template-->
    <link href="v2/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <script>
        import "@fortawesome/fontawesome-free/js/all";
    </script>
</head>

<body>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content" style="margin-bottom: 9%;">
                <!-- Topbar -->

                <nav class="navbar navbar-dark topbar mb-4 static-top bg-dark shadow navbar-expand-lg">
                    <div class="container-fluid">

                        <a href="./index.php" class="navbar-brand btn btn-outline-success">Ver Biblioteca</a>
                        <a class="navbar-brand btn btn-outline-success" href="#" data-toggle="modal"
                            data-target="#insertar">Añadir
                            Prestamo</a>


                        <form class="d-flex" action="./enrutador.php" method="get" name="buscarEstado"
                            id="buscarEstado">

                            <select class="form-select me-2" name='estado' aria-label="Default select example">
                                <option name='estado' value="" selected>Buscar por Estado</option>
                                <option name='estado' value="Activo">Activo</option>
                                <option name='estado' value="Devuelto">Devuelto</option>
                                <option name='estado' value="Sobrepasado1Mes">Sobrepasado1Mes</option>
                                <option name='estado' value="Sobrepasado1Año">Sobrepasado1Año</option>
                            </select>

                            <input class="btn btn-outline-success" type="submit" value="Buscar" name="buscarEstado">
                        </form>

                        <form class="d-flex" action="./enrutador.php" method="get" name="buscarDni" id="buscarDni">

                            <input class="form-control me-2" type="text" name="dni" id="dni"
                                placeholder="Buscar por Dni">

                            <input class="btn btn-outline-success" type="submit" value="Buscar" name="buscarDni">
                        </form>


                    </div>
                </nav>


                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
</body>

</html>