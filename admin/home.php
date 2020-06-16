<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Home Page</title>
	<link href="admin.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body class="loggedin">
	<nav class="navtop">
		<div>
			<h1>ADMIN</h1>
			<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
			<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
		</div>
	</nav>
	<div class="content">
		<!-- <aside class="responsive-width-100 responsive-hidden">
				<a href="#">
					<i class="fas fa-box-open"></i>
					Products
				</a>
			</aside> -->
		<main class="responsive-width-100">
			<h2>Products</h2>
			<div class="links"><a href="#">Create Product</a></div>
			<div class="content-block">
				<div class="table">
					<table>
						<thead>
							<tr>
								<td>#</td>
								<td>Name</td>
								<td>Price</td>
								<td>RRP</td>
								<td>Quantity</td>
								<td>Images</td>
								<td>Created</td>
								<td></td>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($products as $products) : ?>
								<tr>
									<td><?= $products['id'] ?></td>
									<td><?= $products['name'] ?></td>
									<td><?= $products['price'] ?></td>
									<td><?= $products['rrp'] ?></td>
									<td><?= $products['quantity'] ?></td>
									<td><?= $products['img'] ?></td>
									<td><?= $products['date_added'] ?></td>
									<td class="actions">
										<a href="update.php?id=<?= $products['id'] ?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
										<a href="delete.php?id=<?= $products['id'] ?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</main>
	</div>
</body>

</html>