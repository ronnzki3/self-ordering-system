<div class="rightSidebar">
    <?php
    $tblname='tblproducts';
    $result = $db->select($tblname,'*');

    $imageLoc="./images/";

    while($row=mysqli_fetch_assoc($result)){
        $productName=$row['productname'];
        $price      =$row['price'];
        $image      = $row['image'];
    ?>
        <div>
            <div class="product"><p> <?=$productName;?> </p></div>
            <img src=<?=$imageLoc.$image;?> alt="product image">
            <div class="price">
                <p>&#8369; <?=$price;?></p>                            
            </div>
        </div>

    <?php
    }
    ?>
            
            
           
    </div>
</div>