<?php
include '../Classes/Dbclass.php';
$db=new Dbclass();

// $data = json_decode(stripslashes($_POST['productLists']));
// foreach($data as $prd_id => $qty){
//     if((int)$qty >0){
//      echo "<tr><td>".$prd_id."</td><td> -> qty:".$qty."</td></tr>";
//     }
//  }

if(isset($_POST['productLists'])){
    $data = json_decode(stripslashes($_POST['productLists']));
    foreach($data as $prd_id => $qty){
        if((int)$qty >0){
            $getsubtotal=0;
            $res=$db->select('tblproducts','*','ID='.$prd_id);
            while($row=mysqli_fetch_assoc($res)){
                echo $row['productname'];
                ?>
                    <tr class="trow_<?=$row['ID']?>">
                        <input type="hidden" class="prd-<?=$row['ID']?>">
                        <td class='prdimg'><img src="./images/<?=$row['image']?>" width="60"></td>
                        <td class='prdname'><?=$row['productname']?></td>
                        <td class='prdprice'>&#8369;<?=$row['price']?></td>
                        <td class="prdqty">
                            <span class="minusqty" id="minus_id_<?=$row['ID']?>"> - </span> 
                            <span class="prd_qty_<?=$row['ID']?>" id="qty_id_<?=$row['ID']?>"><?=$qty?></span> 
                            <span id="plus_id_<?=$row['ID']?>" class="plusqty"> + </span>
                        </td>
                    </tr>
                <?php
            }
        }
     }   
}


?>
    <script src="scripts/insidemodal.js"></script>