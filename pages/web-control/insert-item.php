<link rel="stylesheet" type="text/css" href="css/web-control/insert-item.css">

<div class="frame-container registration">
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    ?>

    <div class="frame-titlebar registration-title"><span class="frame-title">Insert-item</span></div>
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

                        <li><label for="amount">Amount:</label><input type="text" name="amount" maxlength="20"  id="amount"></li>
                        <li></li>

                        <li><label for="name">Name:</label>
                            <textarea class="input" type="text" name="name" id="name" maxlength="" size="200"></textarea>
                        </li>
                        <li></li>
                        <li><label for="password">Price:</label><input type="text" name="price"  maxlength="20" id="price"></li>
                        <li></li>
                        <li><label for="password">Brand:</label><input type="text" name="brand"  maxlength="20" id="brand"></li>
                        <li></li>
                        <li><label for="name">Description:</label>
                            <textarea class="input" type="text" name="description" id="description" size="200"></textarea>
                        </li>
                        <li></li>
                        <li><label for="name">picture:</label>
                            <input type="file" name="picture" id="picture">
                        </li>
                        <li></li>
                        <li><input type="submit" value="Insert"></li>
                    </ul>
            </ul>
        </form>
    </div>
    <script src="../ProjektX/js/regValidation.js"></script>
</div>
