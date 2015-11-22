<?php
if(isset($_GET['category'])) {
  $dbhandler = new DBHandler();
  $dbhandler->beginTransaction();
  $dbhandler->query('SELECT categoryid FROM categories WHERE parent=:catID');
  $dbhandler->bind(':catID',$_GET['category']);
  $level1 = $dbhandler->resultSet();

  $bindParamLevel1 = array(sizeof($level1));

  for($i = 0; $i < sizeof($level1); $i++) {
      $bindParamLevel1[$i] = ':pr' . $i;
  }

  $parameters = join(",",$bindParamLevel1);
  $query = "SELECT categoryid FROM categories WHERE parent IN(" . $parameters . ")";

  $dbhandler->query($query);

  for($i = 0; $i < sizeof($bindParamLevel1); $i++) {
      $dbhandler->bind($bindParamLevel1[$i],$level1[$i]['categoryid']);
  }

  $level2 = $dbhandler->resultSet();

  $level = array_merge($level1,$level2);

  $bindParam = array(sizeof($level));

  for($i = 0; $i < sizeof($level); $i++) {
      $bindParam[$i] = ':pr' . $i;
  }

  $parameters = join(",",$bindParam);
  $query = "SELECT * FROM products WHERE categoryid IN(" . $parameters . ")";
  $dbhandler->query($query);

  for($i = 0; $i < sizeof($bindParam); $i++) {
      $dbhandler->bind($bindParam[$i],$level[$i]['categoryid']);
  }

  $result = $dbhandler->resultSet();

  $bindParamResult = array(sizeof($result));

  for($i = 0; $i < sizeof($result); $i++) {
      $bindParamResult[$i] = ':pr' . $i;
  }

  $parameters = join(",",$bindParamResult);
  $query = "SELECT pic1path FROM images WHERE productid IN(" . $parameters . ")";
  $dbhandler->query($query);

  for($i = 0; $i < sizeof($bindParamResult); $i++) {
      $dbhandler->bind($bindParamResult[$i],$result[$i]['productid']);
  }

  $images = $dbhandler->resultSet();
  $dbhandler->endTransaction();
}
?>
<link rel="stylesheet" type="text/css" href="css/search-style.css">
<div class="frame-container search-results">
    <div class="frame-titlebar"><span class="frame-title"><?php echo $_GET['page']?></span></div>
    <div class="frame-content">
    <?php
    $i = 0;
    foreach($result as $res) { // Print product item
      echo "<section>";
      echo "<article>";
      echo "<div class='description-image'><img src='../ProjektX" . $images[$i]['pic1path'] . "'></div>";
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
      $i++;
    }
    ?>
    </div>
</div>
