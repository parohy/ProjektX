
    <?php
    include "../API/database.php";
    ?>
        <table id="table">
            
            <form name="pruduct-item-formular" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">

              <tr>

                <td> <span class="input-name">Category</td>
                    <td> <select name="categoryID" id="categoryID">
                          <?php
                            $db=new DBHandler();
                            $db->query("SELECT * FROM categories");
                            $result=$db->resultSet();
                            foreach($result as $row) {
                                echo "<option type=\"text\" name=\"".$row['name']."\" id=\"".$row['categoryid']."\" value=\"".$row['categoryid']."\"><ul><li>".$row['categoryid'].". ".$row['name']."</li></ul></option>";
                            }                     
                          ?>  
                      </select>
                    </td>

              </tr>


                  <td><span class="input-name">Amount </td> <td><input class="input" type="text" name="amount" id="amount" size="20"> </td>
                      </tr>

              <tr>
                  <td><span class="input-name">Name </td> <td> <textarea class="input" type="text" name="name" id="name" size="200"></textarea></td>
                    </tr>

              <tr>
                  <td><span class="input-name">Price </td>  <td><input class="input" type="text" name="price" id="price" size="20"></td>
                    </tr>

              <tr>
                  <td><span class="input-name">Brand </td>  <td><input class="input" type="text" name="brand" id="brand" size="20"></td>
                    </tr>

              <tr>
                  <td><span class="input-name"> Description</td> <td> <textarea class="input" rows="5" cols="20" name="description" id="description" size="20">
                    </textarea></td>
                    </tr>



              <tr>
                  <td><span class="input-name">Picture </td> <td><input class="input" type="file" name="filesToUpload[]" id="filesToUpload" multiple="multiple"></td>
                    </tr>
                <tr>
                  <td><input type="submit" name="sent" id="sent"><td>
                </tr>
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
                $target= "../img/products/".$id."/";     
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
                
                

        </table>


