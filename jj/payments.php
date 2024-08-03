<?php
session_start();
require_once('config.php');
if (isset($_POST['checkout'])) {
  
     $fname =  $_POST['FName'];
     $lname =  $_POST['LName'];
      $username = $_POST['username'];
      $email =  $_POST['email'];
      $address =  $_POST['address'];
       $addressT =  $_POST['addressT'];
       $amount =  $_POST['amount'];
       $phone =  $_POST['phone'];

       $sql = "INSERT INTO orders(fname,lname,username,email,address,addressT,amount,phone) VALUES('$fname','$lname','$username','$email','$address','$addressT','$amount','$phone')";
       if ($link->query($sql) === TRUE) {
       
        header('location:e.php');
      
                   
                       
                        
       
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
}
    ?>