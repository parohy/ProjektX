<link rel="stylesheet" type="text/css" href="css/web-control/delete-item.css">

<div class="frame-container registration">
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    ?>

    <div class="frame-titlebar registration-title"><span class="frame-title">Delete-item</span></div>
    <div class="frame-content">
        <form action="" method="get">
            <ul class="registration-container">
                <li class="registration-item">
                    <ul class="inputs">
                        <li><label for="category">Category:</label>
                            <select name="categoryID" maxlength="20" id="categoryID">
                                <option value="electronics">electronic</option>
                                <option value="pc">PC</option>
                            </select>
                        </li>
                        <li></li>

                        <li><label for="subcategory">Subcategory:</label>
                            <select name="subcategoryID" maxlength="20" id="subcategoryID">
                                <option value="subcategory">subcategory</option>
                                <option value="subcategory">subcategory1</option>
                            </select>
                        </li>
                        <li></li>

                        <li><label for="subcategory">Product:</label>
                            <select name="productID" size="40" id="productID">
                                <?php
                                function productOption($catID ,$catName)
                                {
                                    $db=new DBHandler();
                                    $db->query("SELECT * FROM products WHERE categoryid LIKE '%".$catID."%'");
                                    $result=$db->resultSet();
                                    foreach($result as $row) {
                                        echo "<option type=\"text\" name=\"".$row['name']."\" id=\"".$row['productid']."\" value=\"".$row['productid']."\">-".$catName."-".$row['productid']."-".$row['name']."-</option>";
                                    }

                                }
                                $db=new DBHandler();
                                $db->query("SELECT * FROM categories");
                                $result=$db->resultSet();
                                foreach($result as $row) {
                                    productOption($row['categoryid'],$row['name']);
                                }
                                ?>
                            </select>
                        </li>
                        <li></li>

                        <li><input type="submit" value="Insert"></li>
                    </ul>

            </ul>
        </form>
    </div>
    <script src="../ProjektX/js/regValidation.js"></script>
</div>
