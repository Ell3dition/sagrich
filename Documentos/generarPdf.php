<?php
require_once '../Vistas/plugins/pdf/vendor/autoload.php';

use Dompdf\Dompdf;
ob_start();
include_once './index.php';
$dompdf = new Dompdf();
$dompdf->loadHtml(ob_get_clean());
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("Contrato.pdf", array("Attachment" => false));

