<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

</html>

<div class="col-md-8 themed-grid-col">
    <div class="flex-shrink-0 p-3 bg-dark" style='width: 150%;'>
        <?php
        /*8. Web videojuego. Intenta hacer con diseño responsive (puedes usar Bootstrap)
        una web que muestre unas 7 fichas de personajes (o clases) de un videojuego.
        Ten en cuenta que toda la información mostrada debe salir de un array. Te
        recorres el array y muestras el resultado. Decide la información a mostrar, puedes
        usar alguna web de ejemplo e imitar el estilo.
        Ten en cuenta también que cada elemento de un array puede ser a su vez un
        array. Por ejemplo, para añadir varias características de un personaje, o varias
        fotos.*/

        $personajes = array(
            array(
                "nombre" => "Pekka", "descripcion" => "La P.E.K.K.A es una tropa que se desbloquea en el Cuartel estándar cuando se sube a nivel 10, lo que requiere un Ayuntamiento de nivel 8. Es una lenta y costosa tropa de combate cuerpo a cuerpo de un solo objetivo Tropa de Elixir que ocupa una gran cantidad de espacio en el cuartel pero viene con grandes cantidades de puntos de golpe y daño.", "categoria" => "Tropas terrestres, Tropas de elixir, Tropas",
                "foto" => "https://guiaclashofclans.com/wp-content/uploads/2014/10/PEKKA-296x300.png", "estilos" => array("http://guiaclashofclans.com/wp-content/uploads/2014/10/Pekka1.png", "http://guiaclashofclans.com/wp-content/uploads/2014/10/Pekka3.png", "http://guiaclashofclans.com/wp-content/uploads/2014/10/Pekka4.png", "http://guiaclashofclans.com/wp-content/uploads/2014/10/Pekka_5.png")
            ),
            array(
                "nombre" => "ARQUERAS", "descripcion" => "Resultan bastantes eficaces cuando necesitamos destruir los morteros que están rodeados de muralla defensiva pero debemos tener cuidado ya que su vida no es gran cosa, así que si podemos despistaremos al enemigo con gigantes o es su defecto no disponemos de bárbaros.", "categoria" => "Tropas, Tropas terrestres, Tropas de elixir oscuro",
                "foto" => "https://pbs.twimg.com/media/ENXo42dWsAEFjNu.jpg:large", "estilos" => array("http://img3.wikia.nocookie.net/__cb20140916151549/clashofclans/images/thumb/f/f4/Archer_lvl7.jpeg/100px-Archer_lvl7.jpeg", "http://img3.wikia.nocookie.net/__cb20140916151549/clashofclans/images/thumb/f/f4/Archer_lvl7.jpeg/100px-Archer_lvl7.jpeg", "http://img3.wikia.nocookie.net/__cb20140916151549/clashofclans/images/thumb/f/f4/Archer_lvl7.jpeg/100px-Archer_lvl7.jpeg", "http://img3.wikia.nocookie.net/__cb20140916151549/clashofclans/images/thumb/f/f4/Archer_lvl7.jpeg/100px-Archer_lvl7.jpeg")
            ),
            array(
                "nombre" => "Golem", "descripcion" => "El Gólem es una gran roca gris con vida con ojos color morado.
                En el nivel 3, el color del gólem pasa de ser gris a un gris oscuro y sus ojos se tornan un purpura más oscuro con un resplandor ligeramente más significativo.
                En el nivel 5, el color del gólem pasa a ser un color púrpura gris oscuro, además de que aparecen cristales morados en su espalda. ** En el nivel 6, aparecen más cristales en su espalda y estos a su ves se tornan de color rosa grisáceo.
                En el nivel 7, los cristales se vuelven mucho más grandes y dentados, y cambian de color a azul claro.
                En el nivel 8, los cristales cambian de color a un cielo azul
                En el nivel 9, su cuerpo se vuelve morado claro y los cristales de la espalda adquieren ese mismo color.", "categoria" => "Tropas, Tropas terrestres, Tropas de elixir oscuro",
                "foto" => "http://guiaclashofclans.com/wp-content/uploads/2014/10/gigante-1.jpg", "estilos" => array("http://guiaclashofclans.com/wp-content/uploads/2014/10/Gigante-nivel-7.png", "http://guiaclashofclans.com/wp-content/uploads/2014/10/gigante-6.png", "http://guiaclashofclans.com/wp-content/uploads/2014/10/gigante-5.png", "http://guiaclashofclans.com/wp-content/uploads/2014/10/gigante-1-mini.png")
            ),
            array(
                "nombre" => "MONTAPUERCOS", "descripcion" => "Es el nivel básico y no por ello es tan débil, pero debemos de protegerlos con hechizos curativos y con sanadoras. Necesitaremos tener desbloqueado el nivel de cuartel oscuro al nivel 2.", "categoria" => "Tropas, Tropas terrestres, Tropas de elixir",
                "foto" => "https://guiaclashofclans.com/wp-content/uploads/2014/10/MONTAPUERCOS.jpg", "estilos" => array("http://guiaclashofclans.com/wp-content/uploads/2014/10/montapuercos-nivel-6.png", "http://guiaclashofclans.com/wp-content/uploads/2014/10/montas-5.png", "http://guiaclashofclans.com/wp-content/uploads/2014/10/montas-3-4.png", "http://guiaclashofclans.com/wp-content/uploads/2014/10/montas-1-2.png")
            ),
            array(
                "nombre" => "Duende", "descripcion" => "En los niveles 1 y 2, están vistos como una criatura verde con los ojos rojos, unos pantalones cortos con tirantes y una bolsa marrón oscura.
                En los niveles 3 y 4, el duende en sí no cambiará en absoluto. Simplemente a su bolsa se le añadirán unas rayas.
                Al nivel 5 la bolsa pierde las rayas y se volverá unos tonos más clara. La diferencia notable es que les aparecerá un peinado de cresta rojiza oscura muy vistoso.
                Al nivel 6 , el rojo de la cresta se volverá un poquito más vivo y los tirantes rojos pasarán a ser una recia chaqueta de cota de malla.
                Al nivel 7, la cresta es más roja y larga.", "categoria" => "Tropas terrestres, Tropas de elixir, Tropas",
                "foto" => "http://guiaclashofclans.com/wp-content/uploads/2014/10/duende.png", "estilos" => array("http://guiaclashofclans.com/wp-content/uploads/2014/10/duende-1-y-2.png", "http://guiaclashofclans.com/wp-content/uploads/2014/10/duende-3-y-4.png", "http://guiaclashofclans.com/wp-content/uploads/2014/10/duende-5.png", "http://guiaclashofclans.com/wp-content/uploads/2014/10/duende-6.png")
            ),
            array(
                "nombre" => "Valquiria", "descripcion" => "Las valquirias son fieras guerreras con un cabello semi-largo de color naranja rojizo. Visten un largo taparrabos y una camisa corta, además de unas botas un poco altas. Se arma con un hacha de doble filo que sostiene con ambas manos.
                En los niveles 1 y 2, el hacha es plateada.
                En los niveles 3 y 4, el hacha es dorada.
                En el nivel 5, la valquiria tiene una capa de piel. similar a la del Gigante nivel 6.
                En el nivel 6, la valquiria lleva una corona en forma de V en su cabeza, y un lado de su hacha se vuelve ligeramente más brillante.
                En el nivel 8, se añaden alas doradas a la corona y su hacha pasa de ser dorada a plateada con un adorno en la parte inferior y otro en el centro del arma, ambos de color dorado.", "categoria" => "Tropas terrestres, Tropas de elixir, Tropas",
                "foto" => "https://guiaclashofclans.com/wp-content/uploads/2014/10/valkiria.jpg", "estilos" => array("http://guiaclashofclans.com/wp-content/uploads/2014/10/Valkyrie3-4.png", "http://guiaclashofclans.com/wp-content/uploads/2014/10/Valkyrie3-4.png", "http://guiaclashofclans.com/wp-content/uploads/2014/10/valquiria-1-2.png", "http://guiaclashofclans.com/wp-content/uploads/2014/10/valquiria-1-2.png")
            ),
            array(
                "nombre" => "BÁRBAROS", "descripcion" => "El bárbaro es con la primera tropa con la que empezamos el juego. A lo largo del tiempo y que vayamos desbloqueando otras tropas lo dejaremos un poco de lado, es una pena, pero es así.", "categoria" => "Tropas de la Base del constructor, Tropas terrestres, Tropas",
                "foto" => "http://pm1.narvii.com/6493/3c4709326ddf9f60cd7a0327106f660a3d68665d_00.jpg", "estilos" => array("http://guiaclashofclans.com/wp-content/uploads/2014/10/100px-Barbarian3-4.png", "http://guiaclashofclans.com/wp-content/uploads/2014/10/100px-Barbarian5.png", "http://guiaclashofclans.com/wp-content/uploads/2014/10/100px-Barbarian6.png", "http://guiaclashofclans.com/wp-content/uploads/2014/10/105px-Barbarian_7.png")
            ),

        );

        function pintar($personajes)
        {
            foreach ($personajes as $valor) {

                echo "<div class='card text-white bg-dark mb-3 text-left   align-items-center border-white'>
                <div class='row no-gutters'> <div class='col  d-flex flex-wrap align-items-center'>
                            <img src='" . $valor["foto"] . "' class='card-img w-50 rounded' alt='...'>
                            </div>
                            <div class='col'>
                            <div class='card-body'>

                                <h1 class='card-title h1 text-uppercase'>" . $valor["nombre"] . "</h1>
                                <p class='card-text h4'>" . $valor["descripcion"] . "</p>
                                <p class='card-text'><small class='text-muted'>" . $valor['categoria'] . "</small></p>";

                echo "
                <img src='" . $valor["estilos"][0] . "' class='img-fluid img-thumbnail rounded-circle' alt='...'>
                <img src='" . $valor["estilos"][1] . "' class='img-fluid img-thumbnail rounded-circle' alt='...'>
                <img src='" . $valor["estilos"][2] . "' class='img-fluid img-thumbnail rounded-circle' alt='...'>
                <img src='" . $valor["estilos"][3] . "' class='img-fluid img-thumbnail rounded-circle' alt='...'>
    
                                
                           
                            </div>
                            </div>
                            </div>

                        </div>";
            }
        }




        pintar($personajes);



        ?>
    </div>
</div>