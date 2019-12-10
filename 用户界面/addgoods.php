<?php
require ('db.php');
session_start();
$book_id= $_POST['book_id'];
$user_id = $_SESSION['user_id'];

$q = "update cart_record set book_num=book_num+1 where user_id='$user_id'and book_id='$book_id'";
mysqli_query($conn, $q);
?>