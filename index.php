<?php

require_once __DIR__ . '/vendor/autoload.php';

use Dompdf\Dompdf;

if (!isset($_POST['pdf']) && !isset($_POST['download-pdf']) && !isset($_GET['id'])) {


    require_once('isankstine-form.php');
} else {

    require_once('isankstine-pdf.php');

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    $pdf = file_get_contents('isankstine-pdf.php');

    $dompdf->loadHtml('isankstine.pdf', $pdf);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

    // Render the HTML as PDF
    $dompdf->render('isankstine.pdf');
    // file_put_contents('isankstine.pdf', $result);
    $dompdf->stream('isankstine.pdf');

    $output = $dompdf->output('isankstine.pdf');
}
