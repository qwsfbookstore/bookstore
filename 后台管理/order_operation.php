<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}else {
    echo "<br>";
    $staffid = $_SESSION['staff_id'];
    $orderid = $_SESSION['order_id'];

    $sql = "UPDATE order_info SET staff_id = $staffid WHERE order_id = $orderid";
    $result = $conn->query($sql);
    if($result) {
        echo '<script>alert("接单成功！");window.location="order_list.php";</script>';
    }else{
        echo '<script>alert("操作失败！");history.go(-1);</script>';
    }
}


mysqli_close($conn);
?>