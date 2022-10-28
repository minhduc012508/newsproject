<?php
	session_start();
	//sua doi ten file va dia chi luu tru file 
	unset($_SESSION['user_nhom2']);
	header("Location: /Nhom_2/dangnhap.php");
?>