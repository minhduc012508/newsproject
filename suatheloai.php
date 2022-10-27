<?php
	session_start();
	if (!isset($_SESSION['user_nhom3']))
	{
		header("Location: /Nhom_3/dangnhap.php");
	}

	include 'config.php';

	if (isset($_GET['id']))
	{
		$id = $_GET['id'];
		$sql2 = "SELECT * FROM theloai WHERE matheloai = '$id'";
		$result2 = mysqli_query($conn,$sql2); 
		$count = mysqli_num_rows($result2);
		if ($count == 0) 
		{
			header("Location: /Nhom_3/dangnhap.php");
		}
	}
	else
	{
		header("Location: /Nhom_3/dangnhap.php");
	}	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sửa thể loại</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" type="text/css" href="add.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript">
		function confirmLogout() 
		{
			if (confirm("Bạn muốn đăng xuất?"))
			{
				window.location = "/Nhom_3/dangxuat.php";
			}
			else
			{
				
			}
		}
		
		function confirmEdit() 
		{
			if (confirm("Sửa thể loại?"))
			{
				var theloai = document.frmEdit.theloai.value;
				if (theloai == "")
				{
					alert("Vui lòng nhập tên thể loại");
					document.frmEdit.save.value = "false";
				}
				else
				{
					document.frmEdit.save.value = "true";
					document.frmEdit.submit();
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
		<h1>Sửa thể loại</h1>
		<form action="" method="POST" name="frmEdit">
			<?php while ($row2 = mysqli_fetch_assoc($result2)):?>
			<p style="font-size: 17px; font-style: italic; color: grey">Tên thể loại cũ: <?php echo '"'.$row2['tentheloai'].'"'; ?></p>
			<table>
				<tr>
					<td class="demuctl">Tên thể loại:</td>
					<td><input class="theloai" type="text" name="theloai" value=<?php echo '"'.$row2['tentheloai'].'"'; ?>></td>
				</tr>
				<tr>
					<td class="xacnhantl" colspan="2"><button name="save" value="" onclick="confirmEdit()">Lưu lại</button></td>
				</tr>
			</table>
			<?php endwhile;?>
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

			$check = "SELECT * FROM theloai WHERE tentheloai = '$theloai' AND matheloai != '$id'";
			if  (mysqli_num_rows(mysqli_query($conn,$check)) > 0)
			{
				echo '<script>alert("Tên thể loại bị trùng")</script>';
			}
 			else
 			{
 				$sql = "UPDATE theloai SET tentheloai = '$theloai' WHERE matheloai = '$id'";
				mysqli_query($conn,$sql);
				setcookie("edit","true",time()+1);
				header("Location: /Nhom_3/quanlytheloai.php");
 			}
		}
	}
?>