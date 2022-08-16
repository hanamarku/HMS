
<?php
session_start();
?>


<html>

<head>
	<title>HMS</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
<link rel="stylesheet" type="text/css" href="login.css">
<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> -->

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style>
    .errors{
        color: #950101;
    }

    .subject
{
    color: purple;
    border: 2px solid green;
    width:400px;
    padding: 20px;
}
</style>
<script>
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 2000);
</script>



</head>

<body>

<div id="backgroundElement">
<div class="container login" style="font-family: 'IBM Plex Sans', sans-serif;">
    <div class="row">
        
        <div class="col-md-9 login" id="formaLogin" style="margin-top: 40px;left: 80px;">
            <div class="tab-content" id="myTabContent">
                
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

          
                    <?php
                        if(isset($_SESSION['status'])){
                            ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <h5 class="msg"><?= $_SESSION['status']; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                  
                                </button>
                            </div>

                            <?php
                            unset($_SESSION['status']);
                        }
                    ?>
                
                    <h3 class="login-heading" style="font-weight: bold;">REGJISTROHU SI PACIENT</h3>
                    <form method="post" id="form" action="register_back.php" enctype="multipart/form-data">
                
                    <div class="row login-form">   
                    
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Emri" name="emri" id="emri" required oninvalid="this.setCustomValidity('Ju lutem plotësoni emrin !')" oninput="this.setCustomValidity('')"/>
                                </label><span class="error" id='message4'></span></span> 
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Username" name="username" id="username" onInput="checkUsernameValid()"/></label>
                             
                                <span id="check-username"></span>
                                <span class="error" id='message6'></span>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email-i *" name="email" id="email" onInput="checkEmailValid()"/></label>
                                <span id="check-email"></span>
                                <span class="error" id='message3'>
                                
                            </div>

                            <div class="form-group">
                                <span style="color: white;">Datelindja : <input type="date" id="birthday" name="datelindja" id="datelindja" required oninvalid="this.setCustomValidity('Ju lutem plotësoni datelindjen !')" oninput="this.setCustomValidity('')" ></span> 
                                </label><span class="error" id='message8'></span></span>
                            </div> 

                            <div class="form-group" name="myform"  oninput="this.setCustomValidity('')" >
                                    <label class="radio inline"  > 
                                        <input type="radio" name="gjinia" value="Mashkull" id="gender" >
                                        <span style="color:black; font-weight:bold;"> Mashkull </span> 
                                    </label>
                                    <label class="radio inline"> 
                                        <input type="radio" name="gjinia" value="Femer" id="gender">
                                        <span style="color:black; font-weight:bold;">Femer </span> 
                                    </label>
                                    </label><span class="error" id='message9'></span></span>
                            </div>
                           
                        </div>
                
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Mbiemri " name="mbiemri" id="mbiemri" required oninvalid="this.setCustomValidity('Ju lutem plotësoni mbiemrin !')" oninput="this.setCustomValidity('')"/>
                                </label><span class="error" id='message5'></span></span>
                            </div>
                            
                            <div class="form-group">
                                <input type="tel" minlength="10" maxlength="10" name="nr_telit" class="form-control" placeholder="Numri i telefonit" id="nr_telit" required oninvalid="this.setCustomValidity('Ju lutem plotësoni numrin tuaj te celularit !')" oninput="this.setCustomValidity('')" />
                                </label><span class="error" id='message7'></span></span>
                            </div>
                                  
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password-i *" id="fjalekalimi" name="fjalekalimi"  required oninvalid="this.setCustomValidity('Ju lutem plotësoni fjalëkalimin !')" oninput="this.setCustomValidity('')" />
                                
                                </label><span class="error" id='message1'></span></span>
                            </div>
                            
                            <div class="form-group">
                                <input type="password" class="form-control"  id="konfirmo_fjalekalim" placeholder="Konfirmo Password " name="konfirmo_fjalekalim" onkeyup='checkPassword();' required oninvalid="this.setCustomValidity('Ju lutem plotësoni konfirmimin e fjalëkalimit  !')" oninput="this.setCustomValidity('')" /></span>
                                </label><span class="error" id='message'></span></span>
                            </div>

                            
                        </div>
                    </div>
                        <input type="submit" class="btnRegister" name="rregjistrohu" id="rregjistrohu" value="Regjistrohu"/> 
                        <br><a class="linku" style="color: black; text-decoration: none; font-weight: bold;" href="login.php" >Keni një profil ekzistues ?</a> <br>
                    </div>  

                    </form>           
                </div>
            </div>
        </div>
    </div>
