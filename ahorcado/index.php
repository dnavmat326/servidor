<?php session_start(); ?>
<?php include('lib.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BINGO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>

    <div class='container'>

        <h2>BINGO PHP</h2>



        <?php
        if (!isset($_GET['accion'])) {
        ?>

            <div class='row'>

                <div class='col-3'>
                    <form action="controlador.php" method='post'>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Número jugadores</label>
                            <input type="number" class="form-control" id="numeroJugadores" name='numeroJugadores' min='1' max='5'>
                        </div>
                        <button type="submit" name='empezar' class="btn btn-info">Enviar</button>

                    </form>
                </div>

            </div>

        <?php
        } else {

            pintarTambor();

            for ($i = 0; $i < $_SESSION['numJugadores']; $i++) {
                echo "<br>";
                echo "<h1>Jugador " . $i + 1;
                "</h1>";
                pintarCarton($_SESSION['carton' . $i]);
            }
        }
        ?>


    </div>

</body>

</html>