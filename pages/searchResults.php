<?php
/**
 * Author: Matus Kacmar
 */
?>
<link rel="stylesheet" type="text/css" href="css/search-style.css">

<div class="frame-container search-results">
    <div class="frame-titlebar search-titlebar">
        <span class="frame-title">Search results for:
            <?php
                if(isset($_SESSION['search'])) { // Displays searched term
                    $search = $_SESSION['search'];
                    echo $search;
                }
            ?>
        </span>
    </div>
    <?php
        if(isset($_SESSION['result']) && isset($_SESSION['images'])) {
            if($_SESSION['result'] == "No results") // If no results found print Message
                echo "<h3 class='no-result'>"."No results"."</h3>";
            else {
                $result = $_SESSION['result'];
                $images = $_SESSION['images'];
                $i = 0;
                foreach($result as $res) { // Print product item
                  echo "<section>";
                  echo "<article>";
                  echo "<div class='description-image'><img src='../ProjektX". $images[$i]['pic1path'] ."'></div>";
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
            }
        }
    ?>
</div>
