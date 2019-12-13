<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>奇文书坊-检索结果</title>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <link rel="stylesheet" type="text/css" href="css/foot.css"/>
    <link rel="stylesheet" type="text/css" href="css/reset.css"/>
    <link rel="stylesheet" type="text/css"  href="css/booklist.css"/>
    <script src="js/html5.js"></script>
    <script type="text/javascript" src="js/ie6.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/index.js"></script>
</head>

<body>
<div class="header_con">
    <div class="header">
        <div class="welcome fl">欢迎来到奇文书坊</div>
        <div class="fr">
            <div class="login_btn fl">
                <?php
                include ("db.php");
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
                <a href="guestbook.php">读书社区</a>
            </div>
        </div>
    </div>
</div>
<div class="search_bar clearfix">
    <a href="index.php" class="logo fl"><img src="images/logo1.png" width="160" height="99"></a>
    <div class="search_con fl">
        <form action="search_result.php" method="get">
            <input type="text" class="input_text fl" name="search_word" placeholder="搜索商品">
            <input type="submit" class="input_btn fr" name="search" value="搜索">
        </form>
    </div>
	<a href="advanced_search.php" style="position:absolute; top:75px; left:990px; ">高级检索</a>
    <div class="guest_cart fr">
        <a href="ShowCart.php" class="cart_name fl">我的购物车</a>
        <?php
        $user_id=$_SESSION['user_id'];
        if($user_id){
            $q = "SELECT * from cart_info WHERE user_id='$user_id'";
            $r = mysqli_query($conn,$q);
            $ra=mysqli_num_rows($r);
        }else{
            $ra = 0;
        }
        echo '<div class="goods_count fl" id="show_count">'.$ra.'</div>';
        ?></div>
    </div>
</div>
</body>

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

$pagesize = 15;
if (isset($_GET["start"])){
	$start = intval($_GET["start"]);
}else{
	$start = 0;
}
if (isset($_GET["page"])){
	$page = intval($_GET["page"]);
}else{
	$page = 1;
}

$sql1 = "SELECT DISTINCT book_info.book_id, book_info.book_name, book_info.book_picture, authors_name.names, book_info.book_publisher, book_info.book_sale_price, book_info.book_type, book_info.book_grade, book_info.CH_intro, book_info.CH_intro FROM (book_info INNER JOIN authors_name ON book_info.book_id = authors_name.book_id) WHERE ((book_name LIKE '%".$search_word."%') OR (book_type LIKE '%".$search_word."%') OR (names LIKE '%".$search_word."%') OR (ENG_intro LIKE '%".$search_word."%') OR (book_publisher LIKE '%".$search_word."%'))";
$result = $conn->query($sql1);
           
