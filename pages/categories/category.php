<?php
if(isset($_GET['category'])) {
  $dbhandler = new DBHandler();
  $dbhandler->beginTransaction();

  $dbhandler->query('SELECT categoryid FROM categories WHERE parent=:Categoryid');
  $dbhandler->bind(':Categoryid',$_GET['category']);
  $subcategories = $dbhandler->resultSet();

  if($subcategories == null) {
      $dbhandler->query('SELECT * FROM products WHERE categoryid=:Categoryid');
      $dbhandler->bind(':Categoryid',$_GET['category']);
      $result = $dbhandler->resultSet();
  } else {
      $bindParam = array(sizeof($subcategories));

      for($i = 0; $i < sizeof($subcategories); $i++) {
          $bindParam[$i] = ":pr" . $i;
      }

      $parameters = join(",",$bindParam);
      $query = "SELECT * FROM products WHERE categoryid IN(" . $parameters . ")";
      $dbhandler->query($query);

      for($i = 0; $i < sizeof($subcategories); $i++) {
          $dbhandler->bind($bindParam[$i],$subcategories[$i]['categoryid']);
      }

      $result = $dbhandler->resultSet();
  }

  $imageParam = array(sizeof($result));

  for($i = 0; $i < sizeof($result); $i++) {
      $imageParam[$i] = ":pr" . $i;
  }

  $parameters = join(",",$imageParam);
  $query = "SELECT pic1path FROM images WHERE productid IN(" . $parameters . ")";
  $dbhandler->query($query);

  for($i = 0; $i < sizeof($result); $i++) {
      $dbhandler->bind($imageParam[$i],$result[$i]['productid']);
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
