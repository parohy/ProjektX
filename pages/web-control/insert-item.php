<link rel="stylesheet" type="text/css" href="css/web-control/insert-item.css">

<div class="frame-container registration">
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }     
    ?>

    <div class="frame-titlebar registration-title"><span class="frame-title">Insert-item</span></div>
    <div class="frame-content">
        <form name="pruduct-item-formular" action="?page=insert-item" method="post" enctype="multipart/form-data">
            <ul class="registration-container">
                <li class="registration-item">
                    <ul class="inputs">
                        <li><label for="category">Category:</label>
                            <select name="categoryID" maxlength="20" id="categoryID">
                                <?php
                                    $db=new DBHandler();
                                    $db->query("SELECT * FROM categories");
                                    $result=$db->resultSet();
                                    foreach($result as $row) {
                                        echo "<option type=\"text\" name=\"".$row['name']."\" id=\"".$row['categoryid']."\" value=\"".$row['categoryid']."\"><ul><li>".$row['categoryid'].". ".$row['name']."</li></ul></option>";
                                    }                     
                                ?> 
                            </select>
                        </li>
                        <li></li>
                        <li><label for="subcategory">Subcategory:</label>
                            <select name="subcategoryID" maxlength="20" id="subcategoryID">
                                <option value="subcategory">//TO DO</option>
                                <option value="subcategory1">//TO DO</option>
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
                        <li><label for="name">pictures:</label>
                            <input class="input" type="file" name="filesToUpload[]" id="filesToUpload" multiple="multiple">
                        </li>
                        <li></li>
                        <li><input type="submit" name="sent" value="sent"></li>
                    </ul>
            </ul>
        </form>
    <?php
    if(isset($_POST['sent']))
                {
                $db->query("INSERT INTO products (categoryid, amount, name, price, brand, description, viewamount, datecreated, numofratings, sumofratings) ".
                       "VALUES (:categoryID, :amount, :name, :price, :brand, :desc, :viewamount, :datecreated, :numofratings, :sumofratings)");
                $db->bind(':categoryID', $_POST["categoryID"]);
                $db->bind(':amount', $_POST["amount"]);
                $db->bind(':name', $_POST["name"]);
                $db->bind(':price', $_POST["price"]);
                $db->bind(':brand', $_POST["brand"]);
                $db->bind(':desc', $_POST["description"]);
                $db->bind(':viewamount', 0);
                $db->bind(':datecreated', date("Y-m-d")." ".date("H:i:s"));  //format 2015-11-21 13:57:53
                $db->bind(':numofratings', 0);
                $db->bind(':sumofratings', 0);
                $db->execute();
                $id=$db->lastinsertid();
                $target= "../../img/products/".$id."/";     
                if (!file_exists($target)) {
                mkdir($target, 0777, true);
                }
                $count=0;
                $db=new DBHandler();
                $db->query("INSERT INTO images (productid, pic1path, pic2path, pic3path) VALUES (:productid, :pic1path, :pic2path, :pic3path)");
                $db->bind(':productid', $id);
                foreach ($_FILES['filesToUpload']['name'] as $filename) 
                {
                    $temp=$target;
                    $tmp=$_FILES['filesToUpload']['tmp_name'][$count];
                    $count=$count + 1;
                    if($count<=3)
                    {
                        $bind="pic".$count."path";
                        $db->bind($bind,"*\\img\\products\\".$id."\\".$filename);
                    }
                    $temp=$temp.basename($filename);
                    move_uploaded_file($tmp,$temp);
                    $temp='';
                    $tmp='';
                }     
                for ($i = $count+1; $i <= 3; $i++)
                {
                    $bind="pic".$i."path";
                    $db->bind($bind,"");
                }
                 $db->execute();  
                }
    ?>
        </div>
    <script src="../ProjektX/js/regValidation.js"></script>
</div>
