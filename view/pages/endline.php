<?php

/*
 * @author Tomas Paronai
 * */

$topdf = "";
if(isset($_GET['filepath'])){
    $topdf = $_GET['filepath'];
}

?>

<link rel="stylesheet" type="text/css" href="libraries/css/endline.css">

<h1 class="message">Thank you for purchasing our products.</h1>
<h3 class="links">Download order <a id="pdf-link" href="<?php echo $topdf;?>">pdf</a> or view order <a id="order-link" href="">here</a>.</h3>
<?php
if(isset($_SESSION['cart'])) {
    unset($_SESSION['cart']);
}
?>