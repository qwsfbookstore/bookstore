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
    $id=$_POST['txtUsername'];
    $password=$_POST['txtPassword'];

    $row = sql('user_info', '*', "user_id = '$id'");
    if (!$row) {
        echo '<script>alert("ID不存在！请检查ID");history.go(-1);</script>';
    }

    if ($row['user_password'] == $password) {
    $_SESSION['user_id'] = "$id";
    $_SESSION['user_name'] = $row['user_name'];
    $_SESSION['user_tel'] = $row['user_tel'];
    $_SESSION['user_address'] = $row['user_address'];
    echo "<script>
        alert('登录成功！正在跳转...')
        window.location.href=\"index.php\";
    </script>";}
    else{
        echo '<script>alert("ID或密码错误！");history.go(-1);</script>';
    }
?>
</body>
</html>