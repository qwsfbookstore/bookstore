<?php
session_start();
include "db.php";
$id=$_SESSION["user_id"];
$oldpassword=$_POST['oldpassword'];
$newpassword=$_POST['newpassword'];
    $row = sql('user_info', 'user_password', "user_id = '$id'");
    if($row["user_password"]==$oldpassword) {
        $sql_edit = "update user_info SET user_password = '$newpassword' WHERE user_id = '$id'";
        $pdo->query($sql_edit);
        echo "<script>
        alert('修改成功');
        window.location.href=\"editpwd.php\";
    </script>";
    }
    else {
        echo '<script>alert("旧密码错误！");history.go(-1);</script>';
    }
?>