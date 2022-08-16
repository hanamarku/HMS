<?php
session_start();
include("Connection.php");

require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function send_password_reset($username, $email, $token){
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
        <h2> Email per rivendosjen e fjalekalimit </h2>
        <br/><br/>
        <a href='http://localhost/hms-project/HMS-master/HMS-master//reset_forgoten_password.php?token=$token&email=$email'>Kliko ketu per te rivendosur fjalekalimin</a>
        ";
        $mail->Body = $email_template;
        $mail->send();  
   
    // } catch (Exception $e) {
    //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    // }
}


if(isset($_POST['reset_password_link'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $token = md5(rand());
    $check_email = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email_run = mysqli_query($con, $check_email);
    if(mysqli_num_rows($check_email_run)>0){
        $row = mysqli_fetch_array($check_email_run);
        $username = $row['username'];
        $email = $row['email'];
        $update_token = "UPDATE users SET verify_token='$token' WHERE email = '$email' LIMIT 1";
        $update_token_run = mysqli_query($con, $update_token);
        if($update_token_run){
            send_password_reset($username, $email, $token);
            $_SESSION['status'] = "Kontrolloni email-in tuaj per te rivendosur fjalekalim te ri!";
            header("Location: forgot_password.php"); 
            exit(0);

        }else{
            $_SESSION['status'] = "Dicka ka shkuar gabim. Provoni perseri!";
            header("Location: forgot_password.php"); 
            exit(0);
        }


    }else{
        $_SESSION['status'] = "Ky email nuk eshte i regjistruar. Regjistrohuni !";
            header("Location: forgot_password.php"); 
            exit(0);
    }
}


if(isset($_POST['update_password'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $fjalekalim_i_ri = mysqli_real_escape_string($con, $_POST['fjalekalim_i_ri']);
    $konf_fjalekalim = mysqli_real_escape_string($con, $_POST['konf_fjalekalim']);
    $token = mysqli_real_escape_string($con, $_POST['password_token']);

    if(!empty($token)){
        if(!empty($email) && !empty($fjalekalim_i_ri) && !empty($konf_fjalekalim)){
            $check_token = "SELECT verify_token FROM users WHERE verify_token='$token' LIMIT 1";
            $check_token_run =  mysqli_query($con, $check_token);
            if(mysqli_num_rows($check_token_run)>0){
                if($fjalekalim_i_ri == $konf_fjalekalim){
                    $update_pass = "UPDATE users SET fjalekalimi='$fjalekalim_i_ri' WHERE verify_token='$token' LIMIT 1";
                    $update_pass_run =  mysqli_query($con, $update_pass);
                    if($update_pass_run){
                        $_SESSION['status'] = "Fjalekalimi u ndryshua me sukses ";
                        header("Location: login.php"); 
                        exit(0); 
                    }else{
                        $_SESSION['status'] = "Fjalekalimi nuk eshte ndryshuar ! Deshtim ";
                        header("Location: login.php"); 
                        exit(0); 
                    }
                }else{
                    $_SESSION['status'] = "Fjalekalimet nuk perputhen !";
                    header("Location: reset_password.php?token=$token&email=$email"); 
                    exit(0); 
                }

            }else{
                $_SESSION['status'] = "Dicka ka deshtuar ! Provoni perseri !";
                header("Location: reset_password.php?token=$token&email=$email"); 
                exit(0); 
            }
        }else{
            $_SESSION['status'] = "Plotesoni te gjitha fushat ! ";
            header("Location: reset_password.php?token=$token&email=$email"); 
            exit(0); 
        }
    }else{
        $_SESSION['status'] = "Dicka ka deshtuar ! Provoni perseri ! ";
        header("Location: reset_password.php"); 
        exit(0); 
    }
    

}

?>