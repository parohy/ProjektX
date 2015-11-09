<?php
?>
<div class="frame-container search-results">
    <?php
        if(isset($_SESSION['result'])) {
            if($_SESSION['result'] == "No results")
                echo "No results";
            else {
                $result = $_SESSION['result'];
                echo "<h4>". $result["name"] . "</h4>";
                echo "<p>". $result["subcategory"] ."</p>";
                echo "Description";
                echo "<p>". $result["description"] ."</p>";
                echo "<p>Brand:". $result["brand"] ."</p>";
                echo "<p>Price:". $result["price"] ."</p>";
            }
        }
    ?>
</div>