<?php
require ('db.php');
session_start();
if(empty($_SESSION['user_name']))
    echo "<script>alert('请先登录！');window.location.href='index.php';</script>";
$book_id= $_POST['id'];
$user_id = $_SESSION['user_id'];
$count = $_POST['num'];

$q = "insert into cart_record(user_id,book_id,book_num) values('$user_id',$book_id,'$count')";
$result=mysqli_query($conn, $q);
if($result){
    echo '<script>alert("添加成功！");window.location="index.php";</script>';
}
else {
    echo mysqli_error($conn);
    echo '<script>alert("添加失败！");history.go(-1);</script>';
}

?>