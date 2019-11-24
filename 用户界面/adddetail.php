<?php
session_start();
include "db.php";
$id=$_SESSION["user_id"];
$address=$_POST['adddetail'];
    $sql_edit = "update user_info SET user_address = '$address' WHERE user_id = '$id'";
    $_SESSION["user_address"]=$address;
    $pdo->query($sql_edit);
    echo "<script>
        alert('修改成功');
        window.location.href=\"address.php\";
        </script>";
?>