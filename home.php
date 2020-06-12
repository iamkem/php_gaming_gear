<?php
// Thêm số lượng sản phẩm nổi bật gần đây
$stmt = $pdo->prepare('SELECT * FROM products ORDER BY date_added DESC LIMIT 12');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?= template_header('Home') ?>

<div id="demo" class="carousel slide featured" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="imgs/banner-01.jpg" alt="Los Angeles" width="1700" height="560">
    </div>
    <div class="carousel-item">
      <img src="imgs/banner-02.jpg" alt="Chicago" width="1700" height="560">
    </div>
    <div class="carousel-item">
      <img src="imgs/banner-03.jpg" alt="New York" width="1700" height="560">
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

<div class="recentlyadded content-wrapper">
  <h2>Những sản phẩm nổi bật gần đây</h2>
  <div class="products">
    <?php foreach ($recently_added_products as $product) : ?>
      <a href="index.php?page=product&id=<?= $product['id'] ?>" class="product">
        <img src="imgs/<?= $product['img'] ?>" width="200" height="200" alt="<?= $product['name'] ?>">
        <span class="name"><?= $product['name'] ?></span>
        <span class="price">
          &dollar;<?= $product['price'] ?>
          <?php if ($product['rrp'] > 0) : ?>
            <span class="rrp">&dollar;<?= $product['rrp'] ?></span>
          <?php endif; ?>
        </span>
      </a>
    <?php endforeach; ?>
  </div>
</div>

<?= template_footer() ?>