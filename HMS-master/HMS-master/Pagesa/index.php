<?php
require "Connection.php";
session_start();
?>


<!DOCTYPE html>
<html>

<head>
    <title>Pagesa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css ">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
</head>


<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 style="text-align: center;">Dhuroni!</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 m-2">
                <div class="box-field">
                    <!-- PayPal logo -->
                   
                    <hr>

                    <label style="float: center;" for="amount" class="mb-2"><p class="support-p" style="margin-left:60px ; color:red;"> <strong>Vendosni shumen qe doni te dhuroni!*</strong></p> </label><br> <br>
                    <input type="number" id="amount" class="form-control mb-4 " placeholder="in $USD" onchange="Pay()">
                    <br>
                    <!-- Set up a container element for the button -->
                    <div id="paypal-button-container"></div>

                    <!-- Include the PayPal Javascript SDK -->
                    <script src="https://www.paypal.com/sdk/js?client-id=AbzZdZrlnHDFb-ftO5xCofci2dpzTpiltUQ2qB1RI7poByrBRWqyUgCWnpPAhXCd1uK0SzebSAXneLmy&disable-funding=credit,card"></script>

                    <!-- <script src="https://www.paypal.com/sdk/js?client-id-AbzZdZrlnHDFb-ftO5xCofci2dpzTpiltUQ2qB1RI7poByrBRWqyUgCWnpPAhXCd1uK0SzebSAXneLmy&currency-USD"></script> -->

                </div>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
    <br>
    <br>

    <script>
        var amount = 0;

        function Pay() {
            //body...
            amount = $('#amount ').val();
        }

        paypal.Buttons({
            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: amount
                        }
                    }]
                });
            },
            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    //Show a success message to the buyer
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                });
            }
        }).render('#paypal-button-container');
    </script>
</body>

</html>