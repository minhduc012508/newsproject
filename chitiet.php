<?php
	include 'config.php';
	$id = 0;
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}
	else
	{
		header("Location: /newsproject/");
	}
	
	$sql = "SELECT * FROM tintuc INNER JOIN theloai ON tintuc.matheloai = theloai.matheloai WHERE id = $id";
	$result = mysqli_query($conn,$sql);
	$result2 = mysqli_query($conn,$sql);
	$count = mysqli_num_rows($result);

	if ($count == 0)
	{
		header("Location: /newsproject/");
	}

	$sqltheloai = "SELECT * FROM theloai";
	$theloai = mysqli_query($conn,$sqltheloai);
	$theloai2 = mysqli_query($conn,$sqltheloai);

	$sql2 = "SELECT * FROM tintuc WHERE id != '$id' ORDER BY id DESC LIMIT 0,4";
	$new = mysqli_query($conn,$sql2);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Nhóm 3</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>
	<link rel="stylesheet" href="chitiet.css">
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
	<?php while ($row = mysqli_fetch_assoc($result)):?>
	<div class="post-detail">
		<div class="menu-button">
			<div class="button-link">
				<ol>
					<li>
						<a href="/Nhom_3/">Trang chủ</a>
						<span class="slash">&nbsp;>>&nbsp;</span>
					</li>

					<li>
						<a href="<?php echo '/Nhom_3/?theloai='.($row['matheloai']);?>"><?php echo ($row['tentheloai']);?></a>
						<span class="slash">&nbsp;>>&nbsp;</span>
					</li>
					<li>
						<?php echo ($row['tieude']);?>
					</li>
				</ol>
			</div>
		</div>		
	</div>
	<?php endwhile;?>

	<div id= "content">
		<div class="row">
			<div class="post-content">
				<div class="main-content">
					<?php while ($row = mysqli_fetch_assoc($result2)):?>
						<div class="tilte-post">
							<h1 class="post-content">
								<span>
									<?php echo ($row['tieude']);?>
								</span>
							</h1>
						</div>
						<div class="post-meta">
							<span class="post-meta">
								<?php echo $row['ngaydang'];?>
							</span>
							<hr>
							<div>
								<a href="#">
									Chia sẻ
								</a>
							</div>
							<hr>						
						</div>
						<div class="node-content">
		                     <?php echo html_entity_decode($row['chitiet']); ?>                                        
						</div>
						<div class="node-author">
							<?php echo $row['tacgia'];?>
						</div>
					<?php endwhile;?>

				</div>
				<div class="menu-content">
					<div class="slide-bar">
						<h2 class="box-title">
							<span>Chuyên mục</span>
						</h2>
						<div class="category-list">
							<div class="item-list">
								<ul>
									<li class="menu-list">
										<a href="/Nhom_3/">Trang chủ</a>
									</li>
									<?php while ($row = mysqli_fetch_assoc($theloai2)):?>
										<li class="menu-list">
											<a href="<?php echo '?theloai='.($row['matheloai']);?>"><?php echo ($row['tentheloai']);?></a>
										</li>
									<?php endwhile;?>
								</ul>
							</div>
						</div>
					</div>
					<div class="sidebar-inner">
						<h2 class="block-title">
							<span>Tin mới</span>
						</h2>
						<div class="block-title-inner">
							<div class="">
								<div class="item-list">
									<ul>
										<?php while ($row = mysqli_fetch_assoc($new)):?>
										<li class="view-list-item">
											<div class="flex">
												<div class="post-image">
													<a href="<?php echo ('chitiet.php?id='.$row['id']);?>">
														<img src=<?php echo ('"'.$row['anh'].'"');?> alt="">
													</a>
												</div>
												<div class="post-contenter">
													<div class="post-title">
														<a href="<?php echo ('chitiet.php?id='.$row['id']);?>">										
															<?php echo ($row['tieude']);?>
														</a>														
													</div>
													<div class="post-meta">
														<span class="post-created"><?php echo $row['ngaydang'];?></span>
													</div>
													
												</div>
											</div>										
										</li>
										<?php endwhile;?>
									</ul>
								</div>
							</div>
						</div>
					</div>

  
				</div>
				
			</div>
		</div>
	</div>

	<div class="footer">
		<p>Copyright © 2021 Đại học Công nghệ Giao thông vận tải</p>
	</div>
</body>
</html>