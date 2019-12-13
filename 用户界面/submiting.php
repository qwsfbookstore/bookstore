<?php
// 禁止非 POST 方式访问
if(!isset($_POST['submit'])){
    exit('非法访问!');
}
session_start();
if(empty($_SESSION['user_name']))
    echo "<script>alert('请先登录！');window.location.href='guestbook.php';</script>";

// 表单信息处理
if(get_magic_quotes_gpc()){
	$nickname = htmlspecialchars(trim($_POST['nickname']));
	$content = htmlspecialchars(trim($_POST['content']));
} else {
	$nickname = addslashes(htmlspecialchars(trim($_POST['nickname'])));
	$content = addslashes(htmlspecialchars(trim($_POST['content'])));
}
if(strlen($nickname)>32){
	echo '<script>alert("错误！昵称超出16个字符");history.go(-1);</script>';
}
require("./db.php");

$createtime = time();

// 数据写入库表
$user_id=$_SESSION['user_id'];
$insert_sql = "INSERT INTO guest_book(user_id,nickname,face,content,create_time)VALUES";
$insert_sql .= "('$user_id','$nickname',$_POST[face],'$content',$createtime)";

if(mysqli_query($conn,$insert_sql)){
	echo "<script>
        alert('发表动态成功！')
        window.location.href=\"guestbook.php\";
    </script>";
} else {
	echo '<script>alert("发表动态失败！");history.go(-1);</script>';
}
?>