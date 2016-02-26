<?php
/**
 * Created by PhpStorm.
 * User: Matus Kacmar
 * Date: 16. 1. 2016
 * Time: 14:14
 */
?>
<link rel="stylesheet" type="text/css" href="libraries/css/sliderSettings.css">
<h4>Current slider images:</h4>

<div class="sliderImages">
    <?php
    $slidesPath = "libraries/img/slider/slides/";
    $slides = scandir($slidesPath,1);

    foreach($slides as $slide) {
        if($slide == "..") {
            break;
        } else {
            echo '<div class="slide">';
            echo '<div class="sliderImage"><img src="'. $slidesPath . $slide .'"/></div>';
            echo '<div class="sliderImageControlls"><a href="controllers/sliderSettingsController.php?path='. $slidesPath .'&name='.$slide.'" class="delete">X</a></div>';
            echo '</div>';
        }
    }
    ?>
</div>

<div class="addImage">
    <h4>Add new slides:</h4>
    <form action="controllers/sliderSettingsController.php" method="post" enctype="multipart/form-data">
        <input type="file" name="files[]" value="select">
        <input type="submit" name="submit" value="upload">
    </form>
    <span class="error">
        <?php
            if(isset($_SESSION['uploadErr'])) {
                echo $_SESSION['uploadErr'];
                unset($_SESSION['uploadErr']);
            }
        ?>
    </span>
</div>
