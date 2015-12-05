<?php
session_start();

include ("config.php");
include (ROOT."API/Database.php");

if(isset($_GET['product'])) {
    if(!isset($_COOKIE[$_GET['product']])) setcookie($_GET['product'],"false", 60 * 60 * 24 * 60 + time(),"/");

    if(isset($_COOKIE[$_GET['product']]) == "false") {
        if(isset($_GET['rating'])) {
            setcookie($_GET['product'],"true", 60 * 60 * 24 * 60 + time(),"/");

            $handler = new DBHandler();
            $handler->beginTransaction();
            $handler->query('SELECT numofratings,sumofratings FROM products WHERE productid=:id');
            $handler->bind(":id",$_GET['product']);
            $ratingResult = $handler->singleRecord();

            $ratingResult['numofratings'] += 1;
            $ratingResult['sumofratings'] += $_GET['rating'];

            $handler->query('UPDATE products SET numofratings=:numofratings,sumofratings=:sumofratings WHERE productid=:id');
            $handler->bind(":numofratings", $ratingResult['numofratings']);
            $handler->bind(":sumofratings", $ratingResult['sumofratings']);
            $handler->bind(":id", $_GET['product']);
            $handler->execute();
            $handler->endTransaction();
            header("Location: ?page=productPreview&product=" . $_GET['product'],"Content-Type: text/html; charset=UTF-8");
        }
    }
}

if(isset($_GET['login']) && $_GET['login'] == 'false') {
    session_destroy();
    header('Location: ?page=main-page','Content-Type: text/html; charset=UTF-8');
    exit();
}

//$_SESSION['loggedin'] = false; //true if logged in, false if not

//$_SESSION['loginErr'] = null; //contains loggin error or login message if successful
//$_SESSION['registerErr'] = null; //contains registration error or registration message if successful
//$_SESSION['editErr'] //edit error message;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <title></title>
    <link rel="stylesheet" type="text/css" href="libraries/css/main.css">

    <script src="libraries/js/jquery-1.11.3.min.js"></script>
</head>
<body>
<div class="container">
    <header class="page-header">
        <?php
            require_once (ROOT.'view/includes/header.php');
            require_once (ROOT.'view/includes/navigation.php');
        ?>
    </header>

    <main class="main">
        <?php
            if(isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = "";
            }
            if($page == 'main-page' || $page == '') {
                include_once (ROOT.'view/pages/main-page.php');
            }
            else if($page == 'cart') {
                include_once (ROOT.'view/pages/cart.php');
            }
            else if($page == 'reg-acc') {
                include_once (ROOT.'view/pages/reg-acc.php');
            }
        ?>
    </main>

    <footer class="footer">
        <?php
            require_once (ROOT.'view/includes/footer.php');
        ?>
    </footer>
    <script src="libraries/js/pageScript.js"></script>
</div>
</body>
</html>
