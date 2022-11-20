<div class="rightSidebar">
<?php
$tblname_cat='tblcategory';
$result_cat = $db->select($tblname_cat,'*');
$tblname='tblproducts';
$imageLoc="./images/";
while($row_cat=mysqli_fetch_assoc($result_cat)){
    $cat_id=$row_cat['ID'];
    $result = $db->select($tblname,'*','category_id='.$cat_id);
    ?>
    <div class="menulist-wrapper" id="catid-<?=$cat_id?>">
        <?php
        while($row=mysqli_fetch_assoc($result)){
            $productName=$row['productname'];
            $price      =$row['price'];
            $image      = $row['image'];
            $product_id      =$row['ID'];
        ?>
            
                <div class='getproduct' id="<?=$product_id?>">           
                    <div class="product"><p> <?=$productName;?> </p></div>
                    <img src=<?=$imageLoc.$image;?> alt="product image">
                    <span class="prd_count prd_count-<?=$product_id?>"></span>
                    <div class="price">
                        <p>&#8369;<?=$price;?></p>                            
                    </div>
                </div>

        <?php
        }
        ?>
    </div>
<?php
}
?>      
           
    </div>
</div>