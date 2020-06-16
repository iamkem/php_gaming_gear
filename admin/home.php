<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>

<?php
include 'adminfunctions.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 5;

// Prepare the SQL statement and get records from our contacts table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM products ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page - 1) * $records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Get the total number of contacts, this is so we can determine whether there should be a next and previous button
$num_products = $pdo->query('SELECT COUNT(*) FROM products')->fetchColumn();
?>

<?=template_header('ADMIN')?>

<div class="content">
		<!-- <aside class="responsive-width-100 responsive-hidden">
				<a href="#">
					<i class="fas fa-box-open"></i>
					Products
				</a>
			</aside> -->
		<main class="responsive-width-100">
			<h2>Sản phẩm</h2>
			<div class="links"><a href="create.php">Thêm sản phẩm</a></div>
			<div class="content-block">
				<div class="table">
					<table>
						<thead>
							<tr>
								<td>#</td>
								<td>Tên</td>
								<td>Giá</td>
								<td>RRP</td>
								<td>Số lượng</td>
								<td>Hình ảnh</td>
								<td>Ngày thêm</td>
								<td></td>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($products as $products) : ?>
								<tr>
									<td><?= $products['id'] ?></td>
									<td><?= $products['name'] ?></td>
									<td><?= number_format($products['price']) ?>₫</td>
									<td><?= $products['rrp'] ?></td>
									<td><?= $products['quantity'] ?></td>
									<td><img src="../imgs/<?= $products['img'] ?>" width="50" height="50" alt="<?= $products['name'] ?>"></td>
									<td><?= $products['date_added'] ?></td>
									<td class="actions">
										<a href="update.php?id=<?= $products['id'] ?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
										<a href="delete.php?id=<?= $products['id'] ?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					<div class="pagination">
						<?php if ($page > 1) : ?>
							<a href="home.php?page=<?= $page - 1 ?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
						<?php endif; ?>
						<?php if ($page * $records_per_page < $num_products) : ?>
							<a href="home.php?page=<?= $page + 1 ?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</main>
	</div>

	<?=template_footer()?>