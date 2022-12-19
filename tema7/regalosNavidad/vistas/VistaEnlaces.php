<?php
class VistaEnlaces
{

    public static function render($enlaces)
    {

        $options = array(
            'Pendiente' => 'Pendiente',
            'Comprado' => 'Comprado',
            'Envuelto' => 'Envuelto',
            'Entregado' => 'Entregado'
        );





?>

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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<!DOCTYPE html>

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-info sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon bg-login-image img-thumbnail rotate-n-15 text-info  w-100">
                <i class="fas fa-laugh-wink" style="visibility:hidden"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Regalos <sup>DIEGO</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="enrutador.php?accion=verRegalos">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Regalos</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">



        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item active">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Acciones</span>
            </a>
            <div id="collapsePages" class="collapse show text-center" aria-labelledby="headingPages"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item bg-info text-white" href="#" data-toggle="modal"
                        data-target="#insertarEnlace">Añadir
                        Enlace</a>
                    <a class="collapse-item bg-warning text-white mt-1 mb-1" href="enrutador.php?accion=ordenar">Ordenar
                        por
                        Precio</a>
                    <a class="collapse-item bg-danger text-white" href="enrutador.php?accion=imprimir">Ver PDF</a>

                </div>
            </div>
        </li>




        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light  topbar mb-4 static-top bg-info shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3 text-info bg-white">
                    <i class="fa fa-bars"></i>
                </button>



                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">


                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-lg-inline text-white">
                                <?php if (isset($_SESSION['usuario'])) {
            echo $_SESSION['usuario'];
        } ?>
                            </span>

                            <div class="img-profile bg-login-image rounded-circle"></div>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">

                            <a class="dropdown-item" href="enrutador.php?accion=salir">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>
            </nav>
            <!-- End of Topbar -->


            <!-- Begin Page Content -->
            <div class="container-fluid">

                <body id="page-top">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-info text-center">Enlaces</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" style="font-size: 15px;" id="dataTable"
                                    width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Link</th>
                                            <th>Precio</th>
                                            <th>Imagen</th>
                                            <th>Prioridad</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Link</th>
                                            <th>Precio</th>
                                            <th>Imagen</th>
                                            <th>Prioridad</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php

        foreach ($enlaces as $enlace) {
            echo ("<tr>" .
                "<td>" . $enlace->getNombre() . "</>" .
                "<td><a href='" . $enlace->getLink() . "'>" . $enlace->getLink() . "</a>
                </>" .
                "<td>" . $enlace->getPrecio() . "</>" .
                "<td><img src='" . $enlace->getImagen() . "' class='img-fluid rounded-top'>
                </>" .
                "<td>" . $enlace->getPrioridad() . "</>" .
                "<td><a href='enrutador.php?accion=eliminarEnlace&id=" . $enlace->getIdEnlace() . "'class='btn btn-danger btn-circle'><i class='fas fa-trash'></i></a></>" .
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
} ?>