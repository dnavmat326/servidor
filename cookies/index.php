<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="./crearCookie.php?interes=deporte">Deportes</a><br>
    <a href="./crearCookie.php?interes=juegos">Juegos</a><br>
    <a href="./crearCookie.php?interes=moda">Moda</a><br><br><br><br>
</body>
<?php
function desencriptar($string)
{
    $clave  = 'clave';
    $method = 'aes-256-cbc';
    $iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");
    return openssl_decrypt($string, $method, $clave, false, $iv);
}
if (isset($_COOKIE['servidor'])) {
    echo "Desencriptado: ";
    echo desencriptar($_COOKIE['servidor']) . "<br>";
    echo "Encriptado: ";
    echo $_COOKIE['servidor'];
}
?>

</html>