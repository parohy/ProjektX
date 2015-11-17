
<!doctype html>
<html lang="">
<head>

<style>




    .tabs input[type=radio] {
        position: absolute;
       display: none;
    }
    .tabs {
        width: 650px;
        float: none;
        list-style: none;
        position: relative;
        padding: 0;

    }
     .tabs li{
        float: left;
    }
    .tabs label {
        display: block;
        padding: 10px 20px;
        border-radius: 2px 2px 0 0;
        color: black;
        font-size: 18px;
        font-weight: normal;
        font-family: 'Lily Script One', helveti;
        background: rgba(255,255,255,0.2);
        cursor: pointer;
        position: relative;
        top: 3px;
        -webkit-transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out;
        transition: all 0.2s ease-in-out;
    }
    .tabs label:hover {
        background: rgba(255,255,255,0.5);
        top: 0;
    }

    [id^=tab]:checked + label {
        background: #8A8686;
        color: black
    ;
        top: 0;
    }

    [id^=tab]:checked ~ [id^=tab-content] {
        display: block;
    }
    .tab-content{
        z-index: 2;
        display: none;
        text-align: left;
        width: 100%;
        height: 450px;
        font-size: 20px;
        line-height: 140%;
        padding-top: 10px;
        background: #8A8686;
        margin-top: 20PX;
        padding: 15px;
        color: black;
        position: absolute;
        top: 53px;
        left: 0;
        box-sizing: border-box;
        -webkit-animation-duration: 0.5s;
        -o-animation-duration: 0.5s;
        -moz-animation-duration: 0.5s;
        animation-duration: 0.5s;
    }






 </style>

</head>




<body>
<div id="main">
<ul class="tabs">
    <li>
        <input type="radio" checked name="tabs" id="tab1">
        <label for="tab1">Insert item</label>
        <div id="tab-content1" class="tab-content animated fadeIn">
            <?php
                include "product-item.php"
            ?>
        </div>

    </li>
    <li>
        <input type="radio" name="tabs" id="tab2">
        <label for="tab2">Delete item</label>
        <div id="tab-content2" class="tab-content animated fadeIn">

               <form id="delete-product" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                    <table>
                        <tr>

                            <td> <span class="input-name">Product</td>
                            <td> <select name="productID" id="productID" size="1" >
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
                            </td>

                        </tr>
                        <tr>
                            <td><input type="submit" name="delete" id="delete" value="delete"><td>
                        </tr>
                    </table>
                        <?php
                            if(isset($_POST['delete']))
                            {
                                $prodID=$_POST["productID"];
                                $db->query("DELETE FROM products WHERE productid LIKE '%".$prodID."%'");
                                $db->execute();                   
                            }                
                        ?>
               </form>
        </div>
    </li>


    <li>
        <input type="radio" name="tabs" id="tab3">
        <label for="tab3">Change video</label>
        <div id="tab-content3" class="tab-content animated fadeIn">

                <form id="delete-product" action="/edit" method="get">
                    <table>
                        <tr>
                            <td><span class="input-name">Video </td> <td><input class="input" type="file" name="videopath" id="videopath"></td>
                        </tr>
                        <tr>
                            <td> <input type="submit" name="sent" id="sent" value="change"> </td>
                        </tr>
                    </table>
                </form>

        </div>
    </li>
	


	   <li>
        <input type="radio" name="tabs" id="tab4">
        <label for="tab4">Change Welcome<br>messaage</label>
        <div id="tab-content4" class="tab-content animated fadeIn">
            <form id="delete-product" action="/edit" method="get">
                <table>
                    <tr>
                        <td><span class="input-name">Welcome message </td>
                    </tr>

                    <tr>
                     <td><input class="input" type="text" name="Wmessage" id="Wmessage"></td>
                    </tr>

                    <tr>
                        <td> <input type="submit" name="sent" id="sent" value="change"> </td>
                    </tr>
                </table>
            </form>

        </div>
   
</ul>

</div>
</body>

</html>