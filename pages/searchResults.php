<?php
?>
<div class="frame-container search-results">
    <?php
        if(isset($_SESSION['result'])) {
            if($_SESSION['result'] == "No results")
                echo "No results";
            else {
                $result = $_SESSION['result'];
                echo "<h4>". $result["Name"] . "</h4>";
                echo "<p>". $result["Subcategory"] ."</p>";
                echo "Description";
                echo "<p>". $result["Description"] ."</p>";
                echo "<p>Brand:". $result["Brand"] ."</p>";
                echo "<p>Price:". $result["Price"] ."</p>";
            }
        }
    ?>
</div>