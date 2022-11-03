<?php
include 'Classes/Dbclass.php';
$db=new Dbclass();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Mixd Hub Restobar</title>
</head>
<body>    
    <div class="main-container">
        <?php     
            include 'parts/header_div.php'; 
            include 'parts/leftsidebar_div.php'; 
            include 'parts/rightsidebar_div.php'; 
            include 'parts/footer_div.php';        
        ?>    
    </div>
</body>
</html>

