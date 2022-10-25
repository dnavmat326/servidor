<?php
function encriptar($string)
{
    $clave  = 'clave';
    $method = 'aes-256-cbc';
    $iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");
    return openssl_encrypt($string, $method, $clave, false, $iv);
}
function desencriptar($string)
{
    $clave  = 'clave';
    $method = 'aes-256-cbc';
    $iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");
    return openssl_decrypt($string, $method, $clave, false, $iv);
}

//Si he pinchado en un link
if (isset($_COOKIE["servidor"])) {

    //Leemos lo que ya te gusta
    $gustos = $_COOKIE["servidor"];

    //Aquí desencriptas los datos
    $gustos = desencriptar($gustos);


    //juegos-1#ropa-4

    //Separar los gustos y meterlos en un array
    $gustosArray = explode("#", $gustos);

    $encontrado = false;
    for ($i = 1; $i < count($gustosArray); $i++) {
        //Separa moda de 1

        $gustoContadorArray = explode("-", $gustosArray[$i]);

        if ($_GET['interes'] == $gustoContadorArray[0]) {
            $gustoContadorArray[1]++;
        }

        $gustosArray[$i] = implode("-", $gustoContadorArray);
    }

    //Volvemos a convertir a string ya quitados los duplicados
    $gustosString = implode("#", $gustosArray);

    //Aquí encriptas los datos 
    //-----

    setcookie('servidor', encriptar($gustosString), time() + 60, "/cookies", "localhost", false, true);
    //echo "Cookie creada";


} else {
    setcookie('servidor', encriptar("#moda-0#deporte-0#juegos-0"), time() + 60, "/cookies", "localhost", false, true);
}

header("Location: index.php");
