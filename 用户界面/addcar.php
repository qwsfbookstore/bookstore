<?php
ini_set('error_reporting', 'E_ALL & ~E_NOTICE');
require_once 'db.php';
require_once 'function.php';
$book_id = $_GET['book_id'];

$sql = 'select book_name from book_info where book_id=' . $book_id;
$select = $db->query($sql);

// 查询错误返回
if (!$select) {
    header('location:detail.php');
    exit;
}

$result = $select->fetch_assoc();
$book_name = $result['book_name'];

// 查询为空返回，避免空商品加到购物车
if (empty($gname)) {
    header('location:detail.php');
    exit;
}

addCart($book_id, $book_name);

//setcookie('cart','',time()-3600);
header('location:detail.php');
?>