<?php
include '../Classes/Dbclass.php';
$db=new Dbclass();

if(isset($_POST['id'])){

    $res=$db->select('tblcategory','*','ID='.$_POST['id']);
    while($rw=mysqli_fetch_assoc($res)){
?>
    <div style="margin-top:15px;">
        <p style="color:red;font-weight:bold;">Are you sure do you want to continue delete?</p>
    </div>
    <div class="p-wrap" style="margin-top:30px">
        <p class="delProductName">
            Category name: <br/>
            <b><?=$rw['category']?></b>
        </p>
        <input type="hidden" class="categoryIdd" value="<?=$rw['ID'];?>">
        <p style="margin-top:15px;">
            <button class="modalBtnCancelC">Cancel</button>
            <button class="modalBtnDeleteC">Delete</button>
        </p>
    </div>
    <div>

    </div>

<?php
    }
}
?>

<script src="scripts/main.js"></script>