<?php
session_start();
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
            header('Location: ./login.php');
        }
        if ($_GET['accion'] == "salir") {

            session_destroy();


            header("Location: login.php");
        }
        if ($_GET['accion'] == "verPartidas") {
            ControladorPartida::mostrarPartidas();
        }
        if ($_GET['accion'] == "informacion") {
            ControladorPartida::informacion($_GET["id"]);
        }

        //Acción de eliminar una partida
        if ($_GET['accion'] == "eliminar") {

            ControladorPartida::delete($_GET["id"]);
        }
        //Acción de apuntarse a una partida
        if ($_GET['accion'] == "apuntarse") {

            ControladorPartida::apuntarse($_GET["id"]);
        }
        //Acción de desapuntarse de una partida
        if ($_GET['accion'] == "desapuntarse") {

            ControladorPartida::desapuntarse($_GET["id"]);
        }


    }
    if (isset($_POST['email'])) {
        $email = filtrado($_REQUEST["email"]);
        $password = filtrado($_REQUEST["password"]);
        ControladorPartida::login($email, $password);
    }




    if (isset($_REQUEST['insertar'])) {
        $fecha = filtrado($_REQUEST["fecha"]);
        $hora = filtrado($_REQUEST["hora"]);
        $ciudad = filtrado($_REQUEST["ciudad"]);
        $lugar = filtrado($_REQUEST["lugar"]);
        $cubierto = filtrado($_REQUEST["cubierto"]);


        ControladorPartida::insertar($fecha, $hora, $ciudad, $lugar, $cubierto);
    }


    //para buscar partida por fecha

    if (isset($_GET["buscarFecha"])) {
        $fecha = filtrado($_GET["fecha"]);
        ControladorPartida::mostrarPartidaFecha($fecha);
    }

    //para buscar partida por ciudad

    if (isset($_GET["buscarCiudad"])) {
        $ciudad = filtrado($_GET["ciudad"]);
        ControladorPartida::mostrarPartidaCiudad($ciudad);
    }




}
?>