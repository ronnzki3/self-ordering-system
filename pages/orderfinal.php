<?php
include '../Classes/Dbclass.php';
$db=new Dbclass();

if(isset($_POST['productLists'])){
    $data = json_decode(stripslashes($_POST['productLists']));
    foreach($data as $prd_id => $qty){
        if((int)$qty >0){
            $getsubtotal=0;
            $res=$db->select('tblproducts','*','ID='.$prd_id);
            while($row=mysqli_fetch_assoc($res)){
                echo $row['productname'];
                $subtotal=$qty * $row['price'];
                ?>
                    <tr class="trow_<?=$row['ID']?>">                       
                        <!-- <td class='prdimg'><img src="./images/<?=$row['image']?>" width="60"></td> -->
                        <td class='prdname'>
                            <b style="font-size:1.6 rem;"><?=$qty."x</b> ".$row['productname']?>
                            <span class="order-final-line"></span>&#8369;<?=$subtotal?>
                        </td>
                        <!-- <td class='prdprice'>&#8369;<?=$row['price']?></td> -->
                        <!-- <td class="prdqty">&#8369;<?=$subtotal?></td> -->
                    </tr>
                <?php
            }
        }
     }   
}


?>