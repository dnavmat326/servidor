<?php
session_start();
if (isset($_GET['nuevaPartida'])) {
    session_destroy();
    session_start();
}
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
            ControladorJuego::crearPartida();
        }
    }

    if (isset($_GET['nuevaPartida'])) {

        ControladorJuego::crearPartida();
    }
    if (isset($_GET['pedir'])) {
        ControladorJuego::pedirCarta();
    }
    if (isset($_GET['plantarse'])) {
        $_SESSION['jugadorP'] = true;
        ControladorJuego::pedirCarta();
    }
}
?>