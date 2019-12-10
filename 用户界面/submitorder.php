<?php
require ('db.php');
session_start();
$user_id = $_SESSION['user_id'];
$createtime = date("Y-m-d");

$sql_id = "select cast(max(cast(order_id as unsigned))+1 as char) as new_id from order_info";
$res_id = $conn->query($sql_id);
while($row = mysqli_fetch_assoc($res_id)) {
    $newid=$row["new_id"];
}
$sql_insert = "insert into order_info(order_id,user_id,order_time) values('$newid','$user_id','$createtime')";
$res_insert=$conn->query($sql_insert);
$r=mysqli_query($conn,"SELECT*from cart_info where user_id = '$user_id'");
while ($row=mysqli_fetch_array($r)) {
    $book_id=$row['book_id'];
    $book_num=$row['book_num'];
    $sql = "insert into order_details(order_id,book_id,book_num) values('$newid','$book_id','$book_num')";
    $result=mysqli_query($conn,$sql);
    $q = "delete from cart_record where user_id='$user_id'and book_id='$book_id'";
    $re=mysqli_query($conn, $q);
}
if($res_insert&&$result&&$re){
    echo '<script>alert("购买成功！");window.location="index.php";</script>';
}
else {
    echo mysqli_error($conn);
    echo '<script>alert("购买失败！");</script>';
}

?>