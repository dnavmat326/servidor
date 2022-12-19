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

//Función para subir imágenes al servidor
function subirImagen()
{

    $directorioSubida = "img/";
    $extensionesValidas = array("jpg", "png", "gif");
    if (isset($_FILES['cartel'])) {
        $errores = array();
        $nombreArchivo = $_FILES['cartel']['name'];
        $directorioTemp = $_FILES['cartel']['tmp_name'];
        $tipoArchivo = $_FILES['cartel']['type'];
        $arrayArchivo = pathinfo($nombreArchivo);
        $extension = $arrayArchivo['extension'];
        // Comprobamos la extensión del archivo
        if (!in_array($extension, $extensionesValidas)) {
            $errores[] = "La extensión del archivo no es válida o no se ha subido ningún archivo";
        }

        // Comprobamos y renombramos el nombre del archivo
        $nombreArchivo = $arrayArchivo['filename'];
        $nombreArchivo = preg_replace("/[^A-Z0-9._-]/i", "_", $nombreArchivo);
        $nombreArchivo = $nombreArchivo . rand(1, 100);
        // Desplazamos el archivo si no hay errores
        if (empty($errores)) {
            $nombreCompleto = $directorioSubida . $nombreArchivo . "." . $extension;
            move_uploaded_file($directorioTemp, $nombreCompleto);
            //print "El archivo se ha subido correctamente";
        }
    }

    return $nombreCompleto;
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
        if ($_GET['accion'] == "verRegalos") {
            ControladorRegalo::mostrarRegalos();
        }
        if ($_GET['accion'] == "imprimir") {
            ControladorRegalo::imprimir();
            header("Location: regalos.pdf");
        }
        //Acción de eliminar un regalo
        if ($_GET['accion'] == "eliminar") {

            ControladorRegalo::delete($_GET["id"]);
        }
        //Acción de eliminar un enlace
        if ($_GET['accion'] == "eliminarEnlace") {

            ControladorEnlace::delete($_GET["id"]);
        }
        //Acción de ver enlaces de un regalo
        if ($_GET['accion'] == "verEnlaces") {
            $_SESSION['idRegalo'] = $_GET["id"];
            ControladorRegalo::verEnlaces($_GET["id"]);
        }
        //Acción de ordenar enlaces de un regalo
        if ($_GET['accion'] == "ordenar") {
            ControladorRegalo::verEnlacesOrdenados($_SESSION['idRegalo']);
        }

    }
    if (isset($_POST['email'])) {
        $email = filtrado($_REQUEST["email"]);
        $password = filtrado($_REQUEST["password"]);
        ControladorRegalo::login($email, $password);
    }

    //para actualizar regalo

    if (isset($_GET["update"])) {
        $nombre = filtrado($_GET["nombre"]);
        $destinatario = filtrado($_GET["destinatario"]);
        $precio = filtrado($_GET["precio"]);
        $estado = filtrado($_GET["estado"]);
        $year = filtrado($_GET["year"]);
        $id = filtrado($_GET["id"]);
        RegaloBD::update($nombre, $destinatario, $precio, $estado, $year, $id);
        ControladorRegalo::mostrarRegalos();
    }


    if (isset($_REQUEST['insertar'])) {
        $nombre = filtrado($_REQUEST["nombre"]);
        $destinatario = filtrado($_REQUEST["destinatario"]);
        $precio = filtrado($_REQUEST["precio"]);
        $estado = filtrado($_REQUEST["estado"]);
        $year = filtrado($_REQUEST["year"]);


        ControladorRegalo::insertar($nombre, $destinatario, $precio, $estado, $year);
    }

    if (isset($_REQUEST['insertarEnlace'])) {
        $nombre = filtrado($_REQUEST["nombre"]);
        $link = filtrado($_REQUEST["link"]);
        $precio = filtrado($_REQUEST["precio"]);
        $imagen = subirImagen();
        $prioridad = filtrado($_REQUEST["prioridad"]);


        ControladorEnlace::insertar($nombre, $link, $precio, $imagen, $prioridad);
    }

    //para buscar regalo por año

    if (isset($_GET["buscarYear"])) {
        $year = filtrado($_GET["year"]);
        ControladorRegalo::mostrarRegalosYear($year);
    }




}
?>