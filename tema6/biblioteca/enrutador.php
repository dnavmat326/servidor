<?php
//AUTOLOAD
function autocarga($clase)
{
    $ruta = "./controladores/$clase.php";
    if (file_exists($ruta)) {
        include_once $ruta;
    }

    $ruta = "./modelos/$clase.php";
    if (file_exists($ruta)) {
        include_once $ruta;
    }

    $ruta = "./vistas/$clase.php";
    if (file_exists($ruta)) {
        include_once $ruta;
    }

}
spl_autoload_register("autocarga");

//Función para filtrar los campos del formulario
function filtrado($datos)
{
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}

if ($_REQUEST) {
    if (isset($_REQUEST['accion'])) {

        //Inicio
        if ($_REQUEST['accion'] == "inicio") {
            ControladorPrestamo::mostrarPrestamos();
        }
    }

    //para añadir prestamo
if (isset($_GET["insertar"])) {
    $usuario = filtrado($_GET["usuario"]);
    $libro = filtrado($_GET["libro"]);
    $estado = filtrado($_GET["estado"]);
    $fechaI = filtrado($_GET["fechaI"]);
    $fechaF = filtrado($_GET["fechaF"]);
    PrestamoBD::insertPrestamo($usuario,$libro,$estado,$fechaI,$fechaF);
    ControladorPrestamo::mostrarPrestamos();
}
    //para actualizar prestamo

if (isset($_GET["update"])) {
    $id = filtrado($_GET["id"]);
    $estado = filtrado($_GET["estado"]);
    $fechaI = filtrado($_GET["fechaI"]);
    $fechaF = filtrado($_GET["fechaF"]);
    PrestamoBD::updatePrestamo($id,$estado,$fechaI,$fechaF);
    ControladorPrestamo::mostrarPrestamos();
}
    //para buscar prestamo por estado

if (isset($_GET["buscarEstado"])) {
    $estado = filtrado($_GET["estado"]);
    ControladorPrestamo::mostrarPrestamosEstado($estado);
}

    //para buscar prestamo por dni

if (isset($_GET["buscarDni"])) {
    $dni = filtrado($_GET["dni"]);
    ControladorPrestamo::mostrarPrestamosDni($dni);
}
}
?>