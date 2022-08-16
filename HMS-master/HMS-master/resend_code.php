<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<?php
session_start();
include('Connection.php');

require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;




function resend_email_verify($username, $email, $verify_token){
    $mail = new PHPMailer(true);
    //try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                     
        $mail->isSMTP();                                            
        $mail->SMTPAuth   = true;                                   

        $mail->Host = "smtp.gmail.com";                   
        $mail->Username = 'testhhospital@gmail.com';                   
        $mail->Password = 'Hana123.';                               

        $mail->SMTPSecure = "tls";            
        $mail->Port = 587;                                    
    
       
        //Recipients
        $mail->setFrom('testhhospital@gmail.com', $username);
        $mail->addAddress($email);    
        $mail -> isHTML(true);
        //Content
        $mail->isHTML(true);                                 
        $mail->Subject = 'Verifikimi i email-it';
    
        $email_template = "
        <h2> Konfirmoni adresen tuaj te email-it duke klikuar linkun me poshte </h2>
        <br/><br/>
        <a href='http://localhost/hms-project/HMS-master/HMS-master/verify-email.php?token=$verify_token'>Klikoni ketu per te konfirmuar adresen tuaj te email-it</a>
        ";
        $mail->Body = $email_template;
        $mail->send();  
   
    // } catch (Exception $e) {
    //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    // }
}


if(isset($_POST['resend_email_btn'])){
    if(!empty(trim('email'))){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $email_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $email_query_run = mysqli_query($con, $email_query);
        if(mysqli_num_rows($email_query_run)>0){
            $row = mysqli_fetch_array($email_query_run);
            if($row['verify_status'] == '0'){
                $username = $row['username'];
                $email = $row['email'];
                $verify_token = $row['verify_token'];
                resend_email_verify($username, $email, $verify_token);
                $_SESSION['status'] = "Email-i verifikues eshte derguar tashme !";
                header("Location: login.php"); 
                exit(0);
            }else{
               $_SESSION['status'] = "Ky email eshte i verifikuar tashme. Ju mund te logoheni";
               header("Location: login.php"); 
               exit(0);
            }
           

        }else{
            $_SESSION['status'] = "Ky email nuk eshte i regjistruar. Regjistrohuni !";
            header("Location: register.php"); 
            exit(0);
        }

    }else{
        $_SESSION['status'] = "Ju lutem plotesoni email-in !";
        header("Location: resend_email_verification.php");
        exit(0);
    }
}

?>