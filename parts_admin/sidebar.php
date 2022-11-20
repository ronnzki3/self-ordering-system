<div class="sideNav">
    <ul>
        <li class="homepage">Home</li>
        <li class="catpage">Category</li>
        <li class="mainmenu">
            <details>                    
                <summary>
                    Products                            
                </summary>
                <ul class='category-lists'>
                    <?php
                        $res=$db->select('tblcategory','*');
                        while($row=mysqli_fetch_assoc($res)){
                            echo '<li id="cat_'.$row['ID'].'" class="menu">'.$row['category'].'</li>';
                        }
                    ?>
                </ul>
            </details>                    
        </li>
        <li class="settingspage">Settings</li>

        <li><a href="parts_admin/logout.php">Logout</a></li>
    </ul>

    <!-- <ul>
        <li><a href="parts_admin/logout.php">Logout</a></li>
    </ul> -->
</div>