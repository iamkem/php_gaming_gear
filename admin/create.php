<?php
include 'adminfunctions.php';
$pdo = pdo_connect_mysql();
$msg = '';

if (!empty($_POST)) {
    
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
  
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $desc = isset($_POST['desc']) ? $_POST['desc'] : '';
    $rrp = isset($_POST['rrp']) ? $_POST['rrp'] : '';
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';
    $date_added = isset($_POST['date_added']) ? $_POST['date_added'] : date('Y-m-d H:i:s');
    
    $stmt = $pdo->prepare('INSERT INTO products VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$id, $name, $price, $desc, $rrp, $quantity, $date_added]);
   
    $msg = 'Thêm sản phẩm thành công!';
}
?>

<?= template_header('Thêm sản phẩm') ?>

<div class="content update">
    <h2>Thêm sản phẩm</h2>
    <form action="create.php" method="post">
        <label for="id">ID</label>
        <label for="name">Tên</label>
        <input type="text" name="id" placeholder="26" value="auto" id="id">
        <input type="text" name="name" id="name">
        <label for="price">Giá</label>
        <label for="desc">Mô tả</label>
        <input type="number" name="price" placeholder="Price" min="0" step=".01" value="100.000" id="price">
        <textarea name="desc" style="resize: none; width: 400px" id="desc"></textarea>
        <label for="rrp">RRP</label>
        <label for="img">Hình ảnh</label>
        <input type="number" name="rrp" placeholder="RRP" min="0" step=".01" value="0.00" id="rrp">
        <input type="file" name="img" id="img">
        <label for="quantity">Số lượng</label>
        <label for="date_added">Ngày thêm</label>
        <input type="number" name="quantity" placeholder="Số lượng" min="0" value="10" id="quantity">
        <input type="datetime-local" name="date_added" value="<?=date('Y-m-d\TH:i')?>" id="date_added">
        <input type="submit" value="Thêm">
    </form>
    <?php if ($msg) : ?>
        <p><?= $msg ?></p>
    <?php endif; ?>
</div>

<?= template_footer() ?>