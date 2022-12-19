<?php

class ControladorEnlace
{

    public static function insertar($nombre, $link, $precio, $imagen, $prioridad)
    {
        //LLamar al modelo para insertar
        EnlaceBD::insert($nombre, $link, $precio, $imagen, $prioridad);

        //Llamar a una vista para pintar
        ControladorRegalo::verEnlaces($_SESSION['idRegalo']);
    }
    public static function delete($id)
    {
        //LLamar al modelo para borrar
        EnlaceBD::del($id);

        //Llamar a una vista para pintar 
        ControladorRegalo::verEnlaces($_SESSION['idRegalo']);
    }



}



?>