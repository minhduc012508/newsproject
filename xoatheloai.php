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
			//Kiem tra id cua the loai
			$id = $_GET['id'];
			$check = "SELECT * FROM tintuc WHERE matheloai = '$id'";
			if  (mysqli_num_rows(mysqli_query($conn,$check)) > 0)
			{
				setcookie("delete","false",time()+1);
			}
			else
			{
				$sql = "DELETE FROM theloai WHERE matheloai = '$id'";
				mysqli_query($conn,$sql); 
				setcookie("delete","true",time()+1);
			}
			header("Location: /newsproject/quanlytheloai.php");
		}
		else
		{
			header("Location: /newsproject/quanlytheloai.php");
		}
	}
?>