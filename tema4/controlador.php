<?php
session_start();
//session_destroy();
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require './vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

function dias_pasados($fecha_inicial, $fecha_final)
{
    $dias = (strtotime($fecha_inicial) - strtotime($fecha_final)) / 86400;
    $dias = abs($dias);
    $dias = floor($dias);
    return $dias;
}
date_default_timezone_set('UTC');

if (isset($_POST['email'])) {

    $array = str_split($_POST['password']);
    $mayuscula = false;
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] == strtoupper($array[$i])) {
            $mayuscula = true;
            break;
        }
    }

    if (strlen($_POST['password']) >= 8 && $mayuscula == true) {
        $_SESSION['usuario'] = $_POST['email'];
        header("Location: index.php");
    } else {
        header("Location: login.php?error");
    }
}

if (isset($_POST['add'])) {
    if (empty($_SESSION["proyectos"])) {
        $id = 0;
    } else {
        $idd = array_column($_SESSION["proyectos"], 'id');
        $id = max($idd) + 1;
    }

    $proyectos = ["id" => $id, "nombre" => $_POST['nombre'], "fechaI" => $_POST['fechaI'], "fechaF" => $_POST['fechaF'], "dias" => dias_pasados($_POST['fechaI'], date("Y-m-d")), "porcentaje" => $_POST['porcentaje'], "importancia" => $_POST['importancia']];

    $_SESSION['proyectos'][] = $proyectos;
    header("Location: index.php");
}

//Acción de eliminar todos los proyectos
if ($_GET['accion'] == "eliminarTodo") {
    $_SESSION['proyectos'] = array();
    header("Location: index.php");
}

//Acción de imprimir todos los proyectos
if ($_GET['accion'] == "imprimir") {

    //Load Composer's autoloader
    require './vendor/autoload.php';



    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // set document information
    $pdf->setCreator(PDF_CREATOR);
    $pdf->setAuthor('Diego');
    $pdf->setTitle('Proyectos de mi empresa');
    $pdf->setSubject('Proyectos');
    $pdf->setKeywords('PHP, PDF, proyectos');

    // set default header data
    //$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
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
    $pdf->setFont('dejavusans', '', 12, '', true);

    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage();

    // set text shadow effect
    $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

    // Set some content to print
    $html = "
<h1>PROYECTOS</h1>
<i>Servidor PHP</i><br><br>";
    $html .= "<table border='1'>";
    $html .= "<tr><td>Nombre</td><td>FechaInicio</td><td>FechaFin</td><td>Dias</td><td>Porcentaje</td><td>Importancia</td></tr>";

    foreach ($_SESSION["proyectos"] as $proyecto) {
        $html .= "<tr>";
        $html .= "<td>" . $proyecto['nombre'] . "</td>";
        $html .= "<td>" . date('d/m/Y', strtotime($proyecto["fechaI"])) . "</td>";
        $html .= "<td>" . date('d/m/Y', strtotime($proyecto["fechaF"])) . "</td>";
        $html .= "<td>" . $proyecto["dias"] . "</td>";
        $html .= "<td>" . $proyecto["porcentaje"] . "</td>";
        $html .= "<td>" . $proyecto["importancia"] . "</td>";

        $html .= "</tr>";
    }

    $html .= "</table>";

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

    // ---------------------------------------------------------



    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.
    $flujo = $pdf->Output('ejemplo.pdf', 'S');
    file_put_contents("ejemplo.pdf", $flujo);



    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'ejemploclasephp@gmail.com';                     //SMTP username
        $mail->Password   = 'lihdzvxxuunsofqf';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('ejemploclasephp@gmail.com', 'ejemploclasephp');
        $mail->addAddress($_SESSION['usuario'], $_SESSION['usuario']);     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        $mail->addAttachment('./ejemplo.pdf', 'ejemplo.pdf');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Correo de mi página de proyectos';
        $mail->Body    = 'Este el cuerpo del mensaje <b>ojo, viene con adjunto!</b>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    header("Location: index.php");
}

//Acción de eliminar un proyecto
if ($_GET['accion'] == "eliminar") {

    unset($_SESSION["proyectos"][$_GET["id"]]);


    header("Location: index.php");
}

if ($_GET['accion'] == "salir") {

    session_destroy();


    header("Location: login.php");
}
