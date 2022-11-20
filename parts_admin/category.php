<?php
include '../Classes/Dbclass.php';
$db=new Dbclass();
?>

<div class="category-container">
    <span class="btnAddnew">Add new</span>
    <table>
        <thead>
            <tr>
                <th>Category</th>
                <th>Action</th>
            </tr>
            <tbody>
                <?php
                $tblname='tblcategory';
                $result=$db->select($tblname,'*');
                while($row=mysqli_fetch_assoc($result)){
                    $category= $row['category'];
                    $catIdd= $row['ID'];
                ?>
                    <tr>
                        <td><?=$category;?></td>
                        <td style="text-align:center;padding:10px;">
                            <a href="#" class="catEdit" id="edit_id_<?=$catIdd?>">Edit</a> 
                            <a href="#" class="catDelete" id="delete_id_<?=$catIdd?>">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </thead>     
    </table>
</div>


<script src="scripts/main.js"></script>