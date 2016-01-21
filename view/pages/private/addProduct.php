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
	echo $product->categoryid;
}

?>
<form action="controllers/admin/AddProduct.php" method="post" class="addProductForm">
	<?php 		
		echo '<input type="hidden" name="productid" value="'.$id.'">';
	?>
	<input type="hidden" name="productid" value="<?php echo $id;?>">
    <ul>
        <li>
            <div class=" group categories">
                <div class="category">
                    <label for="name">Category</label>
                    <select name="categoryid" id="categoryid">
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
				
				
                <div class="subcategory">
                    <label for="name">Subcategory</label>
                    <select name="subcatid">
                    	<option value="0">None</option>
                    <?php
						foreach($categories as $currentCat){	
							if(isset($currentCat['subcategory']) && count($currentCat['subcategory']) > 0){
								for($i=0;$i<count($currentCat['subcategory']);$i++){
									echo '<option value="'.$currentCat['subcategory'][$i]['id'].'" ';
									if($product != NULL && $product->categoryid == $currentCat['subcategory'][$i]['id']){
										echo 'selected';
									}
									echo '>'.$currentCat['subcategory'][$i]['name'].'</option>';
								}
							}	
						}						
                    ?>
                    	<option value="+">New...</option>
                    </select>
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





