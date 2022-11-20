<?php
session_start();


$_SESSION['auth']=1;



header('Location: ../admin.php?q=h');
exit;