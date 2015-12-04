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
            require_once 'view/includes/header.php';
            require_once 'view/includes/navigation.php';
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
                include_once 'view/pages/main-page.php';
            } else if($page = 'cart') {
                include_once 'view/pages/cart.php';
            }
        ?>
    </main>

    <footer class="footer">
        <?php
            require_once 'view/includes/footer.php';
        ?>
    </footer>
    <script src="libraries/js/pageScript.js"></script>
</div>
</body>
</html>
