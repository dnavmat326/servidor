<?php
session_start();
//session_destroy();

function dias_pasados($fecha_inicial, $fecha_final)
{
    $dias = (strtotime($fecha_inicial) - strtotime($fecha_final)) / 86400;
    $dias = abs($dias);
    $dias = floor($dias);
    return $dias;
}
date_default_timezone_set('UTC');

if (isset($_POST['email'])) {

    $array = str_split($_POST['password']);
    $mayuscula = false;
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] == strtoupper($array[$i])) {
            $mayuscula = true;
            break;
        }
    }

    if (strlen($_POST['password']) >= 8 && $mayuscula == true) {
        $_SESSION['usuario'] = $_POST['email'];
        header("Location: index.php");
    } else {
        header("Location: login.php?error");
    }
}

if (isset($_POST['add'])) {
    if(empty($_SESSION["proyectos"])){
        $id=0;
    } else{
        $idd=array_column($_SESSION["proyectos"], 'id');
        $id=max($idd)+1;
    }

    $proyectos = ["id" => $id, "nombre" => $_POST['nombre'], "fechaI" => $_POST['fechaI'], "fechaF" => $_POST['fechaF'], "dias" => dias_pasados($_POST['fechaI'], date("Y-m-d")), "porcentaje" => $_POST['porcentaje'], "importancia" => $_POST['importancia']];

    $_SESSION['proyectos'][] = $proyectos;
    header("Location: index.php");
}

//Acción de eliminar todos los proyectos
if ($_GET['accion'] == "eliminarTodo") {
    $_SESSION['proyectos'] = array();
    header("Location: index.php");
}

//Acción de eliminar un proyecto
if ($_GET['accion'] == "eliminar") {

    unset($_SESSION["proyectos"][$_GET["id"]]);


    header("Location: index.php");
}

if ($_GET['accion'] == "salir") {

    session_destroy();


    header("Location: login.php");
}