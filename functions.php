<?php
function pdo_connect_mysql()
{
    // Cấu hình Database
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'gaminggear';
    try {
        return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
        // In ra lỗi nếu kết nối không thành công
        die('Failed to connect to database!');
    }
}
// Template header
function template_header($title)
{
    // Lấy số lượng sản phẩm ở shopping cart, hiển thị số lượng sp trên header
    $num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
    echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <title>$title</title>
        <link rel="shortcut icon" href="imgs/logo.png" />
        <link href="style.css" rel="stylesheet" type="text/css">
        <!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
	</head>
	<body>
        <header>
        <div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i>0796 664 119</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> hoangdinhthangloi@gmail.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> Real Marid</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
						<li><a href="admin/index.html"><i class="fa fa-user-o"></i> My Account</a></li>
					</ul>
				</div>
			</div>
            <div class="content-wrapper">
             <a href="index.php">
                    <h1>Gaming Gear Shop</h1>
                </a>
                <nav>
                    <a href="index.php">Trang chủ</a>
                    <a href="index.php?page=products">Sản phẩm</a>
                </nav>
                <div class="link-icons">
                    <a href="index.php?page=cart">
                    <i class="fa fa-shopping-cart"></i>
                        <span>$num_items_in_cart</span>
					</a>
                </div>
                
            </div>
        </header>
        <main>
EOT;
}
// Template footer
function template_footer()
{
    $year = date('Y');
    echo <<<EOT
        </main>
        <footer>
            <div class="content-wrapper">
                <p>&copy; $year, Hoàng Đình Thắng Lợi - Phan Văn Hòa - Văn Đức Tiến Sỹ</p>
            </div>
        </footer>
        <script src="script.js"></script>
        <script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>
    </body>
</html>
EOT;
}
