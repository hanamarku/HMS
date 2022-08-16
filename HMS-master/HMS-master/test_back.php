<?php
include("Connection.php");
if (!empty($_POST["username"])) {
	$query = "SELECT * FROM users WHERE username='" . $_POST["username"] . "'";
	$result = mysqli_query($con, $query);
	$count = mysqli_num_rows($result);
	if ($count > 0) {
		echo "<span style='color:red'>Ky username egziston tashmë. Provoni një username tjetër. .</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
	} else {
		echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}

?>
