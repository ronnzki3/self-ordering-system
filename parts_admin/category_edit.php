<?php
include '../Classes/Dbclass.php';
$db=new Dbclass();

$q=$_GET['q'];
$getId=$q;
$getcategory='';
$res=$db->select('tblcategory','*','ID='.$q);
while($row=mysqli_fetch_assoc($res)){
    $getId=$row['ID'];
    $getcategory=$row['category'];
}
?>

<div class="categorynew-container">
    <div class='bgdiv'>
        <h3>Update category</h1>
    </div>

    <div class="bgdiv">
        <span class='err_category'></span>
        <input type="hidden" name="category_id" class="category_id" value="<?=$getId?>">
        <input type="text" name="category" class="category" value="<?=$getcategory?>">
        <input type="button" class="btn_update_category" value="Update">
    </div>
    <div class="showall">
        <a class='showallcategory category_cancel' style="color:red;" href="#">Cancel</a>
    </div>
    <div class="category_added">
        <p class="update-confirm"></p>

    </div>
</div>


<script src="scripts/jquery-3.6.1.min.js"></script>
<script src="scripts/main.js"></script>