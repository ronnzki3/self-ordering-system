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

     <!-- jQuery Modal css-->
     <link rel="stylesheet" href="modal/jquery.modal.min.css" />

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
    
    <?php 
        include 'modals.php'; 
    ?>
    
    <script src="scripts/jquery-3.6.1.min.js"></script>
    <script src="modal/jquery.modal.min.js"></script>
    <script src="scripts/main.js"></script>


     <div class="width-notif">
    <p>This page is intended and designed for large touch screen only.</p>
    <p><i>To continue navigate this page, please use</i> <b>1080x1920</b> <i>screen resolution.</i> </p>    

    <div style="position:absolute; bottom:50px; left:100px;display:block;font-size:2rem;">
        <p style="color:greenyellow;font-style:italic;text-transform: lowercase;">*** Demo purposes only ***</p>
    </div>    
    </div>


</body>
</html>

