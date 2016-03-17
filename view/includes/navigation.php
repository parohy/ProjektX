<?php
/**
 * Created by PhpStorm.
 * User: Matus Kacmar
 * Date: 7. 12. 2015
 * Time: 14:23
 */
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/';
include_once ($path.'controllers/NavigationController.php');
$navController = new NavigationController();
?>

    <nav class="page-nav">
        <?php
            $navController->displayNavigation();
        ?>
    </nav>
