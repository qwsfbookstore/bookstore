<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>登录系统后台执行过程</title>
</head>
<body>
<?php
session_start();
include "db.php";
$id=$_POST['username'];
$password=$_POST['password'];

$row = sql('staff_info', '*', "staff_id = '$id'");
if (!$row) {
    echo '<script>alert("ID不存在！请检查ID");history.go(-1);</script>';
}

if ($row['staff_password'] == $password) {
    $_SESSION['staff_name'] = $row['staff_name'];
	$_SESSION['staff_id'] = $row['staff_id'];
	$_SESSION['staff_store'] = $row['staff_store'];
    echo "<script>
        alert('登录成功！正在跳转...')
        window.location.href=\"admin_index.php\";
    </script>";}
else{
    echo '<script>alert("ID或密码错误！");history.go(-1);</script>';
}
?>
</body>
</html>