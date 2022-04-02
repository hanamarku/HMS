<?php
//    require "Connection.php";
$error_username=$error_fjalekalimi=$error_konfirmo_fjalekalimin=$rregj_sukses="";
if(isset($_POST['rregjistrohu'])){
    $emri = $_POST['emri'];
    $mbiemri = $_POST['mbiemri'];
    $username = $_POST['username'];
    $nr_telit = $_POST['nr_telit'];
    $email = $_POST['email'];
    $datelindja = $_POST['datelindja'];
    $fjalekalimi = $_POST['fjalekalimi'];
    $konfirmo_fjalekalimin = $_POST['konfirmo_fjalekalim'];
    $gjinia = $_POST['gjinia'];

    require "Connection.php";
    //nese form eshte submitted atehere validohen fushat input
    if(empty($username)){
        $error_username = 'Ju lutem plotesoni username-in !';
    }

    if(empty($fjalekalimi)){
    $error_fjalekalimi='Ju lutem plotësoni fjalëkalimin !';
    // echo "<script>alert('gabiim');</script>";
    }

    $uppercase=preg_match('@[A-Z]@',$fjalekalimi);
    $lowercase=preg_match('@[a-z]@',$fjalekalimi);
    $numer=preg_match('@[0-9]@',$fjalekalimi);
    $karakterspecial=preg_match('@[?=.*?[#?!$%^&*-]@',$fjalekalimi);
    if(!$uppercase || !$lowercase || !$numer || !$karakterspecial || strlen($fjalekalimi)<8){
        $error_fjalekalimi='Fjalëkalimi nuk është i saktë. Ai duhet të përmbajë jo më pak se 8 karaktere nga të cilat minimumi 1 gërmë të madhe, 1 numër dhe 1 karakter special.';
    }
    if(empty($konfirmo_fjalekalimin)){
    $error_konfirmo_fjalekalimin='Ju lutem plotësoni konfirmimin e fjalëkalimit.';
    }else if ($konfirmo_fjalekalimin != $fjalekalimi){
        $error_konfirmo_fjalekalimin='Fjalëkalimi nuk përputhet! Ju lutem rishkruani edhe njëherë fjalëkalimin.';
    }
    if(!empty($errors)){ 
        foreach($errors as $value) echo $value."<br/>";
    }else{
        $query = mysqli_query($con, "SELECT *FROM user_pacient WHERE username = '".$username."'");
        $numrows = mysqli_num_rows($query);
        if($numrows == 0){
            if(!empty($username) && !empty($fjalekalimi) && !empty($konfirmo_fjalekalimin)){
                if($fjalekalimi == $konfirmo_fjalekalimin){
                    $sql = "INSERT INTO user_pacient(emri, mbiemri, username, nr_telit, email, datelindja, fjalekalimi, gjinia ) VALUES ('$emri', '$mbiemri', '$username', '$nr_telit', '$email', '$datelindja', '$fjalekalimi', '$gjinia' )";
                    $result = mysqli_query($con, $sql);
                    if($result){
                        $rregj_sukses = "Llogaria juaj u krijua me sukses!";
                        header( "refresh:3;url=login.php" );   
                        
                    }
                }else{
                    echo "Failure";
                }
            }
        }else{
            $error_username="Ky username egziston tashmë. Provoni një username tjetër.";
        }
    }
}

?>

<html>
<head>
	<title>HMS</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
<link rel="stylesheet" type="text/css" href="login.css">
<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<style>
    .errors{
        color: #950101;
    }
</style>

<script>
var checkPassword = function() {
  if (document.getElementById('fjalekalimi').value ==
    document.getElementById('konfirmo_fjalekalim').value) {
    document.getElementById('message').style.color = '#5dd05d';
    document.getElementById('message').innerHTML = 'Fjalëkalimi përshtatet !';
  } else {
    document.getElementById('message').style.color = '#890F0D';
    document.getElementById('message').innerHTML = 'Fjalëkalimi nuk përshtatet !';
  }
}
</script>

</head>

<body>
<div id="backgroundElement">

<div class="container login" style="font-family: 'IBM Plex Sans', sans-serif;">
    <div class="row">
        
        <div class="col-md-9 login" id="formaLogin" style="margin-top: 40px;left: 80px;">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h4 style="position:relative;bottom:25px;color:red; padding-top:20px;"><?php echo $rregj_sukses?></h4>
                    <h3 class="login-heading" style="font-weight: bold;">REGJISTROHU SI PACIENT</h3>
                    <form method="post" action="register.php">
                
                    <div class="row login-form">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Emri" name="emri" />
                                </label><span class="errors"><?php echo $error_username;?></span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Username" name="username" />
                                </label><span class="errors"><?php echo $error_username;?></span>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email-i *" name="email"  />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password-i *" id="fjalekalimi" name="fjalekalimi" />
                                </label><span class="errors"><?php echo $error_fjalekalimi;?></span>
                            </div>
                            <div class="form-group">
                                <div class="maxl">
                                    <label class="radio inline"> 
                                        <input type="radio" name="gjinia" value="Male" checked>
                                        <span style="color:black; font-weight:bold;"> Mashkull </span> 
                                    </label>
                                    <label class="radio inline"> 
                                        <input type="radio" name="gjinia" value="Female">
                                        <span style="color:black; font-weight:bold;">Femer </span> 
                                    </label>
                                </div>      
                            </div>
                           
                        </div>
                
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Mbiemri *" name="mbiemri"  />
                            </div>
                            
                            <div class="form-group">
                                <input type="tel" minlength="10" maxlength="10" name="nr_telit" class="form-control" placeholder="Numri i telefonit"  />
                            </div>
                                  
                            <div class="form-group">
                                <span style="color: white;">Datelindja : <input type="date" id="birthday" name="datelindja"></span> 
                            </div>
                        
                            <div class="form-group">
                                <input type="password" class="form-control"  id="konfirmo_fjalekalim" placeholder="Konfirmo Password " name="konfirmo_fjalekalim" onkeyup='checkPassword();'/></span>
                                </label><span id='message'></span></span>
                            </div>
                        </div>
                    </div>
                        <input type="submit" class="btnRegister" name="rregjistrohu"  value="Regjistrohu"/> 
                        <br><a class="linku" style="color: black; text-decoration: none; font-weight: bold;" href="login.php" >Keni një profil ekzistues ?</a> <br>
                    </div>  
                    </form>           
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</html>

  