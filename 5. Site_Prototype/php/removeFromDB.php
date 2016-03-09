<?php
session_start();

	$email = $_POST['email'];
	
	include ('connect.php');
	
	$querydelete = "DELETE FROM `customers` WHERE `Email` = '$email'";
	
	$updatedb = mysqli_query($con,$querydelete);
	
	mysqli_close($con);
	
	if ($updatedb) {
		$_SESSION['deleted'] = "<p>You have deleted " . $email . " from the database</p>";
		header("location:login.php");
	} else {
		$_SESSION['deleted'] = "<p>Error: " . $email . " not deleted from database</p>";
		header("location:login.php");
	}
?>