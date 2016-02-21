<?php
/**
 * Created by PhpStorm.
 * User: dominik
 * Date: 14.1.2016
 * Time: 9:04
 */

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/'; 

include_once ($path . 'API/Category.php');
include_once ($path . 'API/Brand.php');
include_once ($path . 'API/Product.php');

$catHandler = new Category();
$categories = $catHandler->getCategories();
$sub = false;
$product = NULL;
$id = NULL;
$pIndex = 0;
$categoryPath = NULL;
$arrayOfSubs = $catHandler->createSubs();
if(isset($_GET['productid'])){
	$id = $_GET['productid'];
	$product = new Product($id);
    $categoryPath = $catHandler->getCatPath($product->categoryid);
    $pIndex = count($categoryPath)-1;
}
else{
    $pIndex = -1;
}


function generateSub($id,$categories){
    if($GLOBALS['pIndex'] >= 0){
        $merge = false;

        if($GLOBALS['categoryPath'][$GLOBALS['pIndex']+1] != NULL){
            $pointer = $GLOBALS['categoryPath'][$GLOBALS['pIndex']+1];
            $array = $categories[$pointer];
            if(count($array) > 0){

                echo '<select id="subcategory' . $GLOBALS['index'] . '" name="subcategory" onchange="generateNextSub('.$GLOBALS['index']++.')">';
                echo '<option value="0" '.'>None</option>';
                for($i=0;$i<count($array);$i++){
                    echo '<option value="'.$array[$i]['categoryid'].'" ';
                    if($array[$i]['categoryid'] == $id){
                        echo 'selected';
                        $GLOBALS['pIndex']--;
                        $merge = true;
                    }
                    echo '>'.$array[$i]['name'] . '</option>';
                }
                //echo '<option value="+" '.'>New...</option>';
                echo '</select>';
            }
        }

        if($merge === true && $GLOBALS['pIndex'] >= 0){
            generateSub($GLOBALS['categoryPath'][$GLOBALS['pIndex']],$categories);
        }
    }
}

?>
<script type="text/javascript">
    var indexing = 1;
    var subs = <?php if($arrayOfSubs != NULL) echo json_encode($arrayOfSubs); else echo 'null';?>;
    var current = <?php if($product != NULL) echo json_encode($product->categoryid); else echo 'null';?>;


    function generateSub(){
        clearSubs();

        var index = document.getElementById('categoryid').value;
        if(subs[index] != null){
            var parent = document.getElementById('subcategory');

            var labelPar = document.getElementById('sub-title');
            var label = document.createElement('label');
            label.setAttribute('for','name');
            label.setAttribute('id','sublabel');
            label.setAttribute('class','inputName');
            label.innerHTML = 'Subcategory';
            labelPar.appendChild(label);

            var select = document.createElement('select');
            select.setAttribute('id','subcategory'+indexing);
            select.setAttribute('name','subcategory');

            var first = document.createElement('option');
            first.setAttribute('value','0');
            first.innerHTML = 'None';
            select.appendChild(first);

            var i = 0;
            for(i;i<subs[index].length;i++){
                var option = document.createElement('option');
                option.setAttribute('value',subs[index][i]['categoryid']);
                if(subs[index][i]['categoryid'] == current){
                    option.selected = true;
                }
                option.innerHTML = subs[index][i]['name'];
                select.appendChild(option);
            }

            /*var last = document.createElement('option');
            last.setAttribute('value','+');
            last.innerHTML = 'New...';
            select.appendChild(last);*/

            select.setAttribute('onchange','generateNextSub('+(indexing++)+')');
            parent.appendChild(select);
        }
    }


    function generateNextSub(val){
        clearSpecSubs('subcategory'+(parseInt(val)+1));
        var index = document.getElementById('subcategory'+val).value;

        if(subs[index] != null){
            var parent = document.getElementById('subcategory');
            var select = document.createElement('select');
            select.setAttribute('id','subcategory'+indexing);
            select.setAttribute('name','subcategory');

            var first = document.createElement('option');
            first.setAttribute('value','0');
            first.innerHTML = 'None';
            select.appendChild(first);

            var i = 0;
            for(i;i<subs[index].length;i++){
                var option = document.createElement('option');
                option.setAttribute('value',subs[index][i]['categoryid']);
                if(subs[index][i]['categoryid'] == current){
                    option.selected = true;
                }
                option.innerHTML = subs[index][i]['name'];
                select.appendChild(option);
            }

            /*var last = document.createElement('option');
            last.setAttribute('value','+');
            last.innerHTML = 'New...';
            select.appendChild(last);*/

            select.setAttribute('onchange','generateNextSub('+(indexing++)+')');
            parent.appendChild(select);
        }
    }

    function clearSubs(){
        var node = document.getElementById('subcategory');
        while (node.firstChild) {
            node.removeChild(node.firstChild);
        }
        var labelPar = document.getElementById('sub-title');
        var label = document.getElementById('sublabel');
        if(label != null){
            labelPar.removeChild(label);
        }
    }

    function clearSpecSubs(namespace){
        var node = document.getElementById('subcategory');
        var child = document.getElementById(namespace);
        if(child != null && node != null){
            node.removeChild(child);
        }

    }
