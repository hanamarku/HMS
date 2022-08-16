<?php
session_start();
$error_fjalekalim=$error_fjalekalim_i_ri=$error_konf_fjalekalim=$error_username=$u_shtua="";
$error=array();
include "Connection.php";
if($_SERVER['REQUEST_METHOD'] === 'POST') {
if (isset($_POST['ndrysho'])){
    if(isset($_POST['username']) && isset($_POST['fjalekalimi']) && isset($_POST['fjalekalim_i_ri']) && isset($_POST['konf_fjalekalim'])){
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $fjalekalimi = mysqli_real_escape_string($con,md5($_POST['fjalekalimi']));
    $fjalekalim_i_ri = mysqli_real_escape_string($con,md5($_POST['fjalekalim_i_ri']));
    $konf_fjalekalim = mysqli_real_escape_string($con,md5($_POST['konf_fjalekalim']));
//kontrolle per gabime ne inputet e formes se ndryshimit te fjalekalimit
if(empty($username)){
    $error_username="Ju harruat të vendosnit një username !";
    $error[]=$error_username;
}
//kontroll nese fjalekalimi aktual eshte futur sakte(perputhet me ate te username-it)
    $id_e_perdoruesit=mysqli_query($con,"SELECT fjalekalimi from users  where username='$username' ");
    $numrows = mysqli_num_rows($id_e_perdoruesit);
    if($numrows != 0){
    $user_row=mysqli_fetch_array($id_e_perdoruesit);
    if($user_row['fjalekalimi']!=$fjalekalimi){
        $error_fjalekalim="Fjalëkalimi është i gabuar !";
        $error[]=$error_fjalekalim;
        }
       if (empty($error)){
            //$query qe perditeson fjalekalimin  
            //o eva o qenie mistike paskem harru ta ndryshoj kte poshte .. kam pare ate te rrjeshtit 19 .. sorry . te dua shume .. a u pajtuam ???? ma thuaj dicka ???? o qenia ime mistike e preferuar ???? ik mi 
            // sdo meereem me ty .. po deshe ... ste lus 
            $query_ndrysho_fjalekalim="UPDATE users set fjalekalimi='$fjalekalim_i_ri' where username='$username' ";
            $ndrysho_F=mysqli_query($con,$query_ndrysho_fjalekalim) ;
            if (!$ndrysho_F){
                die("Fjalekalimi nuk u ndryshua.".mysqli_error($con));
            } else {
                $u_shtua="Fjalëkalimi u ndryshua me sukses !";
                session_destroy();
                header( "refresh:3;url=login.php" );   
            }
        }
    }else{
        $error_username="Ky username nuk ekziston !";
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

<style >
     .form-control {
    border-radius: 0.75rem;
}
</style>




</head>
<style>
    .errors{
        color: #950101;
    }
</style>


<body>
<div id="backgroundElement">


<div class="container login" style="font-family: 'IBM Plex Sans', sans-serif;">
                <div class="row">
                    
                    <div class="col-md-9 login" id="formaLogin" style="margin-top: 10px;left: 80px;">
                        <a href="index.php"  style="text-decoration:none; color: white;"><button class="kthehu" style=" border: none;border-radius: 1.5rem;padding: 2%;background: #0523b9;color: #fff;font-weight: 700;width: 10%;cursor: pointer; "> 
                            <i class="bi bi-house-door" style="font-size:20px;"></i>
                        </button></a>
                        <br>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="login-heading" style="font-weight: bold;">NDRYSHO FJALËKALIMIN</h3>
                                <form method="post" id="form" action="ndrysho_fjalekalim.php" style="margin: auto;" enctype="multipart/form-data" >
                               
                                <div class="col login-form">
                                    <div class="row-md-6">
                                        <div class="form-group">
                                        <h5 style="position:relative;bottom:25px;color:#06FF00;"><?php echo $u_shtua;?></h4>
                                        <label style="color:black; font-weight:bold;">Username-i:<input type="text" value="<?php echo $_SESSION['username']?>" class="form-control" name="username" id="username" placeholder="Vendos Username" readonly style="background-color: #C1E7F8;"/> 
                                        </label><span class="errors"><?php echo $error_username;?></span>
                                        <br> </label><span id='message6'></span></span>
                                        <div class="form-group">
                                            <label  style="color:black; font-weight:bold;">Fjalëkalimi aktual:<input type="password" class="form-control" id="fjalekalimi" name="fjalekalimi" placeholder="Fjalëkalimi" oninput="this.setCustomValidity('')" /> 
                                             </label><span class="errors"><?php echo $error_fjalekalim;?></span>
                                            <br> </label><span id='message3'></span></span>
                                        </div>
                                        <div class="form-group">
                                            <label style="color:black; font-weight:bold;">Fjalëkalimi i ri:<input type="password" class="form-control" name="fjalekalim_i_ri" id="fjalekalim_i_ri" required placeholder="Fjalëkalimi i Ri" oninput="this.setCustomValidity('')"/>
                                            </label><span class="errors"><?php echo $error_fjalekalim_i_ri;?></span>
                                            <br> </label><span id='message1'></span></span>
                                        </div>
                                        <div class="form-group">
                                            <label style="color:black; font-weight:bold;">Konfirmo fjalëkalimin e ri:<input type="password" class="form-control" name="konf_fjalekalim" id="konf_fjalekalim" onkeyup='checkPassword3();' placeholder="Konfirmo Fjalëkalim" oninput="this.setCustomValidity('')"/>
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
 

    <script  type="text/javascript">

  
$(function() {
    $("#message").hide();
    $("#message1").hide();
    $("#message3").hide();

    var message_fjalekalim_vjeter = false;
    var message_fjalekalim_ri = false;
    var message_konf_fjalekalim = false;
    
    
    $("#fjalekalimi").keyup(function(){
        checkPasswordValidation1();
    });
         

    $("#fjalekalim_i_ri").keyup(function(){
        checkPasswordValidation2();
        
    }); 

    $("#konf_fjalekalim").keyup(function(){
        checkPassword3();
    });

    function checkPasswordValidation1() {
            // var upperCaseLetters = /[A-Z]/g;
            // var lowerCaseLetters = /[a-z]/g;
            // var numbers = /[0-9]/g;
            // var specialCharacter = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
            var pass = $("#fjalekalimi").val().trim();
            if(pass === ''){
                $("#message3").html("Fjalëkalimi nuk mund te jete bosh !").css('color', '#890F0D'); 
                $("#message3").show();
                $("#fjalekalimi").css("border","2px solid #F90A0A");
                message_fjalekalim_vjeter = true;
            }else
            if(pass.length < 8){
                $("#message3").html("Fjalëkalimi permban jo më pak se 8 karaktere.").css('color', '#890F0D'); 
                $("#message3").show();
                $("#fjalekalimi").css("border","2px solid #F90A0A");
                message_fjalekalim_vjeter = true;
            }else{
                $("#message3").hide();
                $("#fjalekalimi").css("border","2px solid #34F458");
            }
        }
    
   function checkPasswordValidation2() {
            var upperCaseLetters1 = /[A-Z]/g;
            var lowerCaseLetters1 = /[a-z]/g;
            var numbers1 = /[0-9]/g;
            var specialCharacter1 = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
            let pass1 = $("#fjalekalim_i_ri").val().trim();
            if(pass1 === ''){
                $("#message1").html("Fjalëkalimi nuk mund te jete bosh!").css('color', '#890F0D'); 
                $("#message1").show();
                $("#fjalekalim_i_ri").css("border","2px solid #F90A0A");
                message_fjalekalim_ri = true;
            }else
            if(!pass1.match(upperCaseLetters1) || !pass1.match(upperCaseLetters1) || !pass1.match(numbers1)
             || !pass1.match(specialCharacter1) || pass1.length < 8){
                $("#message1").html("Fjalëkalimi nuk është i saktë. Ai duhet të përmbajë jo më pak se 8 karaktere nga të cilat minimumi 1 gërmë të madhe, 1 numër dhe 1 karakter special.").css('color', '#890F0D'); 
                $("#message1").show();
                $("#fjalekalim_i_ri").css("border","2px solid #F90A0A");
                message_fjalekalim_ri = true;
            } 
            else if ($("#fjalekalim_i_ri").val().trim() == $("#fjalekalimi").val().trim()){
            $("#message1").html("Fjalëkalimi eshte i njejte me te parin !").css('color', '#890F0D'); 
            $("#message1").show();
            $("#konf_fjalekalim").css("border","2px solid #F90A0A");
            message_fjalekalim_ri = true;
          }
            
            else{
                $("#message1").hide();
                $("#fjalekalim_i_ri").css("border","2px solid #34F458");
            }
        }

        function checkPassword3() {
          if ($("#fjalekalim_i_ri").val().trim() == $("#konf_fjalekalim").val().trim()){
            $("#message").html("Fjalëkalimi përshtatet !").css('color', '#5dd05d'); 
            $("#message").show();
            $("#konf_fjalekalim").css("border","2px solid #34F458");
          } else {
            $("#message").html("Fjalëkalimi nuk përshtatet !").css('color', '#890F0D'); 
            $("#message").show();
            $("#konf_fjalekalim").css("border","2px solid #F90A0A");
            message_konf_fjalekalim = true;
          }
        }
$("#form").submit(function() {
    message_fjalekalim_vjeter = false;
    message_fjalekalim_ri = false;
    message_konf_fjalekalim = false;

    checkPassword3();
    checkPasswordValidation1();
    checkPasswordValidation2();
   


            if (message_fjalekalim_vjeter === false && message_fjalekalim_ri === false &&  message_konf_fjalekalim === false) {
               return true;
            } else {
            swal("Kujdes!", "Plotesoni te gjitha fushat sic duhet !", "warning");
               return false;
            }
        });

});
</script>

    
</body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script> -->
    </html>

  