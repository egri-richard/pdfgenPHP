<?php

require '../vendor/autoload.php';
require_once 'db.php';

use Dompdf\Dompdf;
use Petrik\Egridr\Tiger;

$content = "Egri Dániel Állatkert\n";

$tableData = Tiger::getAll();

$content .= "<ul>";
foreach($tableData as $row) {
    $content .= "<li>".$row->toString()."</li>";
}
$content .= "</ul>";

$content = "<div style='font-family: DejaVu Sans'>$content</div>";

$data = new Dompdf();
$data->loadHtml($content);
$data->setPaper('A4', 'landscape');
$data->render();
$data->stream();
