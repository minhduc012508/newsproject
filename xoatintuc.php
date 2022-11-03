<?php
	session_start();
	if (!isset($_SESSION['user_nhom3']))
	{
		header("Location: /newsproject/dangnhap.php");
	}	  
	else
	{
		include 'config.php';

		$id = 0;

		if (isset($_GET['id']))
		{
			$id = $_GET['id'];
			$sql = "DELETE FROM tintuc WHERE id = '$id'";
			mysqli_query($conn,$sql); 
			setcookie("delete","true",time()+1);
			header("Location: /newsproject/quanlytintuc.php");
		}
		else
		{
			header("Location: /newsproject/quanlytintuc.php");
		}
	}
?>