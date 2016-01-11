<?php
/**
 * Created by PhpStorm.
 * User: Matus
 * Date: 8. 12. 2015
 * Time: 22:15
 */
?>
<div class="sorting-table">

    <form action="" method="GET">
        <ul>
            <li><span class="table-header">PRICE</span></li>
            <li><input type="checkbox" name="0-99"> 0 EUR - 99 EUR</li>
            <li><input type="checkbox" name="100-199"> 100 EUR - 199 EUR</li>
            <li><input type="checkbox" name="200-299"> 200 EUR - 299 EUR</li>
            <li><input type="checkbox" name="300-399"> 300 EUR - 399 EUR</li>
            <li><input type="checkbox" name="400-M"> 400 EUR OR MORE</li>
            <li><input type="checkbox" name="custom"> <input type="number" name="first-custom"> - <input type="number" name="second-custom"></li>
        </ul>
    </form>

    <form action="" method="GET">
        <ul>
            <li><span class="table-header">BRAND</span></li>
            <li><input type="checkbox" name="apple"> APPLE</li>
            <li><input type="checkbox" name="asus"> ASUS</li>
            <li><input type="checkbox" name="dell"> DELL</li>
            <li><input type="checkbox" name="hp"> HP</li>
            <li><input type="checkbox" name="samsung"> SAMSUNG</li>
        </ul>
    </form> 
</div>