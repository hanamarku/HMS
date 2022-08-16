<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- Template Main CSS File -->

<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

<br><br><br><br><br><br><br><br>
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

<dic class="mx-auto">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
            <?php
                        if(isset($_SESSION['status'])){
                            ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <h5 class="msg"><?= $_SESSION['status']; ?></h5>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <?php
                            unset($_SESSION['status']);
                        }
                        ?>
                <div class="card">
                    <div class="card-header">
                        <h5>Dergo perseri email verifikues</h5>
                    </div>
                    <div class="card-body">
                        <form action="resend_code.php" method="POST" id="form">
                            <div class="form-group mb-3">
                                <label> Email-i</label>
                                <input type="email" name="email"  id="email" class="form-control" placeholder="Vendosni adresen tuaj te email-it"  required oninvalid="this.setCustomValidity('Ju lutem plotësoni email-in !')" oninput="this.setCustomValidity('')">
                                </label><span class="error" id='message3'></span></span>
                            </div>
                            <div class="form-group mb-3">
                                <button id ="btn" type="submit"  name="resend_email_btn" class="btn btn-success">Dergo</button>
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</dic>

<script  type="text/javascript">

$(function() {
    $("#message3").hide();


    var message_email = false;

    // var message_gender = false;


         $("#email").keyup(function(){
            checkEmailValidation();
         });
         



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

        $("#form").submit(function() {
            message_emaili = false;

            checkEmailValidation();

            if (message_emaili === true) {
                swal({
                        title: "Kujdes !",
                        text: "Plotesoni te gjitha fushat sic duhet !",
                        icon: "warning",
                      });
                return false;
            }
        });
    
});



</script>