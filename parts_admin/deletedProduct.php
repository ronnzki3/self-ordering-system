<?php
include '../Classes/Dbclass.php';
$db=new Dbclass();

if(isset($_POST['id'])){
    $db->delete('tblproducts','ID='.$_POST['id']);
}
?>
  