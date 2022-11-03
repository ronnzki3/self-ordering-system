<?php

include '../Classes/Dbclass.php';
$db=new Dbclass();

if(isset($_POST['category'])){
    $category=$_POST['category'];
    $newdata=['category' => $category];
    $db->insert('tblcategory' , $newdata);
    if($db==true){
        echo 1;        
    }
}