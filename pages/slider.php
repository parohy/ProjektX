<?php
    $handler = new DBHandler();
    $handler->query('SELECT * FROM products');
    $result = $handler->resultSet();
?>
<div class="slider">
    <?php
        for($i = 0; $i < 4; $i++) {
            echo "<div class=\"slide\">";
            echo "<div class=\"slider-image\">";
            echo "<img src=\"../ProjektX/" . $result[$i]['imagepath'] . "\">";
            echo "</div>";
            echo "<div class=\"slider-description\">";
            echo "<article>";
            echo "<header>";
            echo "<h3><a href=\"?page=productPreview&product=" . $result[$i]['productid'] . "\">" . $result[$i]['name'] . "</a></h3>";
            echo "</header>";
            echo "<div class=\"slider-product-description\">";
            echo "<p>" . substr($result[$i]['description'],0,300) . "...</p>";
            echo "</div>";
            echo "<footer class=\"slider-footer\">";
            echo "<h3>".$result[$i]['price']." EUR</h3>";
            echo "<footer>";
            echo "</article>";
            echo "</div>";
            echo "</div>";
        }
    ?>
</div>

<script type="text/javascript">
    $(function(){
        var slides = document.getElementsByClassName("slide");
        var margin = -260;

        setInterval(function() {
            slides[0].style.marginTop = margin + "px";
            margin -= 260;

            if(margin == -1040) {
                margin = 0;
            }
        },5000);
    });
</script>