<?php
/**
 * Created by PhpStorm.
 * User: Matus Kacmar
 * Date: 7. 12. 2015
 * Time: 14:23
 */

include_once (ROOT.'controllers/NavigationController.php');
$navController = new NavigationController();
?>
<div class="bottom">
    <nav class="page-nav">
        <?php
            $navController->displayNavigation();
        ?>
    </nav>
</div>
