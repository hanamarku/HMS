<?php 
session_start();
include "config.php";
require '../../includes/PHPMailer.php';
require '../../includes/SMTP.php';
require '../../includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



function sendemail_verify(): void{
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
        $mail->setFrom('testhhospital@gmail.com');
        $mail->addAddress('hana.marku22@gmail.com');    
        $mail -> isHTML(true);
        //Content
        $mail->isHTML(true);                                 
        $mail->Subject = 'Verifikimi i email-it';
    
        $email_template = "
        <h2> Llogaria juaj ne spitalin Health & Heal eshte fshire testi. </h2>
        <br/><br/>
        
        ";
        $mail->Body = $email_template;
        $mail->send();  
   
    } catch (Exception $e) {
        echo "Emaili nuk eshte derguar. Gabimi: {$mail->ErrorInfo}";
    }
}



if(isset($_POST['id'])){
   $id=  $_POST['id'];
   $sql = "DELETE FROM users WHERE id=".$id;
   mysqli_query($con,$sql);
   echo 1;
   $_SESSION['prova1'] = 1;
   exit; 
}

echo 0;
exit;

if($_SESSION['prova1'] == 1){
   sendemail_verify();
}