<?php
session_start();
unset($_SESSION['staff_name']);
echo "<script>
        alert('注销登录成功')
        window.location.href=\"admin_login.html\";
        </script>";
?>

