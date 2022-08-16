<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Patient Area</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js'></script>
    <style>
        .table td {
            text-align: center;
        }

        table {
            font-size: 16px;
        }

        table th {
            color: #051367;
        }

        tbody td {
            text-align: center;
        }

        input:invalid+span:after {
            position: absolute;
            content: '✖';
            padding-left: 5px;
            }

            input:valid+span:after {
            position: absolute;
            content: '✓';
            padding-left: 5px;
            }
    </style>
</head>

<body>
    <?php
    include "config.php";
    ?>
    <?php include "headerPatient.php"; ?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
                    <li class="breadcrumb-item active"><a href="http://localhost/hms-project/HMS-master/HMS-master/Patient/indexPatient.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Takimet</li>
                </ol>
            </nav>
        </div>

        <section class="section dashboard">
        <section id="invisible" class="alert alert-success">
                <p>&#10003; Zgjidhni doktorin me te cilin deshironi te rezervoni takim</p>
                <p>&#10003; Intervali kohor i disponueshem eshte 9am-6pm</p>
                <p>&#10003; Nje konsulte zgjat 30 minuta dhe kushton 30 &euro;</p>

        </section>
            <select name="doctor" id="doctor">
                <?php
                $host = "localhost"; 
                $user = "root"; 
                $password = ""; 
                $dbname = "hospital_database"; 

                $con = mysqli_connect($host, $user, $password, $dbname);

                // Check connection
                if (!$con) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM users WHERE roleId=1";

                $mysqli = $con->query($sql);

                if ($mysqli->num_rows > 0) {
                    while ($row = $mysqli->fetch_assoc()) {
                        $_SESSION['docTest'] = $row['id'];
                   
                        $name = $row['emri'] . ' ' . $row['mbiemri'];
                        echo "<option value='" . $name . "'>" . $name . "</option>";
                    }
                }
                ?>
            </select>
           
         

            <input type="date" name="date" id="date">
            <input type="time" name="hour" id="hour" min="09:00" max="18:00"><span class="validity" ></span> &nbsp;&nbsp;&nbsp;
            <?php
            $sql = "SELECT * FROM users WHERE username='" . $_SESSION["username"] . "'";

            $mysqli = $con->query($sql);

            if ($mysqli->num_rows > 0) {
                while ($row = $mysqli->fetch_assoc()) {
                    $_SESSION['idtest']= $row['id'];
                    echo "<input type='hidden' name='name' id='name' value='" . $row['emri'] . ' ' . $row['mbiemri'] . "'>";
                }
            }
            ?>
            <button class="btn btn-danger btn-sm butoni">Rezervo</button><br>
            
            <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
            <div id="paypal-button-container"></div>
            <script>
                paypal.Buttons({
                    createOrder: (data, actions) => {
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: '30' 
                                }
                            }]
                        });
                    },

                    onApprove: (data, actions) => {
                        return actions.order.capture().then(function(orderData) {
                            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                            const transaction = orderData.purchase_units[0].payments.captures[0];
                            alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);

                        });
                    }
                }).render('#paypal-button-container');
            </script>

            <section id="invisible" class="alert alert-danger">
                <h4>Oraret dhe datat e rezervuara</h4>
                <section id="rezervimet">
                    <?php
                    $sql = "SELECT * FROM rezervimet";

                    $mysqli = $con->query($sql);

                    if ($mysqli->num_rows > 0) {
                        while ($row = $mysqli->fetch_assoc()) {
                            echo "Mjeku: <b>" . $row['doctor'] . "</b> Data: " . $row["date"] . " - Orari: " . $row["hour"] . " <br>";
                        }
                    }
                    ?>
                </section>
            </section>
        </section>
    </main>

    <script>
        $(document).ready(function() {
            $('#doctor').change(function() {
                var select = document.getElementById('doctor').value;
                $.ajax({
                    url: 'ajaxfile.php',
                    type: 'POST',
                    data: {
                        select: select,
                    },
                    success: function(response) {
                        console.log(response);
                        $('#rezervimet').html(response);
                    }
                });
            });

            $('.butoni').click(function() {
                var el = this;
                var name = document.getElementById('name').value;
                var doctor = document.getElementById('doctor').value;
                var date = document.getElementById('date').value;
                var hour = document.getElementById('hour').value;

                Swal.fire({
                    title: 'Jeni te sigurte per rezervimin ?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: `Po`,
                    denyButtonText: `Jo`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'ajaxfile.php',
                            type: 'POST',
                            data: {
                                name: name,
                                doctor: doctor,
                                date: date,
                                hour: hour
                            },
                            success: function(response) {
                                if (response == 1) {
                                    $(el).closest('tr').css('background', 'tomato');
                                    $(el).closest('tr').fadeOut(800, function() {
                                        $(this).remove();
                                    });

                                    bootbox.alert('Rezervimi u krye me sukses !');
                                } else if (response == 2) {
                                    bootbox.alert('Kjo date eshte e rezervuar!');
                                } else if (response == 3) {
                                    bootbox.alert('Nuk mund te prenotoni perpara dites se sotshme!');
                                } else {
                                    bootbox.alert('Plotesoni te dhenat sakte!');
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>