<?php
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new mPDF();
$email = $_POST['email'];
$info = $_POST['info'];



$data = '';

$data .= '<h1> Recete </h1>';
$data .= 'email' .$email. '<br />';
$data .= 'info' .$info. '<br />';

$mpdf->WriteHTML($data);
$mpdf->Output('myfile.pdf', 'D');

?>