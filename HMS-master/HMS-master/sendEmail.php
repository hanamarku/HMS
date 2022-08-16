
<?php
use PHPMailer\PHPMailer\PHPMailer;
if(isset($_POST['emri']) && isset($_POST['email'])){

    $emri=$_POST['emri'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $body=$_POST['body'];

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();
    // smtp settings
    $mail->isSMTP();                                            
    $mail->SMTPAuth = true;                                   

    $mail->Host = "smtp.gmail.com";                   
    $mail->Username = 'testhhospital@gmail.com';                   
    $mail->Password = 'Hana123.';                               

    $mail->SMTPSecure = "ssl";            
    $mail->Port = 465;                                    


    $mail->isHTML(true);
    $mail->setFrom($email, $emri);
    $mail->addAddress("testhhospital@gmail.com");
    $mail->Subject=$subject;

$message = "<html><body>";
$message .= "<p >Emri :".$_POST['emri']  ."</p>";
$message .= "<p>Email : ". $_POST['email'] ."</p>";
$message .= "<p>Message :".$_POST['body']."</p>";
$message .= "</body></html>";

    $mail->Body= $message;

    if($mail->send()){
        $status="success";
        $response="Email u dergua me sukses!";

    }
    else{
        $status="failed";
        $response="Dicka shkoi keq:<br>" . $mail->ErrorInfo;

    }
    exit(json_encode(array("status" => $status, "response" =>$response)));         
}           

?>
