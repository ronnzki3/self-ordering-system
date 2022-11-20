<?php
include '../Classes/Dbclass.php';
$db=new Dbclass();

if(isset($_POST['category_id'])){
    $catId=$_POST['category_id'];
    $tblname='tblproducts';
    $result = $db->select($tblname,'*','category_id='.$catId);
    $imageLoc="./images/";
    while($row=mysqli_fetch_assoc($result)){
        $productName=$row['productname'];
        $price      =$row['price'];
        $image      = $row['image'];
        $product_id =$row['ID'];
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
}
?>

