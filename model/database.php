<?php
 $conn = 'mysql:host=remotemysql.com;dbname=TSjz7MTMUW';
 $username ='TSjz7MTMUW';
 $password = 'cekOr33H3n';
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