<?php
/**
 * Created by PhpStorm.
 * User: dominik
 * Date: 14.1.2016
 * Time: 9:04
 */
?>

<form action="" method="post" class="addProductForm">
    <ul>
        <li>
            <div class=" group categories">
                <div class="category">
                    <label for="name">Category</label>
                    <select>
                        <option value="">TV,Audio</option>
                        <option value="">PC,Tablets</option>
                        <option value="">Mobile phones</option>
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
            <label for="name">Name</label>      <input type="text" name="email" id="name" >
        </li>

        <li>
            <label for="amount">Amount</label>  <input type="text" name="amount" id="amount" >
        </li>

        <li>
            <label for="price">Price</label>     <input type="text" name="price" id="price" >
        </li>

        <li>
            <label for="description">Description</label>   <textarea  type="text" name="description"  rows="4" id="description"></textarea>
        </li>

        <li>
            <button type="button" class="submit-button">Add</button>

        </li>
    </ul>
</form>





