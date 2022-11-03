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
                ?>
                    <tr>
                        <td><?=$category;?></td>
                        <td><a href="#">Edit</a> <a href="#">Delete</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </thead>     
    </table>
</div>



<script src="scripts/main.js"></script>