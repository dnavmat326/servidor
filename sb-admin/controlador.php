<?php
session_start();
//session_destroy();


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

if (isset($_POST['id'])) {
    $proyectos = ["id" => $_POST['id'], "nombre" => $_POST['nombre'], "fechaI" => $_POST['fechaI'], "fechaF" => $_POST['fechaF'], "dias" => "", "porcentaje" => "", "importancia" => $_POST['importancia']];

    $_SESSION['proyectos'][] = $proyectos;
    array_multisort($_SESSION['proyectos']);
    header("Location: index.php");
    
}
