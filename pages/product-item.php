
    <?php
    include "../API/database.php";
    ?>
        <table id="table">
            
            <form name="pruduct-item-formular" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">

              <tr>

                <td> <span class="input-name">Category</td>
                    <td> <select name="categoryID" id="categoryID">
                          <?php
                            $db=new DBHandler();
                            $db->query("SELECT * FROM categories");
                            $result=$db->resultSet();
                            foreach($result as $row) {
                                echo "<option type=\"text\" name=\"".$row['name']."\" id=\"".$row['categoryid']."\" value=\"".$row['categoryid']."\">".$row['categoryid'].". ".$row['name']."</option>";
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
                  <td><span class="input-name">Picture </td> <td><input class="input" type="file" name="imagepath" id="imagepath"></td>
                    </tr>
                <tr>
                  <td><input type="submit" name="sent" id="sent"><td>
                </tr>

                <?php
                if(isset($_POST['sent']))
                {
                

                $db->query("INSERT INTO products (categoryid, amount, name, price, brand, description, viewamount, imagepath, numofratings, sumofratings) ".
                       "VALUES (:categoryID, :amount, :name, :price, :brand, :desc, :viewamount, :imagepath, :numofratings, :sumofratings)");
                $db->bind(':categoryID', $_POST["categoryID"]);
                $db->bind(':amount', $_POST["amount"]);
                $db->bind(':name', $_POST["name"]);
                $db->bind(':price', $_POST["price"]);
                $db->bind(':brand', $_POST["brand"]);
                $db->bind(':desc', $_POST["description"]);
                $db->bind(':viewamount', 0);
                $db->bind(':imagepath', 0);
                $db->bind(':numofratings', 0);
                $db->bind(':sumofratings', 0);
                $db->execute();
                }
                ?>
                
                
             </form>

        </table>