</div>
</div>



<script  type="text/javascript">

function checkUsernameValid() {	
	jQuery.ajax({
	url: "register_back.php",
	data:'username='+$("#username").val(),
	type: "POST",
	success:function(data){
		$("#check-username").html(data);
	},
	error:function (){}
	});
}


function checkEmailValid() {	
	jQuery.ajax({
	url: "register_back.php",
	data:'email='+$("#email").val(),
	type: "POST",
	success:function(data){
		$("#check-email").html(data);
	},
	error:function (){}
	});
}



$(function() {
    $("#message").hide();
    $("#message1").hide();
    $("#message4").hide();
    $("#message5").hide();
    $("#message6").hide();
    $("#message7").hide();
    $("#message8").hide();
    // $("#message9").hide();
  
    var message_emri = false;
    var message_mbiemri = false;
    var message_fjalekalim = false;
    var message_konf_fjalekalim = false;
    var message_email = false;
    var message_username = false;
    var message_tel = false;
    var message_dt = false;
    // var message_gender = false;

        $("#emri").keyup(function(){
            checkName();
         });

        $("#mbiemri").keyup(function(){
            checkLastName();
         });

         $("#konfirmo_fjalekalim").keyup(function(){
            checkPassword();
         });
         
         $("#fjalekalimi").keyup(function(){
            checkPasswordValidation();
         });

         $("#email").keyup(function(){
            checkEmailValidation();
         });
         
         $("#username").keyup(function(){
            checkUserName();
         });
        

         $("#nr_telit").keyup(function(){
            checkPhoneNumber();
         });

         $("#birthday").keyup(function(){
            checkAge();
         });

         $("#gender").keyup(function(){
            checkGender();
         });

        function checkPasswordValidation() {
            var upperCaseLetters = /[A-Z]/g;
            var lowerCaseLetters = /[a-z]/g;
            var numbers = /[0-9]/g;
            var specialCharacter = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
            var pass = $("#fjalekalimi").val().trim();
            if(pass === ''){
                $("#message1").html("Fjalëkalimi nuk mund te jete bosh !").css('color', '#890F0D'); 
                $("#message1").show();
                $("#fjalekalimi").css("border","2px solid #F90A0A");
                message_fjalekalim = true;
            }else
            if(!pass.match(upperCaseLetters) || !pass.match(upperCaseLetters) || !pass.match(numbers)
             || !pass.match(specialCharacter) || pass.length < 8){
                $("#message1").html("Fjalëkalimi nuk është i saktë. Ai duhet të përmbajë jo më pak se 8 karaktere nga të cilat minimumi 1 gërmë të madhe, 1 numër dhe 1 karakter special.").css('color', '#890F0D'); 
                $("#message1").show();
                $("#fjalekalimi").css("border","2px solid #F90A0A");
                message_fjalekalim = true;
            }else{
                $("#message1").hide();
                $("#fjalekalimi").css("border","2px solid #34F458");
            }
        }


        const isValidEmail = email => {
            const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
            }  
        function checkEmailValidation() {
            var email = $("#email").val().trim();
            if(email === '') {
                $("#message3").html("Emaili-i nuk mund te jete bosh !").css('color', '#890F0D'); 
                $("#message3").show();
                $("#email").css("border","2px solid #F90A0A");
                message_email = true;
            } else if (!isValidEmail(email)) {
                $("#message3").html("Formati i emailit nuk eshte i sakte !").css('color', '#890F0D'); 
                $("#message3").show();
                $("#email").css("border","2px solid #F90A0A");
                message_email = true;
            } else{
                $("#message3").hide();
                $("#email").css("border","2px solid #34F458");
            }
        }

        function checkPassword() {
          if ($("#fjalekalimi").val().trim() == $("#konfirmo_fjalekalim").val().trim()){
            $("#message").html("Fjalëkalimi përshtatet !").css('color', '#5dd05d'); 
            $("#message").show();
            $("#konfirmo_fjalekalim").css("border","2px solid #34F458");
          } else {
            $("#message").html("Fjalëkalimi nuk përshtatet !").css('color', '#890F0D'); 
            $("#message").show();
            $("#konfirmo_fjalekalim").css("border","2px solid #F90A0A");
            message_konf_fjalekalim = true;
          }
        }

        function checkName() {  
            var pattern = /^[a-zA-Z]*$/;
            var emri = $("#emri").val().trim();
            if(emri === '') {
                $("#message4").html("Emri nuk duhet te jete bosh !").css('color', '#890F0D'); 
                $("#message4").show();
                $("#emri").css("border","2px solid #F90A0A");
                message_emri = true;
            }else if(!pattern.test(emri) ){
                $("#message4").html("Emri duhet te permbaje vetem karaktere-shkronja !").css('color', '#890F0D'); 
                $("#message4").show();
                $("#emri").css("border","2px solid #F90A0A");
                message_emri = true;
            }else{
                $("#message4").hide();
                $("#emri").css("border","2px solid #34F458");
               
            }
        }

        function checkLastName() { 
            var pattern = /^[a-zA-Z]*$/;
            var mbiemri = $("#mbiemri").val().trim();
            if(mbiemri === '') {
                $("#message5").html("Mbiemri nuk duhet te jete bosh !").css('color', '#890F0D'); 
                $("#message5").show();
                $("#mbiemri").css("border","2px solid #F90A0A");
                message_mbiemri = true;
            }else if(!pattern.test(mbiemri) ){
                $("#message5").html("Mbiemri duhet te permbaje vetem karaktere-shkronja !").css('color', '#890F0D'); 
                $("#message5").show();
                $("#mbiemri").css("border","2px solid #F90A0A");
                message_mbiemri = true;
            }else{
                $("#message5").hide();
                $("#mbiemri").css("border","2px solid #34F458");
               
            }
        }

            function checkUserName() { 
                var username = $("#username").val().trim();
                if(username === '') {
                    $("#message6").html("Username nuk duhet te jete bosh !").css('color', '#890F0D'); 
                    $("#message6").show();
                    $("#username").css("border","2px solid #F90A0A");
                    message_username = true;
                }else if(username.length < 5) {
                    $("#message6").html("Username duhet te permbaje te pakten 5 karaktere !").css('color', '#890F0D'); 
                    $("#message6").show();
                    $("#username").css("border","2px solid #F90A0A");
                    message_username = true;
                    }else if(/\s/.test(username)){  
                        $("#message6").html("Username nuk mund te permbaje karakter bosh-hapesire!").css('color', '#890F0D'); 
                        $("#message6").show();
                        $("#username").css("border","2px solid #F90A0A");
                        message_username = true;
                        }else{
                            $("#message6").hide();
                            $("#username").css("border","2px solid #34F458");
                        }
            }

            function checkPhoneNumber() { 
                var phoneNumber = $("#nr_telit").val().trim();
                var phoneno = /^\d{10}$/;
                if(phoneNumber === ''){
                    $("#message7").html("Numri i celularit nuk mund te jete bosh !").css('color', '#890F0D'); 
                    $("#message7").show();
                    $("#nr_telit").css("border","2px solid #F90A0A");
                    message_tel = true;
                }else if(!phoneNumber.match(phoneno)){
                    $("#message7").html("Formati i numrit tuaj te celularit nuk eshte i sakte !").css('color', '#890F0D'); 
                    $("#message7").show();
                    $("#nr_telit").css("border","2px solid #F90A0A");
                    message_tel = true;
                }else{
                    $("#message7").hide();
                    $("#nr_telit").css("border","2px solid #34F458");
                }
            }

            function  checkAge() { 
                var today = new Date();
                var userBirthDate = new Date($("#birthday").val());
                if(userBirthDate >= today){
                    $("#message8").html("Kujdes! Datelindja duhet te jete me e vogel/barabarte se data aktuale").css('color', '#890F0D'); 
                    $("#message8").show();
                    $("#birthday").css("border","2px solid #F90A0A");
                    message_tel = true;
                }else{
                    $("#message8").hide();
                    $("#birthday").css("border","2px solid #34F458");
                }
            }
        
        $("#form").submit(function() {
            message_emri = false;
            message_mbiemri = false;
            message_konf_fjalekalim = false;
            message_fjalekalim = false;
            message_emaili = false;
            message_username = false;
            message_tel = false;
            message_dt = false;
            // message_gender = false;

            checkName();
            checkLastName();
            checkPassword();
            checkPasswordValidation();
            checkEmailValidation();
            checkUserName();
            checkPhoneNumber();
            checkAge();
            // checkGender();

            if (message_emri === false && message_mbiemri === false && message_konf_fjalekalim === false && message_fjalekalim === false && message_emaili === false && message_username === false && message_tel === false && message_dt === false ) {
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
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->

<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script> -->
</html>

  