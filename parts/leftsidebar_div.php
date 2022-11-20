 
 <!-- mid content -->
 <div class="content">


<div class="leftSidebar">
    <ul class="categorycaption" disable>
        <li disable>MENU</li>
    </ul>
    <ul>       
        <?php
        $res=$db->select('tblcategory','*');
        while($row=mysqli_fetch_assoc($res)){
            echo '<li id="cat_'.$row['ID'].'" class="menu_index">'.$row['category'].'</li>';
        }
        ?>
        <!-- <li class="">Combo Meal</li>
        <li>Sabaw</li>
        <li>Pulutan</li>
        <li>Drinks</li>
        <li>Alcoholic Beverages</li>
        <li>Desert</li> -->
    </ul>
</div>