<?php 

	require "../../database/connect.php";
	session_start();
	$v = $_SESSION['f_name'];
		
	$sql = "UPDATE users SET active=0 WHERE f_name='$v'";

	if (mysqli_query($connection, $sql)){
		echo "Record deleted successfully";
		header("Location: view.php");
	}else{
		echo "Error deleting record: ";
		}

	mysqli_close($connection);
			
			
?>