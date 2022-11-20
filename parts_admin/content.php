<div class="rightContent">
    <div class="banner">
        <h1>Admin Dashboard</h1>
    </div>
    
    <div id="content" class="content">
        <?php
            $q=$_GET['q'];

            if((int)$q>0){               
                include 'parts_admin/products.php';
            }else{
                if($q=='s'){
                    include 'parts_admin/settings.php';
                }elseif($q=='c'){
                    include 'parts_admin/category.php';
                }elseif($q=='h'){
                    include 'parts_admin/home.php';
                }else{
                    echo '<h2> Content not found. </h2>';
                }
            }
        ?>
    </div>
</div>