<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}else {
	echo "<br>";
	$bookname = $_POST['bookname'];
	$bookid = $_POST['bookid'];

	$check_bookid = "select book_id from book_info where book_id = '$bookid'";
	$check_bookid_result = $conn->query($check_bookid);
	$result1 = mysqli_num_rows($check_bookid_result);
	if($result1){
		echo '<script>alert("书目id已经存在");history.go(-1);</script>';
	}else{
	$authorname = $_POST['authorname'];
	$authorid = $_POST['authorid'];
	$publisher = $_POST['publisher'];
	$booktype = $_POST['booktype'];
	$CH_intro = $_POST['CH_intro'];
	$ENG_intro = $_POST['ENG_intro'];
	$price1 = $_POST['price1'];
	$price2 = $_POST['price2'];
	$bookscore = $_POST['bookscore'];
	$stocknumber = $_POST['stocknumber'];
	$storeid = $_POST['storeid'];
	$imglink = $_POST['imglink'];

	$check_storeid = "select store_id from book_stock where store_id = '$storeid'";
	$check_storeid_result = $conn->query($check_storeid);
	$result2 = mysqli_num_rows($check_storeid_result);

	if($result2){

		$sql1 = "INSERT INTO book_info(book_id,book_name,book_picture,book_publisher,book_type,book_purchase_price,book_sale_price,CH_intro,ENG_intro,book_grade) VALUES('$bookid','$bookname','$imglink','$publisher','$booktype','$price1','$price2','$CH_intro','$ENG_intro','$bookscore')";
		$sql2 = "INSERT INTO book_stock(book_id,store_id,stock_number) VALUES ('$bookid','$storeid','$stocknumber')";
		$sql3 = "INSERT INTO author_info(author_id,author_name) VALUES('$authorid','$authorname')";
		$sql4 = "INSERT INTO author_book_relationship(author_id,book_id) VALUES ('$authorid','$bookid')";

		$check_author_id = "select author_id from author_info where author_id = '$authorid'";
		$check_author_id_result = $conn->query($check_author_id);
		$result3 = mysqli_num_rows($check_author_id_result);
		if($result3){
			$res_insert1 = $conn->query($sql1);
			$res_insert2 = $conn->query($sql2);
			$res_insert4 = $conn->query($sql4);
			if ($res_insert1 and $res_insert2 and $res_insert4) {
				echo '<script>alert("添加成功！");window.location="product_list.php";</script>';

			} else {
				echo '<script>alert("添加失败！请检查信息是否填写完整！");history.go(-1);</script>';
			}
		}else{
			$res_insert1 = $conn->query($sql1);
			$res_insert2 = $conn->query($sql2);
			$res_insert3 = $conn->query($sql3);
			$res_insert4 = $conn->query($sql4);
			if ($res_insert1 and $res_insert2 and $res_insert3 and $res_insert4) {
				echo '<script>alert("添加成功！");window.location="product_list.php";</script>';

			} else {
				echo '<script>alert("添加失败！请检查信息是否填写正确！");history.go(-1);</script>';
			}
		}


	}else{
		echo '<script>alert("书店id不存在！");history.go(-1);</script>';
	}

}
	}

	mysqli_close($conn);

?>


