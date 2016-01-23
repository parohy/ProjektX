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
$product = NULL;
$id = NULL;
if(isset($_GET['productid'])){
	$id = $_GET['productid'];
	$product = new Product($id);
}

$arrayOfSubs = $catHandler->createSubs();
//echo var_dump($arrayOfSubs);

?>
<script type="text/javascript">
    var indexing = 1;
    var subs = <?php echo json_encode($arrayOfSubs);?>;
    var current = <?php echo json_encode($product->categoryid)?>;

    function generateSub(){
        clearSubs();

        var index = document.getElementById('categoryid').value;
        if(subs[index] != null){
            var parent = document.getElementById('subcategory');
            var label = document.createElement('label');
            label.setAttribute('for','name');
            label.innerHTML = 'Subcategory';
            parent.appendChild(label);
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

            var last = document.createElement('option');
            last.setAttribute('value','+');
            last.innerHTML = 'New...';
            select.appendChild(last);

            select.setAttribute('onchange','generateNextSub('+(indexing++)+')');
            parent.appendChild(select);
        }
    }


    function generateNextSub(val){
        //clearSpecSubs('subcategory'+(parseInt(val)+1));
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

            var last = document.createElement('option');
            last.setAttribute('value','+');
            last.innerHTML = 'New...';
            select.appendChild(last);

            select.setAttribute('onchange','generateNextSub('+(indexing++)+')');
            parent.appendChild(select);
        }
    }

    function clearSubs(){
        var node = document.getElementById('subcategory');
        while (node.firstChild) {
            node.removeChild(node.firstChild);
        }
    }

    function clearSpecSubs(namespace){
        var node = document.getElementById('subcategory');
        node.removeChild(document.getElementById(namespace));
    }
</script>

<form action="controllers/admin/AddProduct.php" method="post" class="addProductForm">
	<input type="hidden" name="productid" value="<?php echo $id;?>">
    <ul>
        <li>
            <div class=" group categories">
                <div class="category">
                    <label for="name">Category</label>
                    <select name="categoryid" id="categoryid" onchange="generateSub()">
                        <?php
                        foreach($categories as $currentCat){
                            echo '<option value="'.$currentCat['id'].'" ';
                            if($product != NULL && $product->categoryid == $currentCat['id']){
                                echo 'selected';
                            }
                            echo '>'.$currentCat['category'].'</option>';
                        }
                        ?>
                    	<option value="0">New...</option>
                    </select>
                </div>
				
				
                <div class="subcategory" id="subcategory">
                    <!--<label for="name">Subcategory</label>
                    <select name="categoryid1" id="categoryid1" onchange="generateNextSub()">
                    	<option value="0">None</option>

                    	<option value="+">New...</option>
                    </select> -->
                </div>
            </div>

        </li>
        <li>
            <label for="name">Name</label>      <input type="text" name="name" id="name" value="<?php if($product != NULL) echo $product->name;?>" >
        </li>

        <li>
            <label for="amount">Amount</label>  <input type="text" name="amount" id="amount" value="<?php if($product != NULL) echo $product->amount;?>" >
        </li>
        
        <li>
            <label for="brandid">Brand</label>
            <!--  <input type="text" name="brandid" id="brandid" >-->  
            <select name="brand">
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
            ?>
            <option value="+">New...</option>
        </li>

        <li>
            <label for="price">Price</label>     <input type="text" name="price" id="price" value="<?php if($product != NULL) echo $product->price;?>" >
        </li>

        <li>
            <label for="description">Description</label>   <textarea  type="text" name="description"  rows="4" id="description" value="<?php if($product != NULL) echo $product->description;?>"></textarea>
        </li>

        <li>
            <input type="submit" class="submit-button" value="Add"></button>

        </li>
    </ul>
</form>





