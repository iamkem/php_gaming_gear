<?php
// Thêm số lượng sản phẩm nổi bật gần đây
$stmt = $pdo->prepare('SELECT * FROM products ORDER BY date_added DESC LIMIT 12');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?= template_header('Home') ?>
<div class="featured">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="imgs/banner-01.jpg" alt="Los Angeles" width="1440" height="560">
      </div>

      <div class="item">
        <img src="imgs/banner-02.jpg" alt="Chicago" width="1440" height="560">
      </div>

      <div class="item">
        <img src="imgs/banner-03.jpg" alt="New york" width="1440" height="560">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="icon-prev" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="icon-next" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
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