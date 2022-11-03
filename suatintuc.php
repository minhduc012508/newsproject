<?php
	ob_start();
	session_start();
	if (!(isset($_SESSION['user_nhom3'])))
	{
		header("Location: /newsproject/dangnhap.php");
	}  
	
	include 'config.php';

	if (isset($_GET['id']))
	{
		$id = $_GET['id'];
		$sql2 = "SELECT * FROM tintuc INNER JOIN theloai ON tintuc.matheloai = theloai.matheloai WHERE id = '$id'";
		$result2 = mysqli_query($conn,$sql2); 
		$count = mysqli_num_rows($result2);
		if ($count == 0) 
		{
			header("Location: /newsproject/dangnhap.php");
		}
		else
		{
			$sqltheloai = "SELECT * FROM theloai";
			$theloai = mysqli_query($conn,$sqltheloai);
		}
	}
	else
	{
		header("Location: /newsproject/dangnhap.php");
	}	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sửa tin tức</title>
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
		
		function confirmEdit() 
		{
			if (confirm("Sửa tin tức?"))
			{
				var theloai = document.frmEdit.theloai.value;
				var tieude = document.frmEdit.tieude.value;
				var tomtat = document.frmEdit.tomtat.value;
				var chitiet = CKEDITOR.instances.chitiet.getData();
				var tacgia = document.frmEdit.tacgia.value;
				var ngaydang = document.frmEdit.ngaydang.value;
				if (theloai == 0 || tieude == "" || tomtat == "" || chitiet == "" || tacgia == "" || ngaydang == "")
				{
					alert("Vui lòng nhập đầy đủ thông tin");
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
	<div class="body">
		<h1>Sửa tin tức</h1>
		<form action="" method="POST" name="frmEdit" enctype="multipart/form-data">
			<table>
				<?php while ($row2 = mysqli_fetch_assoc($result2)):?>
					<tr>
						<td class="demuc">Thể loại:</td>
						<td>
							<select class="theloai" name="theloai">
								<option value="0" selected>--Chọn thể loại--</option>
								<?php while ($row = mysqli_fetch_assoc($theloai)):?>
									<option value=<?php echo '"'.($row['matheloai']).'"';?> <?php if ($row['matheloai'] == $row2['matheloai']) echo "selected"?>> <?php echo ($row['tentheloai']);?></option>
								<?php endwhile;?>	
							</select>
						</td>
					</tr>
					<tr>
						<td class="demuc">Ảnh miêu tả:</td>
						<td>
							<input type="file" name="anh">
							<input type="hidden" name="AnhMinhHoaGoc" value =<?php echo '"'.$row2['anh'].'"'; ?>>
						</td>
					</tr>
					<tr>
						<td class="demuc">Tiêu đề:</td>
						<td><input class="tieude" type="text" name="tieude" value=<?php echo '"'.$row2['tieude'].'"'; ?>></td>
					</tr>
					<tr>
						<td class="demuc">Nội dung tóm tắt:</td>
						<td><textarea class="tomtat" name="tomtat"><?php echo $row2['tomtat'];?></textarea></td>
					</tr>
					<tr>
						<td class="demuc">Nội dung chi tiết:</td>
						<td><textarea name="chitiet"><?php echo html_entity_decode($row2['chitiet']);?></textarea></td>
					</tr>
					<tr>
						<td class="demuc">Tác giả:</td>
						<td><input class="tacgia" type="text" name="tacgia" value=<?php echo '"'.$row2['tacgia'].'"'; ?>></td>
					</tr>
					<tr>
						<td class="demuc">Ngày đăng:</td>
						<td><input class="ngaydang" type="date" name="ngaydang" value=<?php echo '"'.$row2['ngaydang'].'"'; ?>></td>
					</tr>
					<tr>
						<td class="xacnhan" colspan="2"><button name="save" value="" onclick="confirmEdit()">Lưu lại</button></td>
					</tr>
				<?php endwhile;?>
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
			$nguoisua = $_SESSION['user_nhom3'];

			if(isset($_FILES['anh']) && $_FILES['anh']['name'] != "")
			{
				if($_FILES['anh']['type'] == "image/jpeg" || $_FILES['anh']['type'] == "image/png" || $_FILES['anh']['type'] == "image/gif")
				{
					$path = "image/";
					$tmp_name = $_FILES['anh']['tmp_name'];
					$name = $_FILES['anh']['name'];
					$anh = $path.$name;
					move_uploaded_file($tmp_name,$anh);
					$sql = "UPDATE tintuc SET matheloai='$theloai',anh='$anh',tieude='$tieude',tomtat='$tomtat',chitiet='$chitiet',tacgia='$tacgia',ngaydang='$ngaydang', nguoisua = '$nguoisua' WHERE id = '$id'";;
					mysqli_query($conn,$sql);
					setcookie("edit","true",time()+1);
					header("Location: /Nhom_3/quanlytintuc.php");
				}
				else
				{
					echo '<script>alert("Vui lòng chọn file dạng ảnh")</script>';
				}
			}
			else
			{
				$sql = "UPDATE tintuc SET matheloai='$theloai',tieude='$tieude',tomtat='$tomtat',chitiet='$chitiet',tacgia='$tacgia',ngaydang='$ngaydang',nguoisua = '$nguoisua' WHERE id = '$id'";
				mysqli_query($conn,$sql);
				setcookie("edit","true",time()+1);
				header("Location: /newsproject/quanlytintuc.php");
			}	
		}
	}
	ob_end_flush();
?>