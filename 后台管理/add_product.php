<?php

$servername = "127.0.0.1";
$username = "root";
$password = "abcd-123";
$dbname = "bookstore";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}else {
	echo "<br>";
	$bookname = $_POST['bookname'];
	$bookid = $_POST['bookid'];
	$authorname = $_POST['authorname'];
	$publisher = $_POST['publisher'];
	$booktype = $_POST['booktype'];
	$CH_intro = $_POST['CH_intro'];
	$ENG_intro = $_POST['ENG_intro'];
	$price1 = $_POST['price1'];
	$price2 = $_POST['price2'];
	$bookscore = $_POST['bookscore'];
	$stocknumber = $_POST['stocknumber'];
	$imglink = $_POST['imglink'];

	$sql = "INSERT INTO book_info(book_id,book_name,book_picture,book_publisher,book_type,book_purchase_price,book_sale_price,CH_intro,ENG_intro,book_grade) VALUES('$bookid','$bookname','$imglink','$publisher','$booktype','$price1','$price2','$CH_intro','$ENG_intro','$bookscore')";
	$res_insert = $conn->query($sql);
	if ($res_insert) {
		echo '<script>alert("添加成功！");window.location="product_list.html";</script>';
	} else {
		echo '<script>alert("添加失败！请检查是否信息填写完整！");window.location="addproduct.html"</script>';
	}
}
	mysqli_close($conn);

?>


