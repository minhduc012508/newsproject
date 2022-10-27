<?php
	include 'config.php';
	if(isset($_GET['page']))
	{
		$page = $_GET['page'];
	}
	else
	{
		$page = 1;
	}

	$begin1 = ($page-1)*6;
	$begin2 = $begin1 + 3;

	

	if(isset($_GET['theloai']))
	{
		$theloai = $_GET['theloai'];
		$theloai2=$theloai;
		$sql1 = "SELECT * FROM tintuc WHERE matheloai = '$theloai' ORDER BY id DESC LIMIT $begin1,3";
		$sql2 = "SELECT * FROM tintuc WHERE matheloai = '$theloai' ORDER BY id DESC LIMIT $begin2,3";
		$sql = "SELECT * FROM tintuc WHERE matheloai = '$theloai'";
		$sqlheading = "SELECT * FROM theloai WHERE matheloai = '$theloai'";
		$heading = mysqli_query($conn,$sqlheading);
	}
	else
	{
		$sql1 = "SELECT * FROM tintuc ORDER BY id DESC LIMIT $begin1,3";
		$sql2 = "SELECT * FROM tintuc ORDER BY id DESC LIMIT $begin2,3";
		$sql = "SELECT * FROM tintuc";
	}

	$result1 = mysqli_query($conn,$sql1);
	$result2 = mysqli_query($conn,$sql2);

	$result = mysqli_query($conn,$sql);
	$total = mysqli_num_rows($result);
	$count = ceil($total/6);

	$sqltheloai = "SELECT * FROM theloai";
	$theloai = mysqli_query($conn,$sqltheloai);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Nhóm 3</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
</head>
<body>
	<div id="banner">
		<img src="image/banner.png">
	</div>
	<div class="mainmenu">
		<div class="menulist" id ="menulist">
			<li>
				<a class="btn active" href="/Nhom_3/">Trang chủ</a>
			</li>
			<?php while ($row = mysqli_fetch_assoc($theloai)):?>
			<li>
				<a class="btn" href="<?php echo '?theloai='.($row['matheloai']);?>"><?php echo ($row['tentheloai']);?></a>
			</li>
			<?php endwhile;?>
		</div>
	</div>
	<div class="container1">
		<div class="admissions">
			<div class="heading">
				<?php if(isset($_GET['theloai'])) { ?>
					<?php while ($row = mysqli_fetch_assoc($heading)):?>
						<h1><?php echo ($row['tentheloai']);?></h1>
					<?php endwhile;?>
				<?php } ?>
				<?php if(!isset($_GET['theloai'])) { ?>
					<h1>TIN TỨC TỔNG HỢP</h1>
				<?php } ?>
			</div>
			<div class="headingline">
			</div>
			<div class="newstable">
				<div class="newsrow">
					<?php while ($row1 = mysqli_fetch_assoc($result1)):?>
					<div class="newscell">
						<div class="news">
							<div class="imgbox">
								<a class="title" href="<?php echo ('chitiet.php?id='.$row1['id']);?>"><img src=<?php echo ('"'.$row1['anh'].'"');?>></a>
							</div>
							<div class="titlebox">
								<a class="title" href="<?php echo ('chitiet.php?id='.$row1['id']);?>"><?php echo ($row1['tieude']);?></a>
							</div>
						</div>
					</div>
					<?php endwhile;?>
				</div>
				<div class="newsrow">
					<?php while ($row2 = mysqli_fetch_assoc($result2)):?>
					<div class="newscell">
						<div class="news">
							<div class="imgbox">
								<a class="title" href="<?php echo ('chitiet.php?id='.$row2['id']);?>"><img src=<?php echo ('"'.$row2['anh'].'"');?>></a>
							</div>
							<div class="titlebox">
								<a class="title" href="<?php echo ('chitiet.php?id='.$row2['id']);?>"><?php echo ($row2['tieude']);?></a>
							</div>
						</div>
					</div>
					<?php endwhile;?>
				</div>
			</div>
			<div class="phantrang">
				<?php for ($i = 1; $i <= $count; $i++) { ?>
					<?php if(isset($_GET['theloai'])) { ?>
						<a href="<?php echo '?theloai='.$theloai2.'&page='.$i; ?>"><button><?php echo $i;?></button></a>	
					<?php } ?>
					<?php if(!isset($_GET['theloai'])) { ?>
						<a href="<?php echo '?page='.$i; ?>"><button><?php echo $i;?></button></a>	
					<?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>
	
	<div class="footer">
		<p>Copyright © 2021 Đại học Công nghệ Giao thông vận tải</p>
	</div>
</body>
</html>