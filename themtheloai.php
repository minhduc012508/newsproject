<?php
	session_start();
	if (!isset($_SESSION['user_nhom3']))
	{
		header("Location: /newsproject/dangnhap.php");
	}

	include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm thể loại</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" type="text/css" href="add.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript">
		function confirmLogout() 
		{
			if (confirm("Bạn muốn đăng xuất?"))
			{
				window.location = "/newsproject/dangxuat.php";
			}
			else
			{
				
			}
		}
		function confirmAdd() 
		{
			if (confirm("Thêm mới thể loại?"))
			{
				var theloai = document.frmAdd.theloai.value;
				
				if (theloai == "")
				{
					alert("Vui lòng nhập tên thể loại");
					document.frmAdd.save.value = "false";
				}
				else
				{
					document.frmAdd.save.value = "true";
					document.frmAdd.submit();
				}
			}
			else
			{

			}
		}
	</script>
</head>
<body>
	<div id="banner">
		<img src="image/banner.png">
	</div>
	<div class="mainmenu">
		<div class="menulist" id ="menulist">
			<li>
				<a class="btn" href="quanlytintuc.php">Quản lý tin tức</a>
			</li>
			<li>
				<a class="btn" href="themtintuc.php">Thêm tin tức</a>
			</li>
			<li>
				<a class="btn" href="quanlytheloai.php">Quản lý thể loại</a>
			</li>
			<li>
				<a class="btn" href="themtheloai.php">Thêm thể loại</a>
			</li>

			<button onclick="confirmLogout()"><i class="fa fa-sign-out" aria-hidden="true"></i></button>

		</div>
	</div>
	<div class="bodytl">
		<h1>Thêm thể loại</h1>
		<form action="" method="POST" name="frmAdd">
			<table>
				<tr>
					<td class="demuctl">Tên thể loại:</td>
					<td><input class="theloai" type="text" name="theloai"></td>
				</tr>
				<tr>
					<td class="xacnhantl" colspan="2"><button name="save" value="" onclick="confirmAdd()">Lưu lại</button></td>
				</tr>
			</table>
		</form>
	</div>
	<div class="footer">
		<p>Copyright © 2021 Đại học Công nghệ Giao thông vận tải</p>
	</div>
</body>
</html>
<?php  
	if (isset($_SESSION['user_nhom3']) && $_SESSION['user_nhom3'] == "admin")
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save']) && $_POST['save'] == "true")
		{
			$theloai = $_POST['theloai'];

			$check = "SELECT * FROM theloai WHERE tentheloai = '$theloai'";
			if  (mysqli_num_rows(mysqli_query($conn,$check)) > 0)
			{
				echo '<script>alert("Tên thể loại bị trùng")</script>';
			}
 			else
 			{
 				$sql = "INSERT INTO theloai(tentheloai) VALUES ('$theloai')";
				mysqli_query($conn,$sql);
				setcookie("add","true",time()+1);
				header("Location: /newsproject/quanlytheloai.php");
 			}
		}
	}
?>