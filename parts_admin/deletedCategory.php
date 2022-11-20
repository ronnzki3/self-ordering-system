<?php
include '../Classes/Dbclass.php';
$db=new Dbclass();

if(isset($_POST['id'])){
    $db->delete('tblcategory','ID='.$_POST['id']);
}
?>
  