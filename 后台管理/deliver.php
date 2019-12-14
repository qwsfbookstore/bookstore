<?php
session_start();
include("db.php");
$order_id=$_GET['id'];
$row_book=sql('order_details', '*', "order_id = '$order_id'");
$book_id=$row_book['book_id'];
$book_num=$row_book['book_num'];
$staffstore=$_SESSION['staff_store'];

$sql="select stock_number from book_stock where book_id='$book_id' and store_id='$staffstore'";
$r=mysqli_query($conn,$sql);

if($row=mysqli_fetch_array($r)) {
    $result=true;
    $stocknum = $row['stock_number'];

    while ($row=mysqli_fetch_array($r)) {
        if ($stocknum < $book_num) {
            $result=false;
        }
    }

    if($result) {
        while($row=mysqli_fetch_array($r)){
            $deliver_sql = "UPDATE book_stock SET stock_number=stock_number-'$book_num' where book_id='$book_id' and store_id='$staffstore'";
            $deliver = mysqli_query($conn, $sql);
            if ($deliver) {
                $finish_sql = "UPDATE order_info SET order_status='已发货' where book_id='$book_id' and store_id='$staffstore'";
                $r=mysqli_query($conn,$finish_sql);
                echo "<script>alert('发货成功！');history.go(-1);</script>";
            } else {
                echo '<script>alert("发货失败！");history.go(-1);</script>';
            }

        }
    }else{
        echo '<script>alert("库存不足！请先补货再发货！");history.go(-1);</script>';
    }

    }else{
    echo '<script>alert("库存不足！请先补货再发货！");history.go(-1);</script>';
}

?>