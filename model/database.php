<?php
 $conn = 'mysql:host=localhost;dbname=assignment_tracker';
 $username ='root';
 error_reporting(0);
 try{
    $db = new PDO($conn,$username);
 }catch(PDOException $e)
 {
    $error ="Database Error : ";
    $error .= $e->getMessage();
    include('view/error.php');
    exit();
 }
?>