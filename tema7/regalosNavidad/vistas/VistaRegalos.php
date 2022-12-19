<?php
class VistaRegalos
{

    public static function render($regalos)
    {

        $options = array(
            'Pendiente' => 'Pendiente',
            'Comprado' => 'Comprado',
            'Envuelto' => 'Envuelto',
            'Entregado' => 'Entregado'
        );





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

    <title>SB Admin</title>

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
            <h6 class="m-0 font-weight-bold text-info text-center">Regalos</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" style="font-size: 15px;" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Destinatario</th>
                            <th>Precio</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                            <th>Actualizar</th>
                            <th>Información</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Destinatario</th>
                            <th>Precio</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                            <th>Actualizar</th>
                            <th>Información</th>
                            <th>Eliminar</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php

        foreach ($regalos as $regalo) {
            echo ("<tr><form action='./enrutador.php' method='get' name='update' id='update'>" .
                "<td><input type='text' name='nombre' id='nombre' value='" . $regalo->getNombre() . "'style='
                width: 100px;
            '></>" .
                "<td><input type='text' name='destinatario' id='destinatario' value='" . $regalo->getDestinatario() . "'style='
                width: 100px;
            '></>" .
                "<td><input type='number' min='0.00' step='0.01' name='precio' value='" . $regalo->getPrecio() . "'style='
                width: 100px;
            '>€</>" .
                "<td>");
                        ?>

                        <select class="form-select" name="estado" id="estado" aria-label="Default select example">

                            <?php foreach ($options as $var => $opt): ?>
                            <option value="<?php echo $var ?>" <?php if ($var==$regalo->getEstado()): ?>
                                selected="selected"
                                <?php endif; ?>>
                                <?php echo $opt ?>
                            </option>
                            <?php endforeach; ?>
                        </select>




                        <?php
            echo ("</>" .
                "<td><input type='number' min='1900' max='2099' step='1' name='year' value='" . $regalo->getYear() . "'></>" .
                "<input type='hidden' name='id' value='" . $regalo->getIdRegalo() . "'><td><button type='submit' class='btn btn-info btn-circle' name='update'><i class='fas fa-pen'></i></button></><td><a href='enrutador.php?accion=verEnlaces&id=" . $regalo->getIdRegalo() . "' class='btn btn-info btn-circle'> <i class='fas fa-info-circle'></i></a></>" .
                "<td><a href='enrutador.php?accion=eliminar&id=" . $regalo->getIdRegalo() . "'class='btn btn-danger btn-circle'><i class='fas fa-trash'></i></a></>" .
                "</form></tr>"
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