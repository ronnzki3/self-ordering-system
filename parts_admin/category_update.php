<?php

include '../Classes/Dbclass.php';
$db=new Dbclass();

if(isset($_POST['category'])){
    $category=$_POST['category'];
    $cateid=$_POST['id'];
    $newdata=['category' => $category];
    $db->update('tblcategory' , $newdata,'ID='.$cateid);
    if($db==true){
        echo 'Successfully updated category.';        
    }else{
        echo mysqli_error();        
    }
}