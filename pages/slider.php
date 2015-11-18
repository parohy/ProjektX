<?php
    $handler = new DBHandler();
    $handler->query('SELECT * FROM products');
    $result = $handler->resultSet();
?>

<div id="leftArrow" class="slider-arrows"><</div>
<div id="rightArrow" class="slider-arrows">></div>
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
        var leftArrow = $("#leftArrow");
        var rightArrow = $("#rightArrow");
        var margin = -260;
        var i = 0;

        var interval = setInterval(function(){
            slide();
        },5000);

        leftArrow.click(function() {
            clearInterval(interval);
            if(margin == 0) {
                margin = -780;
            } else {
                margin += 260;
            }

            $(".slide").eq(0).animate({marginTop: margin + "px"});

            interval = setInterval(function(){ slide(); },5000);
        });

        rightArrow.click(function() {

            clearInterval(interval);

            if(margin == -780) {
                margin = 0;
            } else {
                margin -= 260;
            }

            $(".slide").eq(0).animate({marginTop: margin + "px"});

            interval = setInterval(function(){ slide(); },5000);
        });

        function slide() {
          $(".slide").eq(0).animate({marginTop: margin + "px"});
          if(margin <= -780) {
              margin = 0;
          } else {
              margin -= 260;
          }
        }
    });
</script>
