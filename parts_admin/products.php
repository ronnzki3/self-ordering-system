<?php
include '../Classes/Dbclass.php';
$db=new Dbclass();


$getId=$_POST['id'];
$res=$db->select('tblcategory','*','ID='.$getId);
$catname='';
while($rw=mysqli_fetch_assoc($res)){
    $catname=$rw['category'];
}
?>

<div class="products-container">
    <span>Category :</span> <h4 id="getCategory"><?=$catname;?></h2>
    <table>
        <thead>
            <tr>
                <th>Product name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <tbody>
                <?php      
                $tblname='tblproducts';
                $result=$db->select($tblname,'*','category_id='.$getId);    
                
                if(mysqli_num_rows($result) <= 0){
                    echo '<tr><td colspan="4">No record/s found.</td></tr>';
                }
                
                while($row=mysqli_fetch_assoc($result)){
                    $productname= $row['productname'];
                    $price=$row['price'];
                    $image=$row['image'];
                    $imageLoc='images/';
                ?>
                    <tr>
                        <td><?=$productname;?></td>
                        <td class='price'><?=$price?></td>
                        <td class='img'><img src="<?=$imageLoc.$image;?>" alt=""></td>
                        <td><a href="#">Edit</a> <a href="#">Delete</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </thead>     
    </table>
</div>