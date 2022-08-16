<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
session_start();
?>

<?php



require "Connection.php";
$error_username=$error_fjalekalimi=$error_konfirmo_fjalekalimin=$rregj_sukses=$confirm="";
define('BASEPATH', true); 
require 'db.php';

//Include required PHPMailer files
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;




//Load Composer's autoloader
//require_once __DIR__ ."/vendor/autoload.php";

function sendemail_verify($username, $email, $verify_token){
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
        $mail->setFrom('testhhospital@gmail.com', $username);
        $mail->addAddress($email);    
        $mail -> isHTML(true);
        $mail->isHTML(true);                                 
        $mail->Subject = 'Verifikimi i email-it';
    
        $email_template = "
        <h2> Konfirmoni adresen tuaj te email-it duke klikuar linkun me poshte </h2>
        <br/><br/>
        <a href='http://localhost/hms-project/HMS-master/HMS-master/verify-email.php?token=$verify_token'>Klikoni ketu per te verifikuar email-in tuaj</a>
        ";
        $mail->Body = $email_template;
        $mail->send();  
   
    } catch (Exception $e) {
        echo "Emaili nuk eshte derguar. Gabimi: {$mail->ErrorInfo}";
    }
}

if (!empty($_POST["username"])) {
	$query = "SELECT * FROM users WHERE username='" . $_POST["username"] . "'";
	$result = mysqli_query($con, $query);
	$count = mysqli_num_rows($result);
	if ($count > 0) {
		echo "<span style='color:red'>Ky username egziston tashmë. Provoni një username tjetër. .</span>";
		echo "<script>$('#rregjistrohu').prop('disabled',true);</script>";
        echo "<script>$('#rregjistrohu').css('background-color','grey');</script>";
	} else {
		echo "<script>$('#rregjistrohu').prop('disabled',false);</script>";
        echo "<script>$('#rregjistrohu').css('background-color','blue');</script>";
	}
}else if (!empty($_POST["email"])) {
	$query = "SELECT * FROM users WHERE email='" . $_POST["email"] . "'";
	$result = mysqli_query($con, $query);
	$count = mysqli_num_rows($result);
	if ($count > 0) {
		echo "<span style='color:red'> Ky email ekziston tashme.</span>";
		echo "<script>$('#rregjistrohu').prop('disabled',true);</script>";
        echo "<script>$('#rregjistrohu').css('background-color','grey');</script>";
	} else {
		echo "<script>$('#rregjistrohu').prop('disabled',false);</script>";
        echo "<script>$('#rregjistrohu').css('background-color','blue');</script>";
	}
}



// $temp = 0;
// if (!empty($_POST["username"])) {
// 	$query = "SELECT * FROM users WHERE username='" . $_POST["username"] . "'";
// 	$result = mysqli_query($con, $query);
// 	$count = mysqli_num_rows($result);
// 	if ($count > 0) {
// 		echo "<span style='color:red'>Ky username egziston tashmë. Provoni një username tjetër. .</span>";
// 		echo "<script>$('#rregjistrohu').prop('disabled',true);</script>";
//         echo "<script>$('#rregjistrohu').css('background-color','grey');</script>";
//         $temp++;
// 	} else {
//         $temp--;
//         if($temp == 0){            
//             echo "<script>$('#rregjistrohu').prop('disabled',false);</script>";
//             echo "<script>$('#rregjistrohu').css('background-color','blue');</script>";
//         }
// 	}
// }if (!empty($_POST["email"])) {
// 	$query = "SELECT * FROM users WHERE email='" . $_POST["email"] . "'";
// 	$result = mysqli_query($con, $query);
// 	$count = mysqli_num_rows($result);
// 	if ($count > 0) {
// 		echo "<span style='color:red'> Ky email ekziston tashme.</span>";
// 		echo "<script>$('#rregjistrohu').prop('disabled',true);</script>";
//         echo "<script>$('#rregjistrohu').css('background-color','grey');</script>";
//         $temp++;
// 	} else {
//         $temp--;
//         if($temp == 0){            
//             echo "<script>$('#rregjistrohu').prop('disabled',false);</script>";
//             echo "<script>$('#rregjistrohu').css('background-color','blue');</script>";
//         }
// 	}
// }


// if (!empty($_POST["email"]) && !empty($_POST["username"]) ) {
// 	$query = "SELECT * FROM users WHERE username='" . $_POST["username"] . "' AND email='" . $_POST["email"] . "'";
// 	$result = mysqli_query($con, $query);
// 	$count = mysqli_num_rows($result);
// 	if ($count > 0) {
// 		echo "<span style='color:red'>Ky username egziston tashmë. Provoni një username tjetër. .</span>";
// 		echo "<script>$('#rregjistrohu').prop('disabled',true);</script>";
//         echo "<script>$('#rregjistrohu').css('background-color','grey');</script>";
// 	} else {
// 		echo "<script>$('#rregjistrohu').prop('disabled',false);</script>";
//         echo "<script>$('#rregjistrohu').css('background-color','blue');</script>";
// 	}
// }

