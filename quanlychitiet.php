<?php
	session_start();
	if (!isset($_SESSION['user_nhom3']))
	{
		header("Location: /newsproject/dangnhap.php");
	}
	else
	{
		include 'config.php';
		
		if (isset($_GET['id']))
		{
			$id = $_GET['id'];
			$sql = "SELECT * FROM tintuc WHERE id = '$id'";
			$result = mysqli_query($conn,$sql); 
		}
		else
		{
			header("Location: /newsproject/dangnhap.php");
		}	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản lý chi tiết</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" type="text/css" href="quantri.css">
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
		function delConfirm(id) 
		{
			if (confirm("Bạn chắc chắn muốn xóa bài viết này?"))
			{
				link = "/newsproject/xoatintuc.php?id=" + id;
				window.location = link;
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
	<div class="bodyct">
		<h1>Chi tiết tin tức số <?php echo $id; ?></h1>
		<?php while ($row = mysqli_fetch_assoc($result)):?>
			<table>
				<tr>
					<td><?php echo html_entity_decode($row['chitiet']);?></td>
				</tr>
				<tr>
					<td>
						<table>
							<tr>
								<td>
									<form action="suatintuc.php" method="GET">
										<input type="hidden" name="id" value=<?php echo ($row['id']);?>>		
										<button type="submit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>					
									</form>
								</td>
								<td>
									<button onclick="delConfirm(<?php echo ($row['id']);?>)" name="btnDel" value="false"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		<?php endwhile;?>
	</div>
	<div class="footer">
		<p>Copyright © 2021 Đại học Công nghệ Giao thông vận tải</p>
	</div>
</body>
</html>
