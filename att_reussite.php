<?php

use Dompdf\Dompdf;
use Dompdf\Options;

ob_start();

require_once 'att_reussite2.php';
$html=ob_get_contents();

ob_end_clean();
require_once 'dompdf/autoload.inc.php';
$dompdf=new Dompdf();
$options = new Options();
$options->setChroot(['en-tete .png','bas.png']);
$dompdf->setOptions($options);
$dompdf->loadHtml($html);

$dompdf->render();

$dompdf->setPaper('A3', 'landscape');
$fichier="attestationreussite.pdf";
$dompdf->stream($fichier);
?>