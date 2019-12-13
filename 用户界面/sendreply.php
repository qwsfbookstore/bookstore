<?php
require ('db.php');
session_start();
if(empty($_SESSION['user_name']))
    echo "<script>alert('请先登录！');window.location.href='index.php';</script>";
$pid= $_POST['pid'];
$reply_text=$_POST['reply_text'];
$uid = $_SESSION['user_id'];
$createtime = date("Y-m-d h:i");

$q = "insert into p_reply(pid,uid,reply_content,reply_time) values('$pid','$uid','$reply_text','$createtime')";
mysqli_query($conn,$q);
?>