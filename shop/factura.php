<?php 
    if(!isset($_POST["product-id"] || !isset($_POST["user-id"])){
        header("Location: ../tienda.php");
        die();
    }else{
        //do something
    }
?>