
<?php
session_start();
define('BASEPATH', true); 
require 'db.php';

//Include required PHPMailer files
require '../../includes/PHPMailer.php';
require '../../includes/SMTP.php';
require '../../includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//Load Composer's autoloader
//require_once __DIR__ ."/vendor/autoload.php";

function sendemail_verify($username, $email, $verify_token, $fjalekalimi){
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
        $mail->addAddress($email);    
        $mail -> isHTML(true);
        //Content
        $mail->isHTML(true);                                 
        $mail->Subject = 'Verifikimi i email-it';
    
        $email_template = "
        <h2> Konfirmoni adresen tuaj te email-it duke klikuar linkun me poshte  </h2> <br/>
		<a href='http://localhost/hms-project/HMS-master/HMS-master/verify-email.php?token=$verify_token'>Click here to  verify your email</a><br/>
		<h2> Passwordi juaj fillestar eshte $fjalekalimi </h2>
        <br/><br/>
        
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
 if (!empty($_POST["image"])) {

	$allowed = array('PNG', 'jpg','png','jpeg');
	$image = $_POST['image'];
	$ext = pathinfo($image, PATHINFO_EXTENSION);
	if (!in_array($ext, $allowed)) {
		echo "<span style='color:red'>Formati i fotos nuk pranohet</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
		echo "<script>$('#submit').css('background-color','grey');</script>";
	} else {
		echo "<script>$('#submit').prop('disabled',false);</script>";
		            echo "<script>$('#submit').css('background-color','blue');</script>";

	}
}

if (isset($_POST['submit'])) {
	$emri = $_POST['emri'];
	$mbiemri = $_POST['mbiemri'];
	$username = $_POST['username'];
	$nr_telit = $_POST['nr_telit'];
	$email = $_POST['email'];
	$datelindja = $_POST['datelindja'];
	$fjalekalim = $_POST['fjalekalimi'];
	$gjinia = $_POST['gjinia'];
	$roleId = 1;
	$specializimi = $_POST['specializimi'];
	$status = $_POST['status'];
	$dep_id = $_POST['dep_list'];
	$verify_token = md5(rand());


	$fjalekalimi = md5($fjalekalim); 
	// upload i imazhit 


	$msg = "";
	$image = $_FILES['image']['name'];
	$target = "image/" . basename($image);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		$msg = "Fotoja u ngarkua me sukses!";
	} else {
		$msg = "Deshtim ne insertimin e fotos";
	}


	$insert_data = "INSERT INTO users(emri,mbiemri,username,nr_telit,email,datelindja,fjalekalimi,gjinia,roleId,verify_token) 
	  VALUES('$emri','$mbiemri','$username','$nr_telit','$email','$datelindja','$fjalekalimi','$gjinia','$roleId', '$verify_token')";
	$run_data = mysqli_query($con, $insert_data);

	if ($run_data) {
		$ins = "INSERT INTO users_doc_spec (id,image, specializimi,status ,dep_id)
		VALUES(LAST_INSERT_ID(),'$image','$specializimi','$status','$dep_id')";
		$query = mysqli_query($con, $ins);
		sendemail_verify($username, $email, $verify_token, $fjalekalim);
		$_SESSION['status_doctor'] = "Llogaria eshte krijuar me sukses! Tashme ne adresen e email-it te doktorit gjendet linku per ta verifikuar ate";
		header('location:index.php');
	}
}

?>

