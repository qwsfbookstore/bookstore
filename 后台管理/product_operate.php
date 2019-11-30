<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

mysqli_query($conn, "set names 'UTF8'");

if($_POST){
    $book_id = $_GET["book_id"];
    $author_id = $_GET["author_id"];
    $book_name = $_POST["bookname"];
    $book_publisher = $_POST["publisher"];
    $book_type = $_POST["booktype"];
    $CH_intro = $_POST["CH_intro"];
    $ENG_intro = $_POST["ENG_intro"];
    $book_purchase_price = $_POST["price1"];
    $book_sale_price = $_POST["price2"];
    $book_grade = $_POST["bookscore"];
    $book_picture = $_POST["imglink"];

    $sql1 = "update book_info set book_name='$book_name', book_publisher='$book_publisher', book_type='$book_type', CH_intro='$CH_intro', book_purchase_price='$book_purchase_price', book_sale_price='$book_sale_price', book_grade='$book_grade', book_picture='$book_picture' where book_id = '$book_id';";

    $result1 = $conn->query($sql1);
        if($result1){
            echo '<script>alert("修改成功！");window.location="product_list.php";</script>';
        }
        else {
            echo '<script>alert("修改失败！");</script>';
        }
}
if($_GET["action"]=="delete"){
    $sql = "DELETE FROM book_info WHERE book_id='$book_id';";
    if($conn->query($sql)){
        exit('<script language="javascript">alert("删除成功！");self.location = "product_list.php";</script>');
    } else {
        echo '<script>alert("删除失败！");history.go(-1);</script>';
    }
}
?>