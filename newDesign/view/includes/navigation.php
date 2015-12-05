<?php
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
