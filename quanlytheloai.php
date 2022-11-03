<?php
	session_start();
	if (!(isset($_SESSION['user_nhom3'])))
	{
		header("Location: /newsproject/dangnhap.php");
	}
	else
	{
		if (isset($_COOKIE['add'])) 
		{
		  	echo '<script>alert("Thêm thể loại thành công")</script>';
		}
		if (isset($_COOKIE['edit'])) 
		{
		  	echo '<script>alert("Sửa thể loại thành công")</script>';
		} 
		if (isset($_COOKIE['delete'])) 
		{
			if ($_COOKIE['delete'] == "true")
			{
				echo '<script>alert("Xóa thể loại thành công")</script>';
			}
		  	else
		  	{
		  		echo '<script>alert("Không thể xóa vì tồn tại tin tức thuộc thể loại này")</script>';
		  	}
		} 
		include 'config.php';
		if(isset($_GET['page']))
		{
			$page = $_GET['page'];
		}
		else
		{
			$page = 1;
		}
		$begin = ($page-1)*5;
		$stt = $begin;
		$sql = "SELECT * FROM theloai";
		$result = mysqli_query($conn,$sql);
		$total = mysqli_num_rows($result);
		$count = ceil($total/5);

		$sql2 = "SELECT * FROM theloai ORDER BY matheloai DESC LIMIT $begin,5";
		$result2 = mysqli_query($conn, $sql2);
	}
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản lý thể loại</title>
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
			if (confirm("Bạn chắc chắn muốn xóa thể loại này?"))
			{
				link = "/newsproject/xoatheloai.php?id=" + id;
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
	<div class="content">
		<div class="bodytl">
			<table border="1" cellspacing="0">
				<tr>
					<th>STT</th>
					<th>Tên thể loại</th>
					<th>Quản trị</th>
				</tr>
				<?php while ($row = mysqli_fetch_assoc($result2)):?>
					<?php $stt++; ?>
					<tr>
						<td class="stt"><?php echo $stt;?></td>
						<td class="theloaitl"><?php echo ($row['tentheloai']);?></td>
						<td class="quantri">
							<table style="width: 100%">
								<tr>
									<td>
										<form action="suatheloai.php" method="GET">
											<input type="hidden" name="id" value=<?php echo ($row['matheloai']);?>>		
											<button type="submit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>					
										</form>
									</td>
									<td>
										<button onclick="delConfirm(<?php echo ($row['matheloai']);?>)" name="btnDel" value="false"><i class="fa fa-trash-o" aria-hidden="true"></i></button>	
									</td>
								</tr>
							</table>
							
								
						</td>
					</tr>
				<?php endwhile;?>
			</table>
		</div>
		<div class="phantrang">
			<?php
				for ($i = 1; $i <= $count; $i++)
				{
					echo "<a href='?page=$i'><button>$i</button></a>";
				}  
			?>
		</div>
	</div>
	<div class="space">
		
	</div>
	<div class="footer">
		<p>Copyright © 2021 Đại học Công nghệ Giao thông vận tải</p>
	</div>
</body>
</html>
