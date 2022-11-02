<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ahorcado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


</head>

<body>

    <div class='container-fluid h2'>

        <h1 class="text-primary text-center">Ahorcado PHP</h1>

        <div class="container border border-dark border-3">

            <?php
            if (!isset($_GET['accion'])) {
            ?>

                <div class='row'>

                    <div class='col-3'>
                        <form action="controlador.php" method='post'>
                            <button type="submit" name='empezar' class="btn btn-info">Empezar</button>

                        </form>
                    </div>

                </div>

                <?php
            } else if (isset($_GET['accion'])) {
                if ($_SESSION['errores'] != 6 && implode($_SESSION['palabraOculta']) != implode($_SESSION['palabra'])) {
                    echo (implode($_SESSION['palabraOculta']) . "<br>");
                ?>
                    <div class='row'>

                        <div class='col-3'>
                            <form class="form" action="controlador.php" method='post'>
                                <label for="letra">Letra:&nbsp; </label><input type="text" name="letra" id="letra" size="1" maxlength="1" required>
                                <button type="submit" name='probar' class="btn btn-info">Probar</button>

                            </form>
                        </div>


                    </div>
                    <?php
                    if (isset($_SESSION['letras'])) {
                        echo ("Letras usadas: " . implode(" , ", $_SESSION['letras'])) . "<br>";
                    }
                }
                if (implode($_SESSION['palabraOculta']) != implode($_SESSION['palabra'])) {
                    echo ("<img src='./" . $_SESSION['errores'] . ".jpeg'>" . "<br>");
                }
                if ($_SESSION['errores'] == 6 || implode($_SESSION['palabraOculta']) == implode($_SESSION['palabra'])) {
                    echo ("Solucion: " . implode($_SESSION['palabra']) . "<br><br>");
                    ?>
                    <div class='row'>

                        <div class='col-3'>
                            <form action="controlador.php" method='post'>
                                <button type="submit" name='volver' class="btn btn-info">Volver a jugar</button>

                            </form>
                        </div>


                    </div>
            <?php
                }
                if (implode($_SESSION['palabraOculta']) == implode($_SESSION['palabra'])) {
                    echo ("<img src='./7.jpeg'>" . "<br>");
                }
            }

            ?>


        </div>
    </div>

</body>

</html>