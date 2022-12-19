<?php

class ControladorRegalo
{

    public static function login($email, $password)
    {

        if (UsuarioBD::check($email, $password) == true) {
            $_SESSION['usuario'] = $email;
            self::mostrarRegalos();
        } else {
            header("Location: login.php?error");
        }


    }


    public static function mostrarRegalos()
    {
        //LLamar al modelo para obtener todos los regalos en un array de Regalo
        $regalos = RegaloBD::getRegalos($_SESSION['usuario']);

        //Llamar a una vista para pintar 
        VistaRegalos::render($regalos);
    }

    public static function insertar($nombre, $destinatario, $precio, $estado, $year)
    {
        //LLamar al modelo para insertar
        RegaloBD::insert($nombre, $destinatario, $precio, $estado, $year);

        //Llamar a una vista para pintar 
        self::mostrarRegalos();
    }
    public static function delete($id)
    {
        //LLamar al modelo para borrar
        RegaloBD::del($id);

        //Llamar a una vista para pintar 
        self::mostrarRegalos();
    }

    public static function verEnlaces($id)
    {
        //LLamar al modelo para obtener todos los enlaces de un regalo
        $enlaces = EnlaceBD::getEnlaces($id);

        //Llamar a una vista para pintar 
        VistaEnlaces::render($enlaces);
    }
    public static function verEnlacesOrdenados($id)
    {
        //LLamar al modelo para obtener todos los enlaces ordenados de un regalo
        $enlaces = EnlaceBD::getEnlacesOrdenados($id);

        //Llamar a una vista para pintar 
        VistaEnlaces::render($enlaces);
    }


    public static function mostrarRegalosYear($year)
    {

        //LLamar al modelo para obtener todos los regalos de un year
        $regalos = RegaloBD::getRegalosYear($year);

        //Llamar a una vista para pintar 
        VistaRegalos::render($regalos);
    }

    public static function imprimir()
    {
        //Load Composer's autoloader
        require './vendor/autoload.php';

        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->setTitle('Regalos de Navidad');


        $pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->setFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set default font subsetting mode
        $pdf->setFontSubsetting(true);

        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.
        $pdf->setFont('dejavusans', '', 16, '', true);

        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage();

        // set text shadow effect
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

        // Set some content to print
        $regalos = RegaloBD::getRegalos($_SESSION['usuario']);
        $html = '
        <h1 style="text-align:center;">Regalos de Navidad</h1>';

        foreach ($regalos as $regalo) {
            $enlaces = EnlaceBD::getEnlaces($regalo->getIdRegalo());

            $html .= '<h4>Nombre del Regalo: ' . $regalo->getNombre() . '</h4>';
            $html .= '<h4>Destinatario: ' . $regalo->getDestinatario() . '</h4>';
            $html .= '<h4>Estado: ' . $regalo->getEstado() . '</h4>';
            $html .= '<h4>Fecha: ' . $regalo->getYear() . '</h4>';

            $html .= '<table>
            <thead>
              <tr>
                <th>Enlace</th>
                <th>Precio</th>
                <th>Link</th>
                <th>Prioridad</th>
            

              </tr>
            </thead>
            <tbody>';

            foreach ($enlaces as $enlace) {
                $html .= '<tr>
                        <td>' . $enlace->getNombre() . '</td>
                        <td>' . $enlace->getPrecio() . '€</td>
                        <td><a href="' . $enlace->getLink() . '">Link</a></td>
                        <td>' . $enlace->getPrioridad() . '</td>
                        
                        

                    </tr>';
            }
        }
        ;
        $html .= '</tbody>';

        $html .= "</table>";

        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

        // ---------------------------------------------------------
        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $flujo = $pdf->Output('regalos.pdf', 'S');
        file_put_contents("regalos.pdf", $flujo);

    }



}



?>