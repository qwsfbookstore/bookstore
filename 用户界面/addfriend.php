<?php
require ('db.php');
session_start();
if(empty($_SESSION['user_name']))
    echo "<script>alert('请先登录！');window.location.href='index.php';</script>";
$sid= $_POST['sid'];
$apply_text=$_POST['apply_text'];
$uid = $_SESSION['user_id'];
$createtime = date("Y-m-d");

$q = "insert into friend_apply(uid,sid,apply_text,apply_time,apply_status) values('$uid','$sid','$apply_text','$createtime','待通过')";
mysqli_query($conn,$q);
?>