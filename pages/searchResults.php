<link rel="stylesheet" type="text/css" href="css/search-style.css">

<div class="frame-container search-results">
    <div class="frame-titlebar search-titlebar">
        <span class="frame-title">Search results for:
            <?php
                if(isset($_SESSION['search'])) {
                    $search = $_SESSION['search'];

                    echo $search;
                }
            ?>
        </span>
    </div>
    <?php
        if(isset($_SESSION['result'])) {
            if($_SESSION['result'] == "No results")
                echo "<h3 class='no-result'>"."No results"."</h3>";
            else {
                $result = $_SESSION['result'];
                printQuery($result);


            }
        }

    function printQuery($result) {
        echo "<section>";
        echo "<article>";
        echo "<div class='description-image'><img src='". $result['imagepath'] ."'></div>";
        echo "<div class='description-content'>";
        echo "<header>";
        echo "<h4><a href=\"?page=productPreview&product=" . $result['productid'] . "\">". $result["name"] . "</a></h4>";
        echo "<h5>Brand:". $result["brand"] ."</h5>";
        echo "</header>";
        echo "<p class='description'>";
        echo substr($result["description"],0,100) . "...";
        echo "</p>";
        echo "<p class='price'>". $result["price"] ." EUR</p>";
        echo "</div>";
        echo "</article>";
        echo "</section>";
    }
    ?>
</div>