<?php
session_start();

if(!isset($_SESSION['auth'])){
    header('Location: auth.php');
    exit;
}

include 'Classes/Dbclass.php';
$db=new Dbclass();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <title>Admin Dashboard</title>
</head>
<body>    
    <div class="main-container">
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
        <div class="rightContent">
            <div class="banner">
                <h1>Admin Dashboard</h1>
            </div>
            
            <div id="content" class="content">
               
            </div>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="scripts/main.js"></script>
</body>
</html>