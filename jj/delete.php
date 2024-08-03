<?php
//delete operation
include 'connectdb.php';//establish connection to db
$studentid = $_GET['studentid'];
$sql ="DELETE FROM students WHERE student_id=$studentid";