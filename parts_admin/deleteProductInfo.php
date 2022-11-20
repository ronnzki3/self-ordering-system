<?php
include '../Classes/Dbclass.php';
$db=new Dbclass();

if(isset($_POST['id'])){

    $res=$db->select('tblproducts','*','ID='.$_POST['id']);
    while($rw=mysqli_fetch_assoc($res)){
?>
    <div style="margin-top:15px;">
        <p style="color:red;font-weight:bold;">Are you sure do you want to continue delete?</p>
    </div>
    <div class="p-wrap" style="margin-top:30px">
        <p class="delProductName">
            Product name: <br/>
            <b><?=$rw['productname']?></b>
        </p>
        <input type="hidden" class="productIdd" value="<?=$rw['ID'];?>">
        <p class="delProductPrice" style="margin-top:10px;">
            Price:<br/>
            <b><?=$rw['price']?></b>
        </p>
        <p class="delProductImage" style="margin-top:10px;">
             <img width="100px" src="images/<?=$rw['image']?>">
        </p>

        <p style="margin-top:15px;">
            <button class="modalBtnCancel">Cancel</button>
            <button class="modalBtnDelete">Delete</button>
        </p>
    </div>
    <div>

    </div>

<?php
    }
}
?>

<script src="scripts/main.js"></script>