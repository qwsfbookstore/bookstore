<?php
session_start();
unset($_SESSION['staff_name']);
unset($_SESSION['staff_id']);
unset($_SESSION['staff_store']);
unset($_SESSION['staff_position']);

echo "<script>
        alert('注销登录成功')
        window.location.href=\"admin_login.html\";
        </script>";
?>

