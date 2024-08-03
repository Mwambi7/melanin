<?php
session_start();
require_once('config.php');

if (isset($_POST['addbutton'])) {
    $productname = $_POST['productname'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "imageuploads/" . $filename;

    // Move uploaded file to the destination folder
    if (move_uploaded_file($tempname, $folder)) {
        // File uploaded successfully, proceed with database insertion
        $sql = "INSERT INTO products (productname, description, price, quantity, filename) 
                VALUES ('$productname', '$description', '$price', '$quantity', '$filename')";
        if ($link->query($sql) === TRUE) {
            // Product inserted successfully
            $_SESSION['pname'] = $productname;
            header("Location: products.php?New_record_created_successfully");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $link->error;
        }
    } else {
        // Error in uploading file
        $msg = "Failed to upload image";
    }
}
?>


