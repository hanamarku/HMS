<?php
session_start();
require "Connection.php";
require '../includes/PHPMailer.php';
require '../includes/SMTP.php';
require '../includes/Exception.php';
require 'dompdf/autoload.inc.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Dompdf\Dompdf;

$id = $_SESSION['appointmentID'];
$query_email = "SELECT u.email, u.emri, u.mbiemri, u.username, r.doctor, r.date, r.hour FROM users u JOIN rezervimet r ON u.Id = r.patient_Id WHERE r.Id = '$id' LIMIT 1";
$query_email_run = mysqli_query($con, $query_email);
    if(mysqli_num_rows($query_email_run)>0){
        $row = mysqli_fetch_array($query_email_run);
        $email = $row['email'];
        $doctor = $row['doctor'];
        $date = $row['date'];
        $hour = $row['hour'];
        $username = $row['username'];
        $emri = $row['emri'];
        $mbiemri = $row['mbiemri'];
    }

$dompdf = new Dompdf();
$receta = $_POST['receta'];
$ilaci = $_POST['ilaci'];
$sasia = $_POST['sasia'];
$orari = $_POST['orari'];

$username = $_SESSION['username'];


$filepath= 'http://localhost/hms-project/HMS-master/HMS-master/Doctor/logo.png'; 


$data = '';

$data .= "<img src='<?= $filepath; ?>'". '<br />'; 
$data .= "<img src='http://localhost/hms-project/HMS-master/HMS-master/Doctor/logo.png'>";
 $data .= '<h1>Spitali Heal & Health </h1>'. '<br />'. '<br />'. '<br />';
 $data .= '<h3 style = "color:red;">Data : '. date("d/m/Y") .' </h3><br />';
 $data .= '<h3 style = "color:red;">Data e takimit : '. $date.' </h3><br />';
 $data .= '<h1 style = "color:blue; text-align:center;">Recete mjekesore </h1>'. '<br />'. '<br />'. '<br />';
 $data .= '<h3>Pacienti (emer / mbiemer): '. $emri. " ". $mbiemri.'</h3><br />';
 $data .= '<h3 class="dotted" style = "border-style: dotted;border-color:red;">Receta: <br /> Ilac -> '. $ilaci. " ne sasi -> ".$sasia. " ne oraret -> ".$orari.'</h3> <br />';
 $data .= '<h3 class="dotted" style = "border-style: dotted;border-color:blue;">Udhezime: <br />'. $receta.'</h3> <br />';

$dompdf->loadHtml($data);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

 $pdf = $dompdf->stream("myfile.pdf", ['Attachment'=>false]);
 sendemail_verify($data);



function sendemail_verify($data){
    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                     
        $mail->isSMTP();                                            
        $mail->SMTPAuth   = true;                                   

        $mail->Host = "smtp.gmail.com";                   
        $mail->Username = 'testhhospital@gmail.com';                   
        $mail->Password = 'Hana123.';                               

        $mail->SMTPSecure = "tls";            
        $mail->Port = 587;                                    
    
       
        //Recipients
        $mail->setFrom('testhhospital@gmail.com', $username);
        $mail->addAddress('hana.marku22@gmail.com');   
        

        $mail -> isHTML(true);
        //Content
        $mail->isHTML(true);                                 
        $mail->Subject = 'Recete';
    
        $email_template = "$data";
        
        $mail->Body = $email_template;
        $mail->send();  
   
    } catch (Exception $e) {
        echo "Emaili nuk eshte derguar. Gabimi: {$mail->ErrorInfo}";
    }
}

?>