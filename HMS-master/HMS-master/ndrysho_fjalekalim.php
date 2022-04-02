<?php
$error_fjalekalim=$error_fjalekalim_i_ri=$error_konf_fjalekalim=$error_username=$u_shtua="";
$error=array();
include "Connection.php";
if($_SERVER['REQUEST_METHOD'] === 'POST') {
if (isset($_POST['ndrysho'])){
    if(isset($_POST['username']) && isset($_POST['fjalekalim']) && isset($_POST['fjalekalim_i_ri']) && isset($_POST['konf_fjalekalim'])){
$username=$_POST['username'];
$fjalekalim=$_POST['fjalekalim'];
$fjalekalim_i_ri=$_POST['fjalekalim_i_ri'];
$konf_fjalekalim=$_POST['konf_fjalekalim'];
//kontrolle per gabime ne inputet e formes se ndryshimit te fjalekalimit
if(empty($username)){
    $error_username="Ju harruat të vendosnit një username !";
    $error[]=$error_username;}
//kontrollo nese fjalekalimi aktual eshte futur sakte(perputhet me ate te username-it)
    $id_e_perdoruesit=mysqli_query($con,"SELECT fjalekalimi from user_pacient  where username='$username' ") or die ("Nuk u realizua query".musqli_error());
    $user_row=mysqli_fetch_array($id_e_perdoruesit);
    if($user_row['fjalekalimi']!=$fjalekalim){
        $error_fjalekalim="Fjalëkalimi është i gabuar !";
        $error[]=$error_fjalekalim;
        }

        if(empty($fjalekalim)){
        $error_fjalekalim="Ju harruat të plotësonit fjalëkalimin aktual !";
        $error[]=$error_fjalekalim;
        }

        $uppercase=preg_match('@[A-Z]@',$fjalekalim_i_ri);
        $lowercase=preg_match('@[a-z]@',$fjalekalim_i_ri);
        $numer=preg_match('@[0-9]@',$fjalekalim_i_ri);
        $karakterspecial=preg_match('@[?=.*?[#?!$%^&*-]@',$fjalekalim_i_ri);
        if(!$uppercase || !$lowercase || !$numer || !$karakterspecial || strlen($_POST["fjalekalim_i_ri"]) < 8){
            $error_fjalekalim_i_ri='Fjalekalimi nuk eshte i sakte. Ai duhet te permbaje minimumi 8 karaktere,ku të paktën të jetë 1 germe te madhe, 1 numer dhe 1 karakter special.';
            $error[]=$error_fjalekalim_i_ri;
            $error[]=$error_fjalekalim_i_ri;
        }
        if(empty($fjalekalim_i_ri)){
            $error_fjalekalim_i_ri="Ju harruat të plotësonit fjalëkalimin e ri !";
            $error[]=$error_fjalekalim_i_ri;
        }

        if(empty($konf_fjalekalim)){
            $error_konf_fjalekalim="Ju harruat të konfirmonit fjalëkalimin e ri  !";
            $error[]=$error_konf_fjalekalim;
        }
        if( $_POST['fjalekalim_i_ri']!= $_POST['konf_fjalekalim']){
            $error_konf_fjalekalim="Fjalëkalimi i konfirmuar nuk përputhet me fjalëkalimin e ri ! ";
            $error[]=$error_konf_fjalekalim;
        }else if (empty($error)){
            //$query qe perditeson fjalekalimin
            $query_ndrysho_fjalekalim="UPDATE user_pacient set fjalekalimi='$fjalekalim_i_ri' where username='$username' ";
            $ndrysho_F=mysqli_query($con,$query_ndrysho_fjalekalim) ;
            if (!$ndrysho_F){
                die("Fjalekalimi nuk u ndryshua".mysqli_error($con));
            } else {
                $u_shtua="Fjalëkalimi u ndryshua me sukses !";
                header( "refresh:3;url=login.php" );   
            }
        }
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
<link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
  <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
</svg> -->
<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<!-- <style >
     .form-control {
    border-radius: 0.75rem;
}
</style> -->

</head>
<style>
    .errors{
        color: #950101;
    }
</style>

<script>
var checkPassword = function() {
  if (document.getElementById('fjalekalim_i_ri').value ==
    document.getElementById('konf_fjalekalim').value) {
    document.getElementById('message').style.color = '#5dd05d';
    document.getElementById('message').innerHTML = 'Fjalëkalimi përputhet !';
  } else {
    document.getElementById('message').style.color = '#890F0D';
    document.getElementById('message').innerHTML = 'Fjalëkalimi nuk përputhet !';
  }
}

</script>
<!------ Include the above in your HEAD tag ---------->
<body>
<div id="backgroundElement">


<div class="container login" style="font-family: 'IBM Plex Sans', sans-serif;">
                <div class="row">
                    
                    <div class="col-md-9 login" id="formaLogin" style="margin-top: 10px;left: 80px;">
                        <button class="kthehu" style=" border: none;border-radius: 1.5rem;padding: 2%;background: #0523b9;color: #fff;font-weight: 700;width: 10%;cursor: pointer; "> 
                            <a href="index.html" style="text-decoration:none; color: white;"><i class="bi bi-house-door" style="font-size:20px;"></i></a>
                        </button>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="login-heading" style="font-weight: bold;">NDRYSHO FJALËKALIMIN</h3>
                                <form method="post" action="ndrysho_fjalekalim.php" style="margin: auto; ">
                               
                                <div class="col login-form">
                                    <div class="row-md-6">
                                        <div class="form-group">
                                        <h5 style="position:relative;bottom:25px;color:red;"><?php echo $u_shtua;?></h4>
                                        <label style="color:black; font-weight:bold;">Username-i:<input type="text" class="form-control" name="username" placeholder="Vendos Username" /> 
                                        </label><span class="errors"><?php echo $error_username;?></span>
                                        <div class="form-group">
                                            <label for="password" style="color:black; font-weight:bold;">Fjalëkalimi aktual:<input type="password" class="form-control" name="fjalekalim" placeholder="Fjalëkalimi"/> 
                                            </label><span class="errors"><?php echo $error_fjalekalim;?></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="password-2" style="color:black; font-weight:bold;">Fjalëkalimi i ri:<input type="password" class="form-control" name="fjalekalim_i_ri" id="fjalekalim_i_ri" placeholder="Fjalëkalimi i Ri" onkeyup='checkPassword();'/>
                                            </label><span class="errors"><?php echo $error_fjalekalim_i_ri;?></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="repassword-2" style="color:black; font-weight:bold;">Konfirmo fjalëkalimin e ri:<input type="password" class="form-control" name="konf_fjalekalim" id="konf_fjalekalim" placeholder="Konfirmo Fjalëkalim" onkeyup='checkPassword();'/>
                                            </label><span class="errors" ><?php echo $error_konf_fjalekalim;?></span>
                                           <br> </label><span id='message'></span></span>
                                        </div>
                                    </div>
                             
                                  <div class="row-md-6">
                                    <button type="submit" class="ndryshoFBtn" name="ndrysho" style=" border: none;border-radius: 1.5rem;padding: 2%;background: #0523b9;color: #fff;font-weight: 700;width: 35%;cursor: pointer;margin:10px auto;">
                                        Ndrysho fjalëkalimin</button><br>
                            
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

  