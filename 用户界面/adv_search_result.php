<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>奇文书坊-检索结果</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/foot.css">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css"  href="css/booklist.css"/>
    <script src="js/html5.js"></script>
    <script type="text/javascript" src="js/ie6.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/index.js"></script>
	<style type="text/css" media="screen">
    table, td
{
	border:1px solid green;
}
td
{
	background-color: white;
	text-align:right;
}		
	</style>
</head>
<body>
	<div class="header_con">
    <div class="header">
        <div class="welcome fl">欢迎来到奇文书坊</div>
        <div class="fr">
            <div class="login_btn fl">
                <?php
                session_start();
                if(empty($_SESSION['user_name']))
                    echo'<a href="login.html">登录</a>
                        <span>|</span>
                        <a href="register.html">注册</a>';
                else
                    echo'欢迎您：'.$_SESSION['user_name'];
                 ?>
                <span>|</span>
                <a href="logout.php">退出</a>
            </div>
            <div class="user_link fl">
                <span>|</span>
                <a href="personalinfo.php">用户中心</a>
                <span>|</span>
                <a href="ShowCart.php">我的购物车</a>
                <span>|</span>
                <a href="checkorder.php">我的订单</a>
                <span>|</span>
                <a href="checkorder.php">留言板</a>
            </div>
        </div>
    </div>
</div>
<div class="search_bar clearfix">
    <a href="index.php" class="logo fl"><img src="images/logo1.png" width="160" height="99"></a>
    <div class="search_con fl">
        <form action="search_result.php" method="post">
            <input type="text" class="input_text fl" name="search_word" placeholder="搜索商品">
            <input type="submit" class="input_btn fr" name="search" value="搜索">
        </form>
    </div>
    <div class="guest_cart fr">
        <a href="ShowCart.php" class="cart_name fl">我的购物车</a>
        <div class="goods_count fl" id="show_count">0</div>
    </div>
</div>
</body>
</html>
<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}

mysqli_query($conn, "set names 'UTF8'");

$bookname = $_POST["bookname"];
$authorname = $_POST["authorname"];
$keyword = $_POST["keyword"];
$publisher = $_POST["publisher"];
$ISBN = $_POST["ISBN"];
$type = $_POST["type"] == "所有分类" ? "" : $_POST["type"];
$lower_price = $_POST["lower_price"];
$higher_price = $_POST["higher_price"];
$score = $_POST["score"];
$str = "stock_status";
if(isset($_POST[$str])){
    $status = 1;
}else{
    $status = 0;
}

if ($type==""){
    $sql1 = "SELECT book_name, book_grade, book_info.book_id, author_info.author_name,book_publisher, book_sale_price, CH_intro FROM ((book_info JOIN author_book_relationship ON book_info.book_id=author_book_relationship.book_id) JOIN author_info ON author_book_relationship.author_id=author_info.author_id)";
}else{
    $sql1 = "SELECT book_name, book_grade, book_info.book_id, author_info.author_name,book_publisher, book_sale_price, CH_intro FROM ((book_info JOIN author_book_relationship ON book_info.book_id=author_book_relationship.book_id) JOIN author_info ON author_book_relationship.author_id=author_info.author_id) WHERE book_type='".$type."'";
}
if ($bookname!=""){
    $sql1 = "SELECT * FROM (".$sql1.") AS name WHERE book_name='".$bookname."'";
}
if ($authorname!=""){
    $sql1 = "SELECT * FROM (".$sql1.") AS aut WHERE author_name='".$authorname."'";
}
if ($keyword!=""){
    $sql1 = "SELECT * FROM (".$sql1.") AS word WHERE CH_intro LIKE '%".$keyword."%'";
}
if ($publisher!=""){
    $sql1 = "SELECT * FROM (".$sql1.") AS pub WHERE book_publisher LIKE '%".$publisher."%'";
}
if ($ISBN!=""){
    $sql1 = "SELECT * FROM (".$sql1.") AS isbn WHERE book_id='".$ISBN."'";
}
if ($lower_price!=""){
    $sql1 = "SELECT * FROM (".$sql1.") AS low WHERE book_sale_price >".$lower_price;
}
if ($higher_price!=""){
    $sql1 = "SELECT * FROM (".$sql1.") AS high WHERE book_sale_price <".$higher_price;
}
if ($score!=""){
    $sql1 = "SELECT * FROM (".$sql1.") AS star WHERE book_grade >".$score;
}

$result = $conn->query($sql1);

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		echo '<div class="product_storyList_content_right">
                <ul>
                    <li class="product_storyList_content_dash"><a href="detail.php?id='.$row["book_id"].'" class="blue_14">'.$row["book_name"].'</a></li>
                    <li>评分：'.$row["book_grade"].'</li>
                    <li>作　者：'.$row["author_name"].'</a> 著</li>
                    <li>出版社：'.$row["book_publisher"].'</a></li>
                    <li>'.$row["CH_intro"].'</li>
                    <li>
                        <dl class="product_content_dd">
                            <dd class="footer_dull_red"><span>￥'.$row["book_sale_price"].'</span></dd>
                        </dl>
                    </li>
                </ul>
            </div>
            <div class="product_storyList_content_bottom"></div>';
	}
}
else{
	echo '<div class="product_storyList_content_right">
	<br/>
	<P align="center" style="font-size:20px">无结果</P>
	<br/>
	</div>
	<br/>
	<br/>
	<br/>'
	;
}

$conn->close();
?>
