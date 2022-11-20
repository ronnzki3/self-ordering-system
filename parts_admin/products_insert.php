<?php
include '../Classes/Dbclass.php';
$db=new Dbclass();

$statusMsg='';

$statusMsg1='';

if(isset($_POST["productname"]) && isset($_POST["price"]) && !empty($_FILES["imgfile"]["name"])){
    $product_name=$_POST["productname"];
    $price=$_POST["price"];
    $categoy_id=$_POST["category"];

    $targetDir = "../images/";
    $path= basename($_FILES["imgfile"]["name"]);
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    $fileName1 = date("yymmddhhmmss"); //save as filename datetime uploaded
    $fileName=$fileName1.".".$ext;

    $banner=$_FILES['imgfile']['name'];	
    $filetype=$_FILES['imgfile']['type'];    
    //check file type
    if($filetype=='image/jpeg' or $filetype=='image/png' or $filetype=='image/gif' or $filetype=='image/jpg')
    {
            // Check file size
            if ($_FILES["imgfile"]["size"] > 1000000) {
                echo "file size should be less than 1MB";
            }else{
                // $bannerpath="../uploadimg/".$banner;
                $bannerpath=$targetDir.$fileName;
                // move_uploaded_file($_FILES["imgfile"]["tmp_name"],$bannerpath);
                if(move_uploaded_file($_FILES["imgfile"]["tmp_name"],$bannerpath)){
                        // echo "File uploaded successfully";
                        $newdata=[
                            'category_id' => $categoy_id,
                            'productname' => $product_name, 
                            'image' => $fileName,
                            'price' => $price,
                        ];
                        $db->insert('tblproducts', $newdata);        
                                    
                        if($db==true){
                            ?>
                            <tr>
                                <td>
                                    <?=$product_name?>
                                </td>
                                <td>
                                    <?=$price?>
                                </td>
                                <td>
                                    <img src="images/<?=$fileName;?> "/>
                                </td>
                            </tr>
                            <?php
                        }else{
                            echo "File upload failed, please try again.";
                        } 
                }
                
                ?>
                
                <?php
            }
    }else{
        echo "File should be jpg, jpeg, gif and png";
    }

    // echo $statusMsg;

}

?>