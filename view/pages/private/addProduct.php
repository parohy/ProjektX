<?php
/**
 * Created by PhpStorm.
 * User: dominik
 * Date: 14.1.2016
 * Time: 9:04
 */

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/'; 

?>
<form action="controllers/admin/AddProduct.php" method="post" class="addProductForm">
    <input type="hidden" name="productid" value="NULL">
    <ul>
        <li>
            <div class=" group categories">
                <div class="category">
                    <label for="name">Category</label>
                    <select name="categoryid" id="categoryid">
                        <option value="2">TV,Audio</option>
                        <option value="4">PC,Tablets</option>
                        <option value="6">Mobile phones</option>
                    </select>
                </div>

                <div class="subcategory">
                    <label for="name">Subcategory</label>
                    <select>
                        <option value="">TV,Audio</option>
                        <option value="">PC,Tablets</option>
                        <option value="">Mobile phones</option>
                    </select>
                </div>
            </div>

        </li>
        <li>
            <label for="name">Name</label>      <input type="text" name="name" id="name" >
        </li>

        <li>
            <label for="amount">Amount</label>  <input type="text" name="amount" id="amount" >
        </li>
        
        <li>
            <label for="brandid">Brandid</label>  <input type="text" name="brandid" id="brandid" >
        </li>

        <li>
            <label for="price">Price</label>     <input type="text" name="price" id="price" >
        </li>

        <li>
            <label for="description">Description</label>   <textarea  type="text" name="description"  rows="4" id="description"></textarea>
        </li>

        <li>
            <input type="submit" class="submit-button" value="Add"></button>

        </li>
    </ul>
</form>





