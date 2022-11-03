<?php include('controlador.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ahorcado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        .center {
            margin-left: 35%;
            padding: 3%;
        }

        .fondo {
            background-color: #ebebff;
        }

        .btn-info {
            background-color: #b8b8ff;
            border: 2px solid grey;
            color: #ebebff;
            font-size: large;
        }
    </style>

</head>

<body>

    <div class='container h2'>


        <div class="container border border-grey border-3 text-center fondo rounded p-3 m-1">
            <?php
            // Inicio del juego
            if (!isset($_GET['accion'])) {
            ?>

                <div class='row'>

                    <div class='col-3 center'>
                        <h1 class="h1 text-center text-primary">Ahorcado PHP</h1>

                        <form action="controlador.php" method='post'>
                            <button type="submit" name='empezar' class="btn btn-info">Empezar</button>

                        </form>
                    </div>

                </div>

                <?php
                // Pantalla para probar letra
            } else if (isset($_GET['accion'])) {
                if ($_SESSION['errores'] != 6 && implode($_SESSION['palabraOculta']) != implode($_SESSION['palabra'])) {
                    echo (implode($_SESSION['palabraOculta']) . "<br>");
                ?>
                    <div class='row'>

                        <div class='col-3 center'>
                            <form class="form" action="controlador.php" method='post'>
                                <label for="letra">Letra:&nbsp; </label><input type="text" name="letra" id="letra" size="1" maxlength="1" required>
                                <button type="submit" name='probar' class="btn btn-info">Probar</button>

                            </form>
                        </div>


                    </div>
                    <?php
                    // Pintar letras usadas
                    if (isset($_SESSION['letras'])) {
                        echo ("Letras usadas: " . implode(" , ", $_SESSION['letras'])) . "<br>";
                    }
                }
                // Pintar ahorcado
                if (implode($_SESSION['palabraOculta']) != implode($_SESSION['palabra'])) {
                    echo (pintarAhorcado($_SESSION['errores']));
                }
                // Mostrar solucion
                if ($_SESSION['errores'] == 6 || implode($_SESSION['palabraOculta']) == implode($_SESSION['palabra'])) {
                    echo ("Solucion: " . implode($_SESSION['palabra']) . "<br><br>");
                    // Pantalla para volver a jugar
                    ?>
                    <div class='row'>

                        <div class='col-3 center'>
                            <form action="controlador.php" method='post'>
                                <button type="submit" name='volver' class="btn btn-info">Volver a jugar</button>

                            </form>
                        </div>


                    </div>
            <?php
                }
                if (implode($_SESSION['palabraOculta']) == implode($_SESSION['palabra'])) {
                    echo (pintarAhorcado("7"));
                }
            }

            ?>


        </div>
    </div>

</body>

</html>