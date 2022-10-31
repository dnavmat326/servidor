<?php session_start(); ?>
<?php include('lib.php'); ?>
<?php

$diccionario = ["hola"];
if ($_POST) {

    if (isset($_POST['empezar'])) {

        $_SESSION['palabra'] = str_split($diccionario[0]);
        $_SESSION['palabraOculta'] = array();
        for ($i = 0; $i < count($_SESSION['palabra']); $i++) {
            array_push($_SESSION['palabraOculta'], "_ ");
        }

        $_SESSION['errores'] = 0;

        header("Location: index.php?accion=inicio");
    }

    if (isset($_POST['letra'])) {

        for ($i = 0; $i < count($_SESSION['palabraOculta']); $i++) {
            if ($_SESSION['palabra'][$i] == $_POST['letra']) {
                $_SESSION['palabraOculta'][$i] = $_POST['letra'];
            }
        }
        if (!in_array($_POST['letra'], $_SESSION['palabra'])) {
            $_SESSION['errores']++;
        }



        header("Location: index.php?accion=probar");
    }
    if ($_SESSION['errores'] == 6) {
        session_destroy();
        header("Location: index.php");
    }
}




?>