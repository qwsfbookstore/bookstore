<?php
require ('db.php');
session_start();
$book_id= $_POST['book_id'];
$user_id = $_SESSION['user_id'];

$q = "update cart_record set book_num=book_num-1 where user_id='$user_id'and book_id='$book_id'";
$row=sql('cart_info', 'book_num', "user_id='$user_id'and book_id='$book_id'");
$num=$row['book_num'];
if ($num)
    mysqli_query($conn, $q);
else echo '<script>alert("亲，不要删光哦！");history.go(-1);</script>';
?>