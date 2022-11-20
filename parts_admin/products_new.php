<?php
include '../Classes/Dbclass.php';
$db=new Dbclass();
$catId=$_GET['id'];
$getCat="";
$res=$db->select('tblcategory',"*","ID=".$catId);
while($rw=mysqli_fetch_assoc($res)){
    $getCat=$rw['category'];
}
?>

<div class="productsnew-container">
    <div class='bgdiv'>
        <h3 class="addnewproduct-title">Add new Product - <?=$getCat?></h1>
    </div>

    <div class="bgdiv forminputs">
        <form enctype="multipart/form-data" method="post" name="fileinfo" id="productform">
        <p><span class='err_products'></span></p>
        <p>
            <label for="productname">Product name:</label>
            <input type="text" name="productname" class="product" placeholder="product name">
        </p>
        <p>
            <label for="price">Price:</label>
            <input type="text" name="price" class="price" placeholder="price">
        </p>
        <input type="hidden" name="category" class="category_id" value="<?=$_GET['id'];?>">
        <p>
            <input type="file" id="imgfile" class='uploaded_file' name="imgfile">
        </p>
        <p>
            <input type="submit" id="mysubmit" name="submit" class="btn_add_products" value="Add">
        </p>
        </form>
    </div>
    <div class="showall">
        <a class='showallproducts' href="#">Show All</a>
    </div>
    <div class="products_added">
        <h3 class='newlyadded_products'>Product Lists</h3>
        <table>
            <thead>
                <tr>
                    <th>Product name</th>
                    <th>Price</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody class="display_added_products">
                <tr>
                    <td colspan="3">
                        <p class='nodata_added'>No data added yet.</p>
                    </td>
                </tr>
            </tbody>
        </table>       
    </div>
</div>



<script src="scripts/main.js"></script>