if($result->num_rows > 0){
	$numall = $result->num_rows;
	$page_num = ($numall % $pagesize)?(intval($numall / $pagesize) + 1):($numall / $pagesize);
	$result = $conn->query($sql1." ORDER BY book_grade DESC limit $start, $pagesize");
	$numb = $result->num_rows;
	if(!empty($numb)){
		while($row = $result->fetch_assoc()){
			echo '<div style="border:1px solid #ff2832;float:middle;width:1000px;margin:0 auto;">
			<div class="product_storyList_content_left"><img src='.$row["book_picture"].' style="height:200px;width:145px;"/></div>
			<div class="product_storyList_content_right">
			<ul>
			    <li class="product_storyList_content_dash"><a href="detail.php?id='.$row["book_id"].'" class="blue_14" style="font-size:20px;">'.$row["book_name"].'</a></li>
			    <li>评分：'.$row["book_grade"].'</li>
			    <li>作　者：'.$row["names"].'</a> 著</li>
			    <li>出版社：'.$row["book_publisher"].'</a></li>
			    <li>'.$row["CH_intro"].'</li>
			    <li>
				<dl class="product_content_dd">
				    <dd class="footer_dull_red" style="font-size:20px;"><span>￥'.$row["book_sale_price"].'</span></dd>
				</dl>
			    </li>
			</ul>
		    </div>
		    <div class="product_storyList_content_bottom"></div>
		    </div>';
		}
	}
	echo "<br/><br/>";
    echo "<table style='margin:0 auto;width:20%;font-size:16px;'>";
    if ($page_num == 1){
    	echo "<td>第1页</td><td>共1页</td>";
    }else{
    	if ($page == 1){
    		echo "<td>第1页</td><td>共".$page_num."页</td><td><a href='search_result.php?search_word=".$search_word."&page=2&start=15'>下一页</a></td>";
    	}else{
    		if ($page != $page_num){
    			echo "<td><a href='search_result.php?search_word=".$search_word."&page=".strval($page - 1)."&start=".strval($start - $pagesize)."'>上一页</a></td>
    			<td>第".$page."页</td>
    			<td>共".$page_num."页</td>
    			<td><a href='search_result.php?search_word=".$search_word."&page=".strval($page + 1)."&start=".strval($start + $pagesize)."'>下一页</a></td>";
    		}else{
    			echo "<td><a href='search_result.php?search_word=".$search_word."&page=".strval($page - 1)."&start=".strval($start - $pagesize)."'>上一页</a></td><td>第".$page."页</td><td>共".$page_num."页</td>";
		}
    	}
}
}
else{
	echo '<div style="float:center;width:400px;margin:0 auto;border:1px solid #ff2832;">
	<br/>
	<P align="center" style="font-size:20px">无结果</P>
	<br/>
	</div>
	<br/>
	<br/>
	<br/>';
	$sql2="SELECT*FROM (book_info INNER JOIN book_stock ON book_info.book_id = book_stock.book_id) INNER JOIN (author_info INNER JOIN author_book_relationship ON author_info.author_id = author_book_relationship.author_id) ON book_info.book_id = author_book_relationship.book_id";
	$r1=mysqli_query($conn,$sql2);
	$r1=mysqli_query($conn,$sql2);
	$numall = $r1->num_rows;
	$page_num = ($numall % $pagesize)?(intval($numall / $pagesize) + 1):($numall / $pagesize);
	$r1 = $conn->query($sql2." ORDER BY book_grade DESC limit $start, $pagesize");
	$numb = $r1->num_rows;
	while($row1 = $r1->fetch_assoc()){
	echo '<div style="border:1px solid #ff2832;float:middle;width:1000px;margin:0 auto;">
		<div class="product_storyList_content_left"><img src='.$row1["book_picture"].' style="height:200px;width:145px;"/></div>
		<div class="product_storyList_content_right">
                <ul>
                    <li class="product_storyList_content_dash"><a href="detail.php?id='.$row1["book_id"].'" class="blue_14" style="font-size:20px;">'.$row1["book_name"].'</a></li>
                    <li>评分：'.$row1["book_grade"].'</li>
                    <li>作　者：'.$row1["names"].'</a> 著</li>
                    <li>出版社：'.$row1["book_publisher"].'</a></li>
                    <li>'.$row1["CH_intro"].'</li>
                    <li>
                        <dl class="product_content_dd">
                            <dd class="footer_dull_red" style="font-size:20px;"><span>￥'.$row1["book_sale_price"].'</span></dd>
                        </dl>
                    </li>
                </ul>
            </div>
            <div class="product_storyList_content_bottom"></div>
            </div>';
	}
	echo "<br/><br/>";
    echo "<table style='margin:0 auto;width:20%;font-size:16px;'>";
    if ($page_num == 1){
    	echo "<td>第1页</td><td>共1页</td>";
    }else{
    	if ($page == 1){
    		echo "<td>第1页</td><td>共".$page_num."页</td><td><a href='search_result.php?search_word=".$search_word."&page=2&start=15'>下一页</a></td>";
    	}else{
    		if ($page != $page_num){
    			echo "<td><a href='search_result.php?search_word=".$search_word."&page=".strval($page - 1)."&start=".strval($start - $pagesize)."'>上一页</a></td>
    			<td>第".$page."页</td>
    			<td>共".$page_num."页</td>
    			<td><a href='search_result.php?search_word=".$search_word."&page=".strval($page + 1)."&start=".strval($start + $pagesize)."'>下一页</a></td>";
    		}else{
    			echo "<td><a href='search_result.php?search_word=".$search_word."&page=".strval($page - 1)."&start=".strval($start - $pagesize)."'>上一页</a></td><td>第".$page."页</td><td>共".$page_num."页</td>";
    		}
    	}
}

$conn->close();
?>



