<?php
include '../Classes/Dbclass.php';
$db=new Dbclass();

if(isset($_POST['productLists'])){
    $data = json_decode(stripslashes($_POST['productLists']));
    $getOrderMode=$_POST['order_mode'];
    $getOrderTotal=$_POST['order_total'];

    //get last id saved from table orders
    $getOrdernum=0;
    $ress=$db->selectLastId('orders');
    while($rw=mysqli_fetch_assoc($ress)){
        $getOrdernum=$rw['ID'];
    }

    $orderNumber= 800 + (int)$getOrdernum + 1;
    
    //save to table orders
    $newdata=[
        'order_mode' => $getOrderMode,
        'order_num' =>  $orderNumber,
        'order_total'=> $getOrderTotal,
    ];
    $db->insert('orders' , $newdata); 

    //get last inserted id, to be used to insert orders to table product_orders
    $getLastesOrdeId=0;
    $rees=$db->selectLastId('orders');
    while($rw=mysqli_fetch_assoc($rees)){
        $getLastesOrdeId=$rw['ID'];
    }
    foreach($data as $prd_id => $qty){
        if((int)$qty >0){
            $newdata2=[
                'order_id' => $getLastesOrdeId,
                'product_id' =>  $prd_id,
                'product_qty'=> $qty,
            ];
            $db->insert('product_orders' , $newdata2);          
        }
     }   

     echo $orderNumber;
}


?>