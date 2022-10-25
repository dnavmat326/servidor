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
    $id = 0;
    if (isset($_SESSION['proyectos'])) {
        $id = count($_SESSION['proyectos']);
    }

    $proyectos = ["id" => $id, "nombre" => $_POST['nombre'], "fechaI" => $_POST['fechaI'], "fechaF" => $_POST['fechaF'], "dias" => dias_pasados($_POST['fechaI'], date("Y-m-d")), "porcentaje" => $_POST['porcentaje'], "importancia" => $_POST['importancia']];

    $_SESSION['proyectos'][] = $proyectos;
    array_multisort($_SESSION['proyectos']);
    header("Location: index.php");
}
