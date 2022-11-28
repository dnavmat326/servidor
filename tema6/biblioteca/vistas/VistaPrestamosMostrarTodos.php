<?php

class VistaPrestamosMostrarTodos
{

    public static function render($prestamos)
    {

        include("./vistas/header.php");
        
        echo "<ul class='table table-bordered text-center' style='font-size: 15px;align-items: center;' id='sortable_list' width='100%' cellspacing='0'>";
        //Cabecera
        echo "<li id='listitem' class='clearfix header'>";
        echo "<div class='listitem_uno'> Libro </div>";
        echo "<div class='listitem_uno'> Usuario </div>";
        echo "<div class='listitem_uno'> fechaI </div>";
        echo "<div class='listitem_uno'> fechaF </div>";
        echo "<div class='listitem_uno'> estado </div>";
        echo "<div class='listitem_uno'> acciones </div>";
        echo "</li>";



        //Contenido
        $options = array(
            'Activo' => 'Activo',
            'Devuelto' => 'Devuelto',
            'Sobrepasado1Mes' => 'Sobrepasado1Mes',
            'Sobrepasado1Año' => 'Sobrepasado1Año'
        );
        
        foreach ($prestamos as $prestamo) {
            echo '<form action="./enrutador.php" method="get" name="update" id="update">';
            echo '<li id="listitem_1" class="clearfix">';
            echo "<div class='listitem_uno'>";
            echo $prestamo->titulo;
            echo '</div>';
            echo "<div class='listitem_uno'>";
            echo  $prestamo->nombre ;
            echo '</div>';
            echo "<div class='listitem_uno'>";

            echo '<input name="fechaI" type="date" value="' . $prestamo->getFecha_inicio() . '">';
            echo '</div>';
            echo "<div class='listitem_uno'>";

            echo '<input name="fechaF" type="date" value="' . $prestamo->getFecha_fin() . '">';
            echo '</div>';
            echo "<div class='listitem_uno'>";

?>
<select class="form-select" name="estado" id="estado" aria-label="Default select example">

        <?php foreach ($options as $var => $opt): ?>
        <option value="<?php echo $var ?>" <?php if ($var==$prestamo->getEstado()): ?>selected="selected"
            <?php endif; ?> >
            <?php echo $opt ?>
        </option>
        <?php endforeach; ?>
    </select>


<?php




            //Acciones
            echo '</div>';
            echo "<div class='listitem_uno'>";
            echo ' <input type="hidden" name="id" value="' . $prestamo->getIdPrestamo() . '"><input type="submit" value="Actualizar" name="update">';
            echo "</div>";
            echo "</li>";
            echo '</form>';

        }
        echo "</ul>";
       


        include("./vistas/footer.php");
    }

}
?>