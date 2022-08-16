<?php
include('db.php');
define('BASEPATH', true); 
session_start();


//Include required PHPMailer files
require '../includes/PHPMailer.php';
require '../includes/SMTP.php';
require '../includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



function sendemail_verify($email, $username, $emri, $mbiemri, $hour, $date){
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
        $mail->setFrom('testhhospital@gmail.com',  $username);
        $mail->addAddress($email);    
        $mail -> isHTML(true);
        //Content
        $mail->isHTML(true);                                 
        $mail->Subject = 'Anulim takimi';
    
        $email_template = "
        <h2> Pershendetje $username ! </h2>
        <br/><br/>
        <h2> Pacienti $emri $mbiemri ka anuluar takimin e dates $date ne oren $hour </h2>
        
        ";
        $mail->Body = $email_template;
        $mail->send();  
   
    } catch (Exception $e) {
        echo "Emaili nuk eshte derguar. Gabimi: {$mail->ErrorInfo}";
    }
}

    $name =  explode(' ', $_POST['doctor']);

    $surname = $name[1];
    $name = $name[0];

$id = $_GET['id'];
$query_email = "SELECT u.email, u.username, u.emri, u.mbiemri, r.doctor, r.date, r.hour FROM users u JOIN rezervimet r ON u.emri = '$name' AND u.mbiemri = '$surname' WHERE r.Id = '$id' LIMIT 1";
$query_email_run = mysqli_query($con, $query_email);
    if(mysqli_num_rows($query_email_run)>0){
        $row = mysqli_fetch_array($query_email_run);
        $email = $row['email'];
        $date = $row['date'];
        $hour = $row['hour'];
        $username = $row['username'];
        $emri = $row['emri'];
        $mbiemri = $row['mbiemri'];
    }

$tables = array("rezervimet");
foreach($tables as $table) {
  $query = "DELETE FROM $table WHERE id='$id'";
  mysqli_query($con,$query);
}
        sendemail_verify($email, $username, $emri, $mbiemri, $hour, $date);
		header('location:/hms-project/HMS-master/HMS-master/Patient/appointments_pacient.php');
?>