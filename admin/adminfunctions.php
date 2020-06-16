<?php
function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'gaminggear';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}

function template_header($title) {
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>$title</title>
            <link href="admin.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        </head>
        <body class="loggedin">
        <nav class="navtop">
            <div>
            <div><h1>ADMIN</h1></div>
            <div>
                <a href="profile.php"><i class="fas fa-home"></i>Hồ sơ</a>
                <a href="logout.php"><i class="fas fa-address-book"></i>Đăng xuất</a>
                </div>
            </div>
        </nav>
    EOT;
    }
    function template_footer() {
    echo <<<EOT
        </body>
    </html>
    EOT;
    }
?>

