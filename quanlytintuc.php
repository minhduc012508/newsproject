<?php
	session_start();
	if (!isset($_SESSION['user_nhom3']))
	{
		header("Location: /Nhom_3/dangnhap.php");
	}
	else
	{
		if (isset($_COOKIE['login'])) 
		{
		  	echo '<script>alert("Đăng nhập thành công")</script>';
		} 
		if (isset($_COOKIE['add'])) 
		{
		  	echo '<script>alert("Thêm tin tức thành công")</script>';
		}
		if (isset($_COOKIE['edit'])) 
		{
		  	echo '<script>alert("Sửa tin tức thành công")</script>';
		} 
		if (isset($_COOKIE['delete'])) 
		{
		  	echo '<script>alert("Xóa tin tức thành công")</script>';
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
		$begin = ($page-1)*3;
		$stt = $begin;
		$sql = "SELECT * FROM tintuc";
		$result = mysqli_query($conn,$sql);
		$total = mysqli_num_rows($result);
		$count = ceil($total/3);

		$sql2 = "SELECT * FROM tintuc INNER JOIN theloai ON tintuc.matheloai = theloai.matheloai ORDER BY id DESC LIMIT $begin,3";
		$result2 = mysqli_query($conn, $sql2);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản lý tin tức</title>
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
				link = "/Nhom_3/xoatintuc.php?id=" + id;
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
	<div class="body">
		<table border="1" cellspacing="0">
			<tr style="text-align: center;">
				<th>STT</th>
				<th>Thể loại</th>
				<th>Ảnh mô tả</th>
				<th>Tiêu đề</th>
				<th>Nội dung tóm tắt</th>
				<th>Tác giả</th>
				<th>Ngày đăng</th>
				<th>Người tạo</th>
				<th>Người chỉnh sửa cuối cùng</th>
				<th>Quản trị</th>
			</tr>
			<?php while ($row = mysqli_fetch_assoc($result2)):?>
				<?php $stt++; ?>
				<tr>
					<td class="stt"><?php echo $stt;?></td>
					<td class="theloai"><?php echo ($row['tentheloai']);?></td>
					<td class="anh"><img width="250" src=<?php echo ('"'.$row['anh'].'"');?>></td>
					<td class="tieude"><?php echo ($row['tieude']);?></td>
					<td class="tomtat"><?php echo ($row['tomtat']);?></td>
					<td class="tacgia"><?php echo ($row['tacgia']);?></td>
					<td class="ngaydang"><?php echo ($row['ngaydang']);?></td>
					<td class="nguoitao"><?php echo ($row['nguoitao']);?></td>
					<td class="nguoisua"><?php echo ($row['nguoisua']);?></td>
					<td class="quantri">
						<table >
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
								<td>
									<form action="quanlychitiet.php" method="GET">
										<input type="hidden" name="id" value=<?php echo ($row['id']);?>>		
										<button type="submit"><i class="fa fa-info" aria-hidden="true"></i></button>					
									</form>	
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

	<div class="footer">
		<p>Copyright © 2021 Đại học Công nghệ Giao thông vận tải</p>
	</div>
</body>
</html>
