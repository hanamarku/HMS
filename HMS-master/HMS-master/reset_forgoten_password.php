<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- Template Main CSS File -->

<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> -->


<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

<br><br><br><br><br><br>
<style>
body {
    /* background: -webkit-linear-gradient(left, #3931af, #00c6ff); */
    background: url(images/homeSlider//186020.jpg);
    
 
    
}
</style>
<?php
session_start();
?>



<script>
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 2000);
</script>

<script  type="text/javascript">

$(function() {
    $("#message").hide();
    $("#message1").hide();
  

    var message_fjalekalim = false;
    var message_konf_fjalekalim = false;


         $("#konf_fjalekalim").keyup(function(){
            checkPassword();
         });
         
         $("#fjalekalim_i_ri").keyup(function(){
            checkPasswordValidation();
         });

        function checkPasswordValidation() {
            var upperCaseLetters = /[A-Z]/g;
            var lowerCaseLetters = /[a-z]/g;
            var numbers = /[0-9]/g;
            var specialCharacter = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
            var pass = $("#fjalekalim_i_ri").val().trim();
            if(pass === ''){
                $("#message1").html("Fjalëkalimi nuk mund te jete bosh !").css('color', '#890F0D'); 
                $("#message1").show();
                $("#fjalekalim_i_ri").css("border","2px solid #F90A0A");
                message_fjalekalim = true;
            }else
            if(!pass.match(upperCaseLetters) || !pass.match(upperCaseLetters) || !pass.match(numbers)
             || !pass.match(specialCharacter) || pass.length < 8){
                $("#message1").html("Fjalëkalimi nuk është i saktë. Ai duhet të përmbajë jo më pak se 8 karaktere nga të cilat minimumi 1 gërmë të madhe, 1 numër dhe 1 karakter special.").css('color', '#890F0D'); 
                $("#message1").show();
                $("#fjalekalim_i_ri").css("border","2px solid #F90A0A");
                message_fjalekalim = true;
            }else{
                $("#message1").hide();
                $("#fjalekalim_i_ri").css("border","2px solid #34F458");
            }
        }


        function checkPassword() {
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

            message_konf_fjalekalim = false;
            message_fjalekalim = false;



            checkPassword();
            checkPasswordValidation();


            if ( message_konf_fjalekalim === false && message_fjalekalim === false ) {
               return true;
            } else {
            swal("Kujdes!", "Plotesoni te gjitha fushat sic duhet !", "warning");
               return false;
            }
        });
    
});
</script>

<dic class="mx-auto">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
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
                <div class="card">
                    <div class="card-header">
                        <h5>Rivendosja e fjalekalimit</h5>
                    </div>
                    <div class="card-body">
                        <form action="reset_password.php" method="POST" id="form">
                            <input type="hidden" name="password_token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];} ?>" >
                            <div class="form-group">
                                <label> Email-i</label>
                                <input type="email" name="email" value="<?php if(isset($_GET['email'])){echo $_GET['email'];} ?>"  id="email" class="form-control" required oninvalid="this.setCustomValidity('Ju lutem plotësoni email-in !')" oninput="this.setCustomValidity('')" readonly>
                         
                            </div>
                            <div class="form-group">
                                <label for="password-2" style="color:black; font-weight:bold;">Fjalëkalimi i ri:<input type="password" class="form-control" name="fjalekalim_i_ri" id="fjalekalim_i_ri" placeholder="Fjalëkalimi i Ri" onkeyup='checkPasswordValidation();'/></label>
                                <span class="error" id='message1'></span></span>
                                 
                             </div>
                            <div class="form-group">
                                <label for="repassword-2" style="color:black; font-weight:bold;">Konfirmo fjalëkalimin e ri:<input type="password" class="form-control" name="konf_fjalekalim" id="konf_fjalekalim" placeholder="Konfirmo Fjalëkalim" onkeyup='checkPassword();'/></label>
                                <span class="error" id='message'></span></span>
                              
                            </div>        
                            <div class="form-group">
                                <button id ="btn" type="submit"  name="update_password" class="btn btn-success">Vendos Fjalekalim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</dic>

<script  type="text/javascript">



</script>