if(isset($_POST['rregjistrohu'])){
        if(isset($_POST['emri']) || isset($_POST['mbiemri']) || isset($_POST['username']) 
        || isset($_POST['nr_telit']) || isset($_POST['email']) || isset($_POST['datelindja']) || isset($_POST['fjalekalimi'])
        || isset($_POST['konfirmo_fjalekalim']) || isset($_POST['gjinia'])){
            $emri = mysqli_real_escape_string($con,$_POST['emri']);
            $mbiemri = mysqli_real_escape_string($con,$_POST['mbiemri']);
            $username = mysqli_real_escape_string($con,$_POST['username']);
            $nr_telit = mysqli_real_escape_string($con,$_POST['nr_telit']);
            $email = mysqli_real_escape_string($con,$_POST['email']);
            $datelindja = mysqli_real_escape_string($con,$_POST['datelindja']);
            $fjalekalimi = mysqli_real_escape_string($con,$_POST['fjalekalimi']);
            $konfirmo_fjalekalimin = mysqli_real_escape_string($con,$_POST['konfirmo_fjalekalim']);
            $gjinia = mysqli_real_escape_string($con,$_POST['gjinia']);
            // $roleId = mysqli_real_escape_string($con,$_POST['roleId']);
            $roleId = 0;
            $verify_token = md5(rand());

        try {
            $dsn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $fjalekalimi = md5($fjalekalimi); 

            // $fjalekalimi = password_hash($fjalekalimi, PASSWORD_DEFAULT);
            // PASSWORD_BCRYPT, array("cost" => 12)
            $sql1 = "SELECT COUNT(username) AS num  FROM users WHERE username = :username";
                $stmt = $pdo->prepare($sql1);
                $stmt->bindValue(':username', $username);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
               
            $sql2 = "SELECT COUNT(email) AS emailCount  FROM users WHERE email = :email";
                $stmt = $pdo->prepare($sql2);
                $stmt->bindValue(':email', $email);
                $stmt->execute();
                $row2 = $stmt->fetch(PDO::FETCH_ASSOC);

            if($row['num'] > 0){
                    // echo "<span id='check-usernameValid' style='color:red'>Ky username egziston tashmë. Provoni një username tjetër !</span>";
	                // echo "<script>$('#rregjistrohu').prop('disabled',true);</script>";
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { swal({
                        title: "Ky username egziston tashmë!",
                        text: "Provoni një username tjetër!",
                        icon: "warning",
                        buttons: false,
                        timer: 2000,
                      });';
                    echo '}, 100);</script>';
                    $rregj_sukses="Ky username egziston tashmë. Provoni një username tjetër.";
                    header("Location: register.php"); 
            } else if($row2['emailCount'] > 0){
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { swal({
                        title: "Ky email egziston tashmë!",
                        text: "Provoni një email tjetër!",
                        icon: "warning",
                        buttons: false,
                        timer: 2000,
                      });';
                    echo '}, 100);</script>';
                    $rregj_sukses="Ky email egziston tashmë. Provoni një username tjetër.";
                    header("Location: register.php"); 

            }else{
                
                {echo "<script>$('#rregjistrohu').prop('disabled',false);</script>";}
                $stmt = $dsn->prepare("INSERT INTO users (emri, mbiemri, username, nr_telit, email, datelindja, fjalekalimi, gjinia, roleId, verify_token) 
                VALUES (:emri, :mbiemri, :username, :nr_telit, :email, :datelindja, :fjalekalimi, :gjinia, :roleid, :verify_token)");
                $stmt->bindParam(':emri', $emri);
                $stmt->bindParam(':mbiemri', $mbiemri);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':nr_telit', $nr_telit);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':datelindja', $datelindja);
                $stmt->bindParam(':fjalekalimi', $fjalekalimi);
                $stmt->bindParam(':gjinia', $gjinia);
                $stmt->bindParam(':roleid', $roleId);
                $stmt->bindParam(':verify_token', $verify_token);
                if($stmt->execute()){
                    sendemail_verify("$username", "$email", "$verify_token");
                    $confirm = "Llogaria juaj u krijua me sukses! Ju lutem verifikojeni ne adresen tuaj te email-it";
                    $_SESSION['status'] = "Llogaria juaj u krijua me sukses! Ne adresen tuaj te email-it gjeni linkun per ta verifikuar ate";
                    // echo '<script type="text/javascript">';
                    // echo 'setTimeout(function () { swal("Urime!","Llogaria juaj u krijua me sukses!","success");';
                    // echo '}, 1000);</script>';
                     header( "Location: register.php" );   
                     //header( "refresh:3;url=register.php");  
                }else{
                    // echo "Deshtim!";
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { swal({
                        title: "Deshtim!",
                        text: "Krijimi i llogarise tuaj ka deshtuar !",
                        icon: "error",
                        buttons: false,
                        timer: 2000,
                      });';
                    echo '}, 1000);</script>';
                    header("Location: register.php"); 
                }
            
            }
        }catch(PDOException $e){
                $error = "Error: " . $e->getMessage();
                echo '<script type="text/javascript">alert("'.$error.'");</script>';
        }
    }
}    
   


?>