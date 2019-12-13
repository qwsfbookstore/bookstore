<?php
require ('db.php');
session_start();
if(empty($_SESSION['user_name']))
    echo "<script>alert('请先登录！');window.location.href='index.php';</script>";
$rid= $_POST['rid'];
$reply_text=$_POST['reply_text'];
$uid = $_SESSION['user_id'];
$createtime = date("Y-m-d h:i");

$q = "insert into r_reply(rid,uid,reply_content,reply_time) values('$rid','$uid','$reply_text','$createtime')";
mysqli_query($conn,$q);
?>