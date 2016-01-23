<?php
/**
 * Created by PhpStorm.
 * User: Matus
 * Date: 8. 12. 2015
 * Time: 22:15
 */
?>
<div class="sorting-table">
    <form id="priceRangeForm" action="" method="GET">
        <ul>
            <li><span class="table-header">PRICE</span></li>
            <li><input type="radio" name="price" data-min="0" data-max="99"> 0 EUR - 99 EUR</li>
            <li><input type="radio" name="price" data-min="100" data-max="199"> 100 EUR - 199 EUR</li>
            <li><input type="radio" name="price" data-min="200" data-max="299"> 200 EUR - 299 EUR</li>
            <li><input type="radio" name="price" data-min="300" data-max="399"> 300 EUR - 399 EUR</li>
            <li><input type="radio" name="price" data-min="400" data-max=""> 400 EUR OR MORE</li>
            <li><input type="radio" name="price" value="custom"> <input type="number" name="min-custom"> - <input type="number" name="max-custom"></li>
        </ul>
    </form>
    <form id="sortForm" action="" method="GET">
        <ul>
            <li><span class="table-header">SORT</span></li>
            <li><input type="radio" name="sort" value="0"> Rating</li>
            <li><input type="radio" name="sort" value="4"> Price: Low to High</li>
            <li><input type="radio" name="sort" value="3"> Price: High to Low</li>
            <li><input type="radio" name="sort" value="5"> Alphabetical: A-Z</li>
            <li><input type="radio" name="sort" value="6"> Alphabetical: Z-A</li>
        </ul>
    </form>
    <form id="brandsForm" action="" method="GET">
        <ul>
            <li><span class="table-header">BRAND</span></li>
            <!-- Generate brands from DB -->
            <li>
                <select>
                    <option value="1" name="sony"> SONY</option>
                    <option value="2" name="panasonic"> PANASONIC</option>
                    <option value="10" name="asus"> ASUS</option>
                    <option value="11" name="apple"> APPLE</option>
                    <option value="12" name="lenovo"> LENOVO</option>
                    <option value="15" name="samsung"> SAMSUNG</option>
                </select>
            </li>
            <!--
            <li><input type="checkbox" value="1" name="sony"> SONY</li>
            <li><input type="checkbox" value="2" name="panasonic"> PANASONIC</li>
            <li><input type="checkbox" value="10" name="asus"> ASUS</li>
            <li><input type="checkbox" value="11" name="apple"> APPLE</li>
            <li><input type="checkbox" value="12" name="lenovo"> LENOVO</li>
            <li><input type="checkbox" value="15" name="samsung"> SAMSUNG</li>-->
        </ul>
    </form>    
    <button class="filterButton" onClick="filterSearch()">Search</button>
</div>
<script src="libraries/js/filterRequestScript.js"></script>