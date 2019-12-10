<?php
require ('db.php');
session_start();
$book_id= $_GET['id'];
$user_id = $_SESSION['user_id'];

$q = "delete from cart_record where user_id='$user_id'and book_id='$book_id'";
$re=mysqli_query($conn, $q);
if($re){
    echo '<script>alert("删除成功！");window.location="ShowCart.php";</script>';
}
else {
    echo '<script>alert("删除失败！");history.go(-1);</script>';

}
?>