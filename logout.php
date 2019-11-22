<?php
    session_start();
    unset($_SESSION['user_id']);
    unset($_SESSION['user_name']);
    echo "<script>
        alert('注销登录成功')
        window.location.href=\"index.php\";
        </script>";
?>

