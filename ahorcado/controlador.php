<?php session_start(); ?>
<?php

//Funciones

// Palabra al azar
function azar($diccionario)
{
    return str_split($diccionario[rand(0, count($diccionario) - 1)]);
}

//Pintar ahorcado
function pintarAhorcado($numImg)
{
    return ("<img class='img-thumbnail' src='./" . $numImg . ".jpeg'>" . "<br>");
}

$diccionario = ["hola", "adios", "gato", "perro", "azul"/*, "amarillo", "verde", "negro", "blanco", "arbol", "coche", "ventana", "puerta", "silla", "plato", "mesa", "botella", "gorra", "libro", "lapiz"*/];
// Selecciona palabra del diccionario al azar
if ($_POST) {
    if (isset($_POST['empezar'])) {

        $_SESSION['palabra'] = azar($diccionario);
        $_SESSION['palabraOculta'] = array();
        for ($i = 0; $i < count($_SESSION['palabra']); $i++) {
            array_push($_SESSION['palabraOculta'], "_ ");
        }

        $_SESSION['errores'] = 0;

        header("Location: index.php?accion=inicio");
    }
    // Meter las letras usadas en la sesion
    if (isset($_POST['letra'])) {
        if (isset($_SESSION['letras'])) {
            if (!in_array(strtolower($_POST['letra']), $_SESSION['letras'])) {
                array_push($_SESSION['letras'], strtolower($_POST['letra']));
            }
        } else {
            $_SESSION['letras'] = [strtolower($_POST['letra'])];
        }
        // Comprobar letras introducidas por teclado
        for ($i = 0; $i < count($_SESSION['palabraOculta']); $i++) {
            if ($_SESSION['palabra'][$i] == strtolower($_POST['letra'])) {
                $_SESSION['palabraOculta'][$i] = strtolower($_POST['letra']);
            }
        }
        // Contar errores
        if (!in_array(strtolower($_POST['letra']), $_SESSION['palabra'])) {
            $_SESSION['errores']++;
        }



        header("Location: index.php?accion=probar");
    }

    // Volver a jugar
    if (isset($_POST['volver'])) {

        session_destroy();



        header("Location: index.php");
    }
}




?>