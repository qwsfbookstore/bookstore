<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>奇文书坊-图书详情</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/detail.css">
    <link rel="stylesheet" type="text/css" href="css/foot.css">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/foot.css">
    <link rel="stylesheet" type="text/css"  href="css/booklist.css"/>
    <script type="text/JavaScript" src="js/html5.js"></script>
    <script type="text/javascript" src="js/ie6.js"></script>
    <script type="text/JavaScript" src="js/jquery.js"></script>
    <script type="text/JavaScript" src="js/detail.js"></script>
    <script type="text/javascript" src="js/test.js"></script>
    <script type="text/javascript"   src="js/common.js"></script>


</head>
<body>
<div class="header_con">
    <div class="header">
        <div class="welcome fl">欢迎来到奇文书坊!</div>
    </div>
</div>
<div class="search_bar clearfix">
    <a href="index.php" class="logo fl"><img src="images/logo1.png" width="140" height="90"></a>
    <div class="guest_cart fr">
        <a href="ShowCart.php" class="cart_name fl">我的购物车</a>
        <?php
        include ("db.php");
        session_start();
        $user_id=$_SESSION['user_id'];
        if($user_id){
            $q = "SELECT * from cart_info WHERE user_id='$user_id'";
            $r = mysqli_query($conn,$q);
            $ra=mysqli_num_rows($r);
        }else{
            $ra = 0;
        }
        echo '<div class="goods_count fl" id="show_count">'.$ra.'</div>';
        ?>
    </div>
</div>

<div class="navbar_con">
    <div class="navbar">
        <h1 class="fl">全部商品分类</h1>
        <span></span>


    </div>
</div>
<div class="breadcrumb">
    <a href="index.php">全部分类</a>
    <span>></span>
    <?php $type=$_GET['type'];
    echo $type;?>
    <span>></span></div>
    <?php
    $sql="SELECT*FROM (book_info INNER JOIN book_stock ON book_info.book_id = book_stock.book_id) INNER JOIN (author_info INNER JOIN author_book_relationship ON author_info.author_id = author_book_relationship.author_id) ON book_info.book_id = author_book_relationship.book_id where book_type='".$type."'";
    $result=mysqli_query($conn,$sql);


    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo '<div style="border:1px solid #ff2832;float:middle;width:1000px;margin:0 auto;">
		<div class="product_storyList_content_left"><img src='.$row["book_picture"].' style="height:200px;width:145px;"/></div>
		<div class="product_storyList_content_right">
                <ul>
                    <li class="product_storyList_content_dash"><a href="detail.php?id='.$row["book_id"].'" class="blue_14" style="font-size:20px;">'.$row["book_name"].'</a></li>
                    <li>评分：'.$row["book_grade"].'</li>
                    <li>作　者：'.$row["author_name"].'</a> 著</li>
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

    $conn->close();
    ?>


<div class="footer_nav_box">
    <div class="clear"></div>
</div>





</body>
</html>

