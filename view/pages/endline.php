<?php

/*
 * @author Tomas Paronai
 * */

$topdf = "";
if(isset($_SESSION['filepath'])){
    $topdf = $_SESSION['filepath'];
    unset($_SESSION['filepath']);
}
?>

<link rel="stylesheet" type="text/css" href="libraries/css/endline.css">

<h1 class="endlineMessage">Thank you for purchasing our products.</h1>
<h3 class="links">Download order <a id="pdf-link" href="<?php echo $topdf;?>">pdf</a> or view order <a id="order-link" href="?page=accountSettings&profile=orderPreview&orderid=<?php echo $_SESSION['orderid'];?>">here</a>.</h3>
<a href="?page=main-page" class="backToHome">BACK TO HOME PAGE</a>

<?php
if(isset($_SESSION['cart'])) {
    unset($_SESSION['cart']);
}
unset($_SESSION['orderid']);
?>