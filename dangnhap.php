<?php
	session_start(); 
	if (isset($_SESSION['user_nhom3']))
	{
		header("Location: /newsproject/quanlytintuc.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập</title>
	<link rel="stylesheet" type="text/css" href="dangnhap.css">
	<script type="text/javascript">
		//Them ghi chu
		function confirmLogin()
		{
			var username = document.frmLogin.username.value;
			var password = document.frmLogin.password.value;
			if (username == "" || password == "")
			{
				alert("Vui lòng nhập tên đăng nhập và mật khẩu");
			}
			else
			{
				document.frmLogin.login.value = true;
				document.frmLogin.submit();
			}
		}
	</script>
</head>
<body>
	<div class = "body"> 
		<form action="" method="POST" class = "frmLogin" name="frmLogin">
			<table>
				<tr>
					<td class = "tieude" >ĐĂNG NHẬP</td>
				</tr>
				<tr>
					<td class = "tdinput"><input class= "user" type="text" name="username" placeholder="Tên đăng nhập"></td>
				</tr>
				<tr>
					<td class = "tdinput"><input class = "pass" type="password" name="password" placeholder="Mật khẩu"></td>
				</tr>
				<tr>
					<td class = "tdxacnhan">
						<button class = "btnxacnhan" type="submit" name="login" value="login" onclick="confirmLogin()">Đăng nhập</button>
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>
<?php
	if (!(isset($_SESSION['user_nhom3'])))
	{
		include 'config.php';
		$username = "";
		$password = "";
		$count = 0;

		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			if (isset($_POST['username']))
			{
				$username = $_POST['username'];
			}
			if (isset($_POST['password']))
			{
				$password = $_POST['password'];
			}
		}
		if (isset($_POST['login']) && $_POST['login'] == "true")
		{
			setcookie("login","login",time()+1);
			$sql = "SELECT * FROM quantrivien WHERE (tendangnhap = '$username' AND matkhau ='$password')";
			$result = mysqli_query($conn,$sql);
			$count =  mysqli_num_rows($result);
			if ($count > 0)
			{
				$_SESSION['user_nhom3'] = $username;
				header("Location: /newsproject/quanlytintuc.php");
			}
			else
			{
				echo '<script>alert("Sai tên đăng nhập hoặc mật khẩu")</script>';
			}
		} 
	}
?>