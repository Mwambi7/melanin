<?php
    include("config.php");
    $id = $_GET['id'];
    $q = "delete from products where id = $id ";
    mysqli_query($link,$q);  
    header('location:products.php?deleteduser');  
?>