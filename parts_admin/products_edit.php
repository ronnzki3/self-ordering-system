<?php
include '../Classes/Dbclass.php';
$db=new Dbclass();
$catId=$_GET['c'];
$getprodId=$_GET['p'];
$getCat="";
$res=$db->select('tblcategory',"*","ID=".$catId);
while($rw=mysqli_fetch_assoc($res)){
    $getCat=$rw['category'];
}

$getproductname='';
$getprice='';
$getPic='';
$res2=$db->select('tblproducts',"*","ID=".$getprodId);
while($rw=mysqli_fetch_assoc($res2)){
    $getproductname=$rw['productname'];
    $getprice=$rw['price'];
    $getPic=$rw['image'];
    $catId=$rw['category_id'];
}
?>

<div class="productsnew-container">
    <div class='bgdiv'>
        <h3 class="addnewproduct-title">Update Product - <?=$getCat?></h1>
    </div>

    <div class="bgdiv forminputs">
        <form enctype="multipart/form-data" method="post" name="fileinfo" id="productform2">
        <p><span class='err_products'></span></p>
        <p>
            <label for="productname">Product name:</label>
            <input type="text" name="productname" class="product" value="<?=$getproductname?>">
        </p>
        <p>
            <label for="price">Price:</label>
            <input type="text" name="price" class="price" value="<?=$getprice?>">
        </p>
        <input type="hidden" name="category" class="category_id" value="<?=$catId;?>">
        <input type="hidden" name="productid" class="product_id" value="<?=$getprodId;?>">
        <p class="oldpic">
            <label for="price">Image</label>
            <img src="images/<?=$getPic?>" width="100px">
            <button class="btnChangePic">Change Image</button>
        </p>
        <p class="newpic newpic-hide">
            <input type="file" id="imgfile" class='uploaded_file' name="imgfile">
        </p>
        <p>
            <input type="submit" id="mysubmit" name="submit" class="btn_update_products" value="Update">
        </p>
        </form>
    </div>
    <div class="showall">
        <a class='showallproducts showprodcancel' href="#">Cancel</a>
    </div>
    <div class="products_added">
       <p class="display_added_products" style="text-align:center;"></p>
    </div>
</div>



<script src="scripts/main.js"></script>