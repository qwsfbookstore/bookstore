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
$result=mysqli_query($conn, $q);
if($result){
    echo '<script>alert("发送请求成功！");window.location="guestbook.php";</script>';
}
else {
    echo mysqli_error($conn);
    echo '<script>alert("发送请求失败！");/*history.go(-1);*/</script>';
}

?>