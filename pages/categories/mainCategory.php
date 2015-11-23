<?php
if(isset($_GET['category']) && isset($_GET['view'])) {
  $view = $_GET['view'];
  $view = (int) $view;

  $dbhandler = new DBHandler(); // CREATE CONNECTION WITH DATABASE

  $dbhandler->beginTransaction(); // BEGIND DATA TRANSACTION

  /****** GET ALL THE PRODUCTS FROM SUBCATEGORIES OF MAIN CATEGORY ******/
  $dbhandler->query('SELECT categoryid FROM categories WHERE parent=:catID'); // GET CHILD OF THIS CATEGORY
  $dbhandler->bind(':catID',$_GET['category']);
  $level1 = $dbhandler->resultSet(); // CHILDREN OF MAIN CATEGORY

  $bindParamLevel1 = array(sizeof($level1));

  for($i = 0; $i < sizeof($level1); $i++) {
      $bindParamLevel1[$i] = ':pr' . $i;
  }

  $parameters = join(",",$bindParamLevel1);
  $query = "SELECT categoryid FROM categories WHERE parent IN(" . $parameters . ")"; // GET GRANDCHILD OF THIS CATEGORY
  $dbhandler->query($query);

  for($i = 0; $i < sizeof($bindParamLevel1); $i++) {
      $dbhandler->bind($bindParamLevel1[$i],$level1[$i]['categoryid']);
  }

  $level2 = $dbhandler->resultSet(); // GRAND CHILDREN OF MAIN CATEGORY

  $level = array_merge($level1,$level2); // MERGE ALL CAREGORY IDS INTO ONE ARRAY

  $bindParam = array(sizeof($level));

  for($i = 0; $i < sizeof($level); $i++) {
      $bindParam[$i] = ':pr' . $i;
  }

  $parameters = join(",",$bindParam);
  $query = "SELECT * FROM products WHERE categoryid IN(" . $parameters . ")"; // SELECT ALL PRODUCTS WHERE CATEGORY ID IS ONE OF THE VALUES IN ARRAY
  $dbhandler->query($query);

  for($i = 0; $i < sizeof($bindParam); $i++) {
      $dbhandler->bind($bindParam[$i],$level[$i]['categoryid']);
  }

  $result = $dbhandler->resultSet();

  /****** GET IMAGES ******/
  $bindParamResult = array(sizeof($result));

  for($i = 0; $i < sizeof($result); $i++) {
      $bindParamResult[$i] = ':pr' . $i;
  }

  $parameters = join(",",$bindParamResult);
  $query = "SELECT pic1path FROM images WHERE productid IN(" . $parameters . ")"; // SELECT IMAGES FOR PRODUCTS
  $dbhandler->query($query);

  for($i = 0; $i < sizeof($bindParamResult); $i++) {
      $dbhandler->bind($bindParamResult[$i],$result[$i]['productid']);
  }

  $images = $dbhandler->resultSet(); // LIST OF IMAGE PATHS

  $dbhandler->endTransaction(); // END DATA TRANSACTION
}
?>
<link rel="stylesheet" type="text/css" href="css/search-style.css">
<div class="frame-container search-results">
    <div class="frame-titlebar"><span class="frame-title"><?php echo $_GET['page']?></span></div>
    <div class="frame-content search-content">
    <?php
    if(sizeof($result) > 10) {
        $iterateTo = 0;

        if($view > sizeof($result)) {
            $iterateTo = sizeof($result);
            $iterateTo = 10 - ($iterateTo % 10);
            $iterateTo = $view - $iterateTo;
        }
        else {
            $iterateTo = $view;
        }

        for($i = $view - 10; $i < $iterateTo; $i++) {
          echo "<section>";
          echo "<article>";
          echo "<div class='description-image'><img src='../ProjektX" . $images[$i]['pic1path'] . "'></div>";
          echo "<div class='description-content'>";
          echo "<header>";
          echo "<h4><a href=\"?page=productPreview&product=" . $result[$i]['productid'] . "\">". $result[$i]["name"] . "</a></h4>";
          echo "<h5>Brand:". $result[$i]["brand"] ."</h5>";
          echo "</header>";
          echo "<p class='description'>";
          echo substr($result[$i]["description"],0,100) . "...";
          echo "</p>";
          echo "<p class='price'>". $result[$i]["price"] ." EUR</p>";
          echo "</div>";
          echo "</article>";
          echo "</section>";
        }

        $size  = sizeof($result);
        $pages = $size / 10;

        if($size % 10 > 0) {
            echo "<span class=\"page-nav\">";
            echo "<a href=\"?page=" . $_GET['page'] . "&category=" . $_GET['category'] . "&view=10\"><<<</a>";
            for($i = 0; $i < $pages; $i++) {
                $temp = $i + 1;
                $temp2 = $temp * 10;
                echo "<a href=\"?page=" . $_GET['page'] . "&category=" . $_GET['category'] . "&view=" . $temp2 . "\">" . $temp . "</a>";
            }
            echo "<a href=\"?page=" . $_GET['page'] . "&category=" . $_GET['category'] . "&view=" . $temp2 . "\">>>></a>";
            echo "</span>";
        }

    } else {
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

      echo "<span class=\"page-nav\"><a href=\"?page=" . $_GET['page'] . "&category=" . $_GET['category'] . "&view=10\" class=\"first-page\"><<</a><a href=\"?page=" . $_GET['page'] . "&category=" . $_GET['category'] . "&view=10\" class=\"page\"> 1 </a><a href=\"?page=" . $_GET['page'] . "&category=" . $_GET['category'] . "&view=10\" class=\"last-page\">>></a></span>";
    }
    ?>
    </div>
</div>
