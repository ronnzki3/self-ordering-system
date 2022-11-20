<?php
include '../Classes/Dbclass.php';
$db=new Dbclass();

if(isset($_POST['productLists'])){
    $data = json_decode(stripslashes($_POST['productLists']));
    $total=0;
    foreach($data as $prd_id => $qty){
        if((int)$qty >0){
            $getsubtotal=0;
            $res=$db->select('tblproducts','*','ID='.$prd_id);
            while($row=mysqli_fetch_assoc($res)){                
                $price=$row['price'];
                $subtotal=$price * (int)$qty;
                $total +=$subtotal;
            }
        }
     } 
     echo $total;  
}

