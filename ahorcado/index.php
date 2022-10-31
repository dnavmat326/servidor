<?php session_start(); ?>
<?php include('lib.php'); ?>

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

    <div class='container'>

        <h2>Ahorcado PHP</h2>



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
        } else {
            echo (implode($_SESSION['palabraOculta']) . "<br>") ?>
            <div class='row'>

                <div class='col-3'>
                    <form action="controlador.php" method='post'>
                        <input type="text" name="letra" id="letra" value="letra">
                        <button type="submit" name='probar' class="btn btn-info">Probar</button>

                    </form>
                </div>


            </div>
        <?php
            echo ("Errores: " . $_SESSION['errores'] . "/6" . "<br>");
        }
        ?>


    </div>

</body>

</html>