<?php
if(isset($_GET['category'])) {
  $dbhandler = new DBHandler();
  $dbhandler->query('SELECT * FROM products WHERE categoryid=:Categoryid');
  $dbhandler->bind(':Categoryid',$_GET['category']);
  $result = $dbhandler->resultSet();
}
?>
<link rel="stylesheet" type="text/css" href="css/search-style.css">
<div class="frame-container search-results">
    <div class="frame-titlebar"><span class="frame-title"><?php echo $_GET['page']?></span></div>
    <div class="frame-content">
    <?php
    foreach($result as $res) { // Print product item
      echo "<section>";
      echo "<article>";
      echo "<div class='description-image'><img src='". $res['imagepath'] ."'></div>";
      echo "<div class='description-content'>";
      echo "<header>";
      echo "<h4><a href=\"?page=productPreview&product=" . $res['productid'] . "\">". $res["name"] . "</a></h4>";
      echo "<h5>Brand:". $res["brand"] ."</h5>";
      echo "</header>";
      echo "<p class='description'>";
      echo substr($res["description"],0,100) . "...";
      echo "</p>";
      echo "<p class='price'>". $res["price"] ." EUR</p>";
      echo "</div>";
      echo "</article>";
      echo "</section>";
    }
    ?>
    </div>
</div>
