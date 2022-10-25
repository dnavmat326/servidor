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
    <div class="flex-shrink-0 p-3 bg-white">
        <?php
        /*7. Vamos a crear una librería online, pero con los libros almacenados en un array
        asociativo. Los datos a guardar por cada libro son: ISBN, título, descripción,
        categoría, editorial, foto, precio.
        - La categoría puede ser: ciencias, cocina, deporte, novela, historia, scifi,
        negra, romántica.
        - El campo foto será una url en tu pc en la misma carpeta que esté el fichero
        php nos crearemos una carpeta imgs donde meteremos las imágenes de
        cada libro llamándolas con el isbn.jpg. El tamaño de cada imagen será
        aproximadamente 100x150px.
        - ISBN será un número de trece dígitos que se puede tratar como una
        cadena.
        - Precio será un float con dos decimales.
        A continuación, te muestro cómo debería quedar la visualización del array. Tienes que
        intentar que sea lo más parecido posible. Como mínimo deberás tener 15 libros, y
        mostrar 4 libros en cada fila. Los datos e imágenes de los libros deben ser lo más
        reales posible. Debes tener como mínimo 5 libros de novela histórica y 5 de novela
        negra, pero sólo mostraremos los 4 primeros de cada una de esas categorías.*/

        $libreria = array(
            array(
                "isbn" => "001", "titulo" => "uno", "descripcion" => "ejemplo", "categoria" => "ciencia",
                "editorial" => "editorial1", "foto" => "https://www.sopadelibros.com/portadas/9788467050110.jpeg", "precio" => 10.50
            ),
            array(
                "isbn" => "002", "titulo" => "dos", "descripcion" => "ejemplo", "categoria" => "cocina",
                "editorial" => "editorial1", "foto" => "https://m.media-amazon.com/images/I/91aojtuukNL.jpg", "precio" => 10.20
            ),
            array(
                "isbn" => "003", "titulo" => "tres", "descripcion" => "ejemplo", "categoria" => "deporte",
                "editorial" => "editorial1", "foto" => "https://m.media-amazon.com/images/I/91c7aUPgJnL.jpg", "precio" => 9.50
            ),
            array(
                "isbn" => "004", "titulo" => "cuatro", "descripcion" => "ejemplo", "categoria" => "deporte",
                "editorial" => "editorial1", "foto" => "https://www.libreriadeportiva.com/imagenes/9788480/978848019984.JPG", "precio" => 8.70
            ),
            array(
                "isbn" => "005", "titulo" => "cinco", "descripcion" => "ejemplo", "categoria" => "deporte",
                "editorial" => "editorial1", "foto" => "https://www.libreriadeportiva.com/foto/muestraPortada.php?id=9788428536714&size=big", "precio" => 10.80
            ),
            array(
                "isbn" => "006", "titulo" => "seis", "descripcion" => "ejemplo", "categoria" => "negra",
                "editorial" => "editorial2", "foto" => "https://media.vogue.es/photos/601188762e1231edb3ef54e6/master/w_383,h_600,c_limit/5206.jpg", "precio" => 11.50
            ),
            array(
                "isbn" => "007", "titulo" => "siete", "descripcion" => "ejemplo", "categoria" => "negra",
                "editorial" => "editorial2", "foto" => "https://media.vogue.es/photos/601188762e1231edb3ef54e7/master/w_1703,h_2594,c_limit/0a474590-1080-491e-9824-e059bc3a880e.jpg", "precio" => 14.80
            ),
            array(
                "isbn" => "008", "titulo" => "ocho", "descripcion" => "ejemplo", "categoria" => "negra",
                "editorial" => "editorial2", "foto" => "https://images.ecestaticos.com/xNd9TwLHLE1B8rjJyJgsjmV0gyw=/9x9:1663x2552/1440x1920/filters:fill(white):format(jpg)/f.elconfidencial.com%2Foriginal%2F2c0%2F589%2F866%2F2c058986660f00a191429386af2cb799.jpg", "precio" => 16.90
            ),
            array(
                "isbn" => "009", "titulo" => "nueve", "descripcion" => "ejemplo", "categoria" => "negra",
                "editorial" => "editorial2", "foto" => "https://www.cinconoticias.com/wp-content/uploads/Mejores-novelas-negras-luna-roja.jpg.jpg", "precio" => 6.50
            ),
            array(
                "isbn" => "010", "titulo" => "diez", "descripcion" => "ejemplo", "categoria" => "negra",
                "editorial" => "editorial2", "foto" => "https://m.media-amazon.com/images/I/51tsKPGRQ0L._SL500_.jpg", "precio" => 4.20
            ),
            array(
                "isbn" => "011", "titulo" => "once", "descripcion" => "ejemplo", "categoria" => "historia",
                "editorial" => "editorial3", "foto" => "https://pictures.abebooks.com/isbn/9786586041484-es-300.jpg", "precio" => 10.20
            ),
            array(
                "isbn" => "012", "titulo" => "doce", "descripcion" => "ejemplo", "categoria" => "historia",
                "editorial" => "editorial3", "foto" => "https://images-na.ssl-images-amazon.com/images/I/41gCJbWqSgL.jpg", "precio" => 10.50
            ),
            array(
                "isbn" => "013", "titulo" => "trece", "descripcion" => "ejemplo", "categoria" => "historia",
                "editorial" => "editorial3", "foto" => "https://cdn.zendalibros.com/wp-content/uploads/historia-de-la-filosofia-crayling.jpg", "precio" => 16.70
            ),
            array(
                "isbn" => "014", "titulo" => "catorce", "descripcion" => "ejemplo", "categoria" => "historia",
                "editorial" => "editorial3", "foto" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSz_CPcBIyY9GqRt9ZoqwcZqPQnYAnkPD578q8VA1fiLbwrmoaTzp9hjyJAPsvZMY-wOiw&usqp=CAU", "precio" => 20.20
            ),
            array(
                "isbn" => "015", "titulo" => "quince", "descripcion" => "ejemplo", "categoria" => "historia",
                "editorial" => "editorial3", "foto" => "http://grupoalmuzara.com/libro/9788417044404_portada.jpg", "precio" => 15.50
            ),
        );

        function pintarPorCategoria($productos, $categoria)
        {
            echo "<h2>" . ucfirst($categoria) . "</h2>";
            $contador = 0;
            foreach ($productos as $valor) {

                if ($valor['categoria'] == $categoria) {

                    if ($contador == 4) {
                        break;
                    }

                    $contador++;

                    echo "<div class='card bg-light mb-5' style='width: 12rem;'>
                            <img src='" . $valor["foto"] . "' class='card-img-top' alt='...'>
                                <div class='card-body'>
                                <h4 class='card-title'>" . $valor["titulo"] . "</h4>
                                <p class='card-text'>" . $valor['descripcion'] . "</p>";

                    echo "
                                <p class='card-text'><small class='text-secondary'>" . $valor["precio"] . " €</small></p>
    
                                
                            </div>
                        </div>";
                }
            }
        }

        echo "<div class='container'>";
        echo "<div class='row'>";

        $categorias = array_column($libreria, "categoria");
        $categorias = array_unique($categorias);

        foreach ($categorias as $categoria) {
            pintarPorCategoria($libreria, $categoria);
        }

        echo "</div>";
        echo "</div>";


        ?>
    </div>
</div>