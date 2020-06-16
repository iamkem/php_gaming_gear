<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'gaminggear';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');

$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Hồ sơ</title>
		<link href="admin.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<div>
				<a href="home.php">
                    <h1>ADMIN</h1>
				</a>
				</div>
				<div>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Hồ sơ</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
				</div>
			</div>
		</nav>
		<div class="content">
			<h2>Hồ sơ</h2>
			<div>				
				<table>
					<tr>
						<td>Tên tài khoản:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Mật khẩu:</td>
						<td><?=$password?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$email?></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>