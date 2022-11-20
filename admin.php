<?php
session_start();

if(!isset($_SESSION['auth'])){
    header('Location: auth.php');
    exit;
}

include 'Classes/Dbclass.php';
$db=new Dbclass();


include 'parts_admin/header.php';
include 'parts_admin/sidebar.php';
include 'parts_admin/content.php';
include 'parts_admin/footer.php';

?>
 <!-- Modal Delete Product-->
 <div id="modalform_deleteProduct" class="modal">    
    <div class="deleteProduct-wrapper">
        
    </div>   
</div>

 <!-- Modal Delete Category-->
 <div id="modalform_deleteCat" class="modal">    
    <div class="deleteCat-wrapper">
        
    </div>   
</div>