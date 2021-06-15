<?php
 $conn = 'mysql:host=sql100.epizy.com;dbname=epiz_28891647_assignment_tracker';
 $username ='epiz_28891647';
 $password = 'q4a9aSR75yGZCCz';
 error_reporting(0);
 try{
    $db = new PDO($conn,$username,$password);
 }catch(PDOException $e)
 {
    $error ="Database Error : ";
    $error .= $e->getMessage();
    include('view/error.php');
    exit();
 }
?>
