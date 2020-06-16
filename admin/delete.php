<?php
include 'adminfunctions.php';
$pdo = pdo_connect_mysql();
$msg = '';

if (isset($_GET['id'])) {

    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$product) {
        exit('Contact doesn\'t exist with that ID!');
    }

    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
    
            $stmt = $pdo->prepare('DELETE FROM products WHERE id = ?');
            $stmt->execute([$_GET['id']]);
            $msg = 'Xóa sản phẩm thành công!';
        } else {
           
            header('Location: home.php');
            exit;
        }
    }
} else {
    exit('No ID specified!');
}
?>

<?=template_header('Xóa sản phẩm')?>

<div class="content delete">
	<h2>Xóa sản phẩm #<?=$product['id']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Bạn có muốn xóa sản phẩm #?<?=$product['id']?>?</p>
    <div class="yesno">
        <a href="delete.php?id=<?=$product['id']?>&confirm=yes">Có</a>
        <a href="delete.php?id=<?=$product['id']?>&confirm=no">Không</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>