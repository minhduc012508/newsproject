<?php
	session_start();
	unset($_SESSION['user_nhom3']);
	header("Location: /Nhom_3/dangnhap.php");
?>