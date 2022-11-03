<?php
include '../Classes/Dbclass.php';
$db=new Dbclass();
?>
<style>
/* .category_added{
    width: 500px;
    margin-top: 300px;
    margin: auto;
}   
.category_added h3{
        color: red !important;
} */
</style>

<div class="categorynew-container">
    <div class='bgdiv'>
        <h3>Add new category</h1>
    </div>

    <div class="bgdiv">
        <span class='err_category'></span>
        <input type="text" name="category" class="category" placeholder="category">
        <input type="button" class="btn_add_category" value="Add">
    </div>
    <div class="showall">
        <a class='showallcategory' href="#">Show All</a>
    </div>
    <div class="category_added">
        <h3 class='newlyadded_category'>Category Lists</h3>
        <p class='nodata_added'>No data added yet.</p>

    </div>
</div>



<script src="scripts/main.js"></script>