<?php
	session_start();
	if (!(isset($_SESSION['user_nhom3'])))
	{
		header("Location: /newsproject/dangnhap.php");
	}

	include 'config.php';

	$sqltheloai = "SELECT * FROM theloai";
	$theloai = mysqli_query($conn,$sqltheloai);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm tin tức</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" type="text/css" href="add.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="ckeditor/ckfinder/ckfinder.js"></script>
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
			if (confirm("Thêm mới tin tức?"))
			{

				var theloai = document.frmAdd.theloai.value;
				var anh = document.frmAdd.anh.value;
				var tieude = document.frmAdd.tieude.value;
				var tomtat = document.frmAdd.tomtat.value;
				var chitiet = CKEDITOR.instances.chitiet.getData();
				var tacgia = document.frmAdd.tacgia.value;
				var ngaydang = document.frmAdd.ngaydang.value;
				if (theloai == 0 || anh == "" || tieude == "" || tomtat == "" || chitiet == "" || tacgia == "" || ngaydang == "")
				{
					alert("Vui lòng nhập đầy đủ thông tin");
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
	<div class="body">
		<h1>Thêm tin tức</h1>
		<form action="" method="POST" name="frmAdd" enctype="multipart/form-data">
			<table>
				<tr>
					<td class="demuc">Thể loại:</td>
					<td>
						<select class="theloai" name="theloai">
							<option value="0" selected>--Chọn thể loại--</option>
							<?php while ($row = mysqli_fetch_assoc($theloai)):?>
								<option value=<?php echo '"'.($row['matheloai']).'"';?>><?php echo ($row['tentheloai']);?></option>
							<?php endwhile;?>
						</select>
					</td>
				</tr>
				<tr>
					<td class="demuc">Ảnh miêu tả:</td>
					<td><input type="file" name="anh"></td>
				</tr>
				<tr>
					<td class="demuc">Tiêu đề:</td>
					<td><input class="tieude" type="text" name="tieude"></td>
				</tr>
				<tr>
					<td class="demuc">Nội dung tóm tắt:</td>
					<td><textarea class="tomtat" name="tomtat"></textarea></td>
				</tr>
				<tr>
					<td class="demuc">Nội dung chi tiết:</td>
					<td><textarea name="chitiet"></textarea></td>
				</tr>
				<tr>
					<td class="demuc">Tác giả:</td>
					<td><input class="tacgia" type="text" name="tacgia"></td>
				</tr>
				<tr>
					<td class="demuc">Ngày đăng:</td>
					<td><input class="ngaydang" type="date" name="ngaydang"></td>
				</tr>
				<tr>
					<td colspan="2" class="xacnhan"><button name="save" value="" onclick="confirmAdd()">Lưu lại</button></td>
				</tr>
			</table>
		</form>
	</div>
	<div class="footer">
		<p>Copyright © 2021 Đại học Công nghệ Giao thông vận tải</p>
	</div>

</body>
</html>

<script type="text/javascript">
	CKEDITOR.replace('chitiet');
</script>

<?php  
	if (isset($_SESSION['user_nhom3']))
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save']) && $_POST['save'] == "true")
		{
			$theloai = $_POST['theloai'];
			$tieude = $_POST['tieude'];
			$tomtat = $_POST['tomtat'];
			$chitiet = $_POST['chitiet'];
			$tacgia = $_POST['tacgia'];
			$ngaydang = $_POST['ngaydang'];
			$nguoitao = $_SESSION['user_nhom3'];

			if($_FILES['anh']['type'] == "image/jpeg" || $_FILES['anh']['type'] == "image/png" || $_FILES['anh']['type'] == "image/gif")
			{
				$path = "image/";
				$tmp_name = $_FILES['anh']['tmp_name'];
				$name = $_FILES['anh']['name'];
				$anh = $path.$name;
				$sql = "INSERT INTO tintuc(matheloai, anh, tieude, tomtat, chitiet, tacgia, ngaydang, nguoitao) VALUES ('$theloai','$anh','$tieude','$tomtat','$chitiet','$tacgia','$ngaydang','$nguoitao')";
				mysqli_query($conn,$sql);
				
				// move_uploaded_file($tmp_name,$anh);
				// echo $tmp_name."   ".$anh;
				// setcookie("add","true",time()+1);
				header("Location: /newsproject/quanlytintuc.php");
			}
			else
			{
				echo '<script>alert("Vui lòng chọn file dạng ảnh")</script>';
			}	
		}
	}
?>