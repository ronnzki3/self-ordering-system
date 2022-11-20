<?php
include '../Classes/Dbclass.php';
$db=new Dbclass();

if(isset($_POST['password'])){

    $username=$_POST['username'];
    $password=$_POST['password'];

    $result=$db->select('login','*',"BINARY username='$username' AND BINARY pass='$password'");

    $count=mysqli_num_rows($result);
   

    echo $count;
    
}