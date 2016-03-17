<?php
/**
 * Created by PhpStorm.
 * User: Matus
 * Date: 8. 12. 2015
 * Time: 17:28
 */

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/';
include_once ($path.'API/Statistics.php');
$statistics=new Statistics;
$viewcounter=new Viewcounter;

?>
<link rel="stylesheet" type="text/css" href="libraries/css/admin-panel.css">
<?php
        include $path.'view/includes/chart.php';

?>
<div class="statistics">
        <table>
            <tr>
                <td>Products:</td>  <td><?php echo $statistics->getProductCount()?></td>
            </tr>

            <tr>
                <td>Registered users:</td>  <td><?php echo $statistics->getUserCount()?></td>
            </tr>

            <tr>
                <td>Orders shipped:</td>  <td><?php echo $statistics->getShippedOrderCount()?></td>
            </tr>

            <tr>
                <td>Orders not shipped:</td>  <td><?php echo $statistics->getNotShippedOrderCount()?></td>
            </tr>

            <tr>
                <td>Best selling product:</td>  <td><?php echo $statistics->getBestSellingProduct()?></td>
            </tr>

            <tr>
                <td>Page views:</td>  <td><?php echo $viewcounter->getTotalViews()?></td>
            </tr>
        </table>

</div>
