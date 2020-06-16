<?php
include 'adminfunctions.php';
$pdo = pdo_connect_mysql();
$msg = '';

if (isset($_GET['id'])) {
    if (!empty($_POST)) {

        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $price = isset($_POST['price']) ? $_POST['price'] : '';
        $desc = isset($_POST['desc']) ? $_POST['desc'] : '';
        $rrp = isset($_POST['rrp']) ? $_POST['rrp'] : '';
        $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';
        $date_added = isset($_POST['date_added']) ? $_POST['date_added'] : date('Y-m-d H:i:s');
  
        $stmt = $pdo->prepare('UPDATE products SET id = ?, name = ?, price = ?, desc = ?, rrp = ?, quantity = ?, date_added = ? WHERE id = ?');
        $stmt->execute([$id, $name, $price, $desc, $rrp, $quantity, $date_added, $_GET['id']]);
        $msg = 'Cập nhật thành công!';
    }
  
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$product) {
        exit('Sản phẩm không tồn tại');
    }
} else {
    exit('Không có ID chỉ định!');
}
?>

<?=template_header('Sửa sản phẩm')?>

<div class="content update">
	<h2>Cập nhật sản phẩm #<?=$product['id']?></h2>
    <form action="update.php?id=<?=$product['id']?>" method="post">
        <label for="id">ID</label>
        <label for="name">Tên</label>
        <input type="text" name="id" value="<?=$product['id']?>" id="id">
        <input type="text" name="name" value="<?=$product['name']?>" id="name">
        <label for="price">Giá</label>
        <label for="desc">Mô tả</label>
        <input type="number" name="price" value="<?=$product['price']?>" id="price">
        <textarea type="text" name="desc" id="desc" style="resize: none; width: 400px"><?=$product['desc']?></textarea>
        <label for="rrp">RRP</label>
        <label for="img">Hình ảnh</label>
        <input type="number" name="rrp" value="<?=$product['rrp']?>" id="rrp">
        <input type="file" name="img">
        <label for="quantity">Số lượng</label>
        <label for="date_added">Ngày thêm</label>
        <input type="number" name="quantity" value="<?=$product['quantity']?>" id="quantity">
        <input type="datetime-local" name="date_added" value="<?=date('Y-m-d\TH:i', strtotime($product['date_added']))?>" id="date_added">
        <input type="submit" value="Cập nhật">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>