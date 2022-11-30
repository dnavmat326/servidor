<?php

class VistaPrestamosMostrarTodos
{

    public static function render($prestamos)
    {

        include("./vistas/header.php");
        //Contenido
        $options = array(
            'Activo' => 'Activo',
            'Devuelto' => 'Devuelto',
            'Sobrepasado1Mes' => 'Sobrepasado1Mes',
            'Sobrepasado1Año' => 'Sobrepasado1Año'
        );
echo '<div class="card-deck">
';
        foreach ($prestamos as $prestamo) {
            echo '  <div class="col-sm-6">';
            echo '<form action="./enrutador.php" method="get" name="update" id="update">';
            echo '<div class="card text-white bg-dark mb-3">
            <h5 class="card-header">Usuario: ' . $prestamo->nombre . '</h5>
            <div class="card-body">
            <h5 class="card-title">Libro: ' . $prestamo->titulo . '</h5>
            <p class="card-text">Fecha de Inicio: <input name="fechaI" type="date" value="' . $prestamo->getFecha_inicio() . '"></p>
            <p class="card-text">Fecha de Fin: <input name="fechaF" type="date" value="' . $prestamo->getFecha_fin() . '"></p>
            <p class="card-text">Estado del préstamo';
?>
<select class="form-select" name="estado" id="estado" aria-label="Default select example">

    <?php foreach ($options as $var => $opt): ?>
    <option value="<?php echo $var ?>" <?php if ($var==$prestamo->getEstado()): ?>selected="selected"
        <?php endif; ?>>
        <?php echo $opt ?>
    </option>
    <?php endforeach; ?>
</select>




<?php





            echo '</p>
            <input type="hidden" name="id" value="' . $prestamo->getIdPrestamo() . '"><input type="submit" value="Actualizar" name="update" class="btn btn-success">
            </div>
            </div>';
            echo '</form>';
            echo '</div>';
        }

echo '</div>';


        include("./vistas/footer.php");
    }

}
    ?>