</script>

<form action="controllers/admin/AddProduct.php" method="post" class="addProductForm">
	<input type="hidden" name="productid" value="<?php echo $id;?>">
    <ul>
        <li>


                    <label class="inputName" for="name">Category</label>
                    <select  class="edit-input" name="categoryid" id="categoryid" onchange="generateSub()">
                        <?php
                        foreach($categories as $currentCat){
                            echo '<option value="'.$currentCat['id'].'" ';
                            if($pIndex >= 0 && $categoryPath[$pIndex] == $currentCat['id']){
                                echo 'selected';
                                $pIndex--;
                            }
                            echo '>'.$currentCat['category'].'</option>';
                        }
                        //echo '<option value="0">New...</option>';
                        ?>

                    </select>

        </li>
				<li id="sub-title">
                    <?php
                    if($pIndex >= 0){
                        echo '<label id="sublabel"'.' class="inputName"'.' for="name">'.'Subcategory</'.'label>';
                    }
                    ?>
                    <!--<label class="inputName" for="name">Subcategory</label>-->
                            <div id="subcategory">
                                <!--<div class="subcategory-choice">-->
                                    <?php
                                    $index = 0;
                                    if($pIndex >= 0){
                                        generateSub($categoryPath[$pIndex], $arrayOfSubs);
                                    }
                                    ?>
                                <!--</div>-->
                            </div>
        </li>
        <li>
            <label class="inputName" for="name">Name</label>      <input class="edit-input" type="text" name="name" id="name" value="<?php if($product != NULL) echo $product->name;?>" >
        </li>

        <li>
            <label class="inputName" for="amount">Amount</label>  <input  class="edit-input" type="text" name="amount" id="amount" value="<?php if($product != NULL) echo $product->amount;?>" >
        </li>

        <li>
            <label class="inputName" for="price">Price</label>     <input  class="edit-input" type="text" name="price" id="price" value="<?php if($product != NULL) echo $product->price;?>" >
        </li>
        
        <li>
            <label class="inputName" for="brandid">Brand</label>
            <!--  <input type="text" name="brandid" id="brandid" >-->  
            <select class="edit-input" name="brand">
                <?php
                    $brandHand = new Brand();
                    $brands = $brandHand->getAllBrands();
                    for($i=0;$i<count($brands);$i++){
                        echo '<option value="'.$brands[$i]['brandid'].'" ';
                        if($product != NULL && $product->brandid == $brands[$i]['brandid']){
                            echo 'selected';
                        }
                        echo '>'.$brands[$i]['name'].'</option>';
                    }
                    //echo '<option value="+">New...</option>';
                ?>

            </select>
        </li>

        <li>
            <label class="inputName" for="description">Description</label>   <textarea  type="text" name="description"  rows="4" id="description" value="<?php if($product != NULL) echo $product->description;?>"></textarea>
        </li>


        <li >
            <input type="submit" class="submit-button" value="Add" style="height: 58px"></button>

        </li>
    </ul>
</form>





