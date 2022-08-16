<?php
include "config.php";
session_start();
if (
    !empty($_POST['name']) && !empty($_POST['doctor'])
    && !empty($_POST['date']) && !empty($_POST['hour'])
) {
    $name =  explode(' ', $_POST['name']);
    $doctor =  $_POST['doctor'];
    $date =  $_POST['date'];
    $hour =  $_POST['hour'];
    $hour1 = date('H:i', strtotime($hour. ' +0 minutes'));
    $hour2 = date('H:i', strtotime($hour. ' -30 minutes'));
    $surname = $name[1];
    $name = $name[0];

    $current_date = date("Y-m-d");
    if ($date < $current_date) {
        echo 3;
        exit;
    }

    $sql = "SELECT * FROM rezervimet WHERE date='$date' AND hour BETWEEN '$hour2' AND '$hour1'";
    $mysqli = $con->query($sql);

    if ($mysqli->num_rows > 0) {
        echo 2;
        exit;
    }
$id = $_SESSION['idtest'];

    $sql = "INSERT INTO rezervimet(name, surname, doctor, date, hour, patient_Id) VALUES('$name', '$surname', '$doctor', '$date', '$hour', '$id')";
    mysqli_query($con, $sql);
    echo 1;
    exit;
}

if (!empty($_POST['select'])) {
    $select = $_POST['select'];
    $sql = "SELECT * FROM rezervimet WHERE doctor='$select'";

    $mysqli = $con->query($sql);

    if ($mysqli->num_rows > 0) {
        while ($row = $mysqli->fetch_assoc()) {
            echo "Mjeku: <b>" . $row['doctor'] . "</b> Data: " . $row["date"] . " - Orari: " . $row["hour"] . " <br>";
        }
    }
} else {
    echo 0;
    exit;
}
