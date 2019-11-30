<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bookstore";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$book_id = $_GET['book_id'];

$sql = "SELECT * FROM book_info WHERE book_id = $book_id";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/foot.css">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/showcat.css">
    <script src="js/html5.js"></script>
    <script type="text/javascript" src="js/ie6.js"></script>
    <script src="js/jquery.js"></script>
    <script type="text/javascript"   src="js/common.js"></script>
    <script type="text/javascript"   src="js/ShowCat.js"></script>
</head>
<body>
<div class="header_con">
    <div class="header">
        <div class="welcome fl">欢迎来到奇文书坊</div>
        <div class="fr">
            <div class="login_btn fl">
                <?php
                if(empty($_SESSION['user_name']))
                echo "<script>alert('请先登录！');window.location.href='homepage.php';</script>";
                else
                echo'欢迎您：'.$_SESSION['user_name'];
                ?>
                <span>|</span>
                <a href="logout.php">退出</a>
                <a href="login.html">登录</a>
                <span>|</span>
                <a href="register.html">注册</a>
            </div>
            <div class="user_link fl">
                <span>|</span>
                <a href="#">用户中心</a>
                <span>|</span>
                <a href="ShowCart.php">我的购物车</a>
                <span>|</span>
                <a href="orderdetail.php">我的订单</a>
            </div>
        </div>
    </div>
</div>
<div class="search_bar clearfix">
    <a href="#" class="logo fl"><img src="images/logo1.png" width="175" height="104"></a>
    <div class="sub_page_name fl">|&nbsp;&nbsp;&nbsp;&nbsp;购物车</div>
</div>

<ul class="cart_list_th clearfix">
    <li class="col01">图书图片</li>
    <li class="col02">图书名称</li>
    <li class="col03">商品价格</li>
    <li class="col04">数量</li>
    <li class="col05">小计</li>
    <li class="col06">操作</li>
</ul>
<form id="payform" method="post" id="cartform">
    <ul class="cart_list_td clearfix" id="436">
        <li class="col01"><input type="checkbox" class="onecheck" checked >
        </li>

        <input type="hidden" name="pid[]"  value="{{ cat.product_id }}">
        <input type="hidden" class="cat_cid"  value="{{ cat.cid }}">
        <div id="preview"><li class="col02"><p id="medimImgContainer"><img id="mediumImg" src=<?php echo $row["book_picture"]?>></p></li>
            </li></div>
        <li class="col03"> </li>
        <li class="col04"><?php
            $row=mysqli_fetch_array($result);
            echo '<p>《'.$row['book_name'].'》</p><br/>';
            ?></li>
        <li class="col05"><?php
            echo '<p>'.$row['book_sale_price'].'元</p><br/>';
            ?></li>
        <li class="col06">2 本</li>
        <li class="col07"><em id="price"> </em>72 元</li>
        <li class="col08"><a href="{% url 'bShop:deletcart' %}?pid={{ cat.product_id }}">删除</a></li>
    </ul>
    <input type="text" id="cartlist" name="cartlist" value="">
    <ul class="settlements">
        <li class="col01"><input type="checkbox" id="allcheck" checked  ></li>
        <li class="col02">全选</li>
        <li class="col03">合计(包邮)：<span>¥</span><em id="zong"></em> <br>共计<b id="zongshu"></b> 件商品</li>
        <li class="col04"><a href="javascript:;" id="jiesuan" style="background-color: rgb(255, 61, 61);">结算</a></li>
    </ul>
</form>

<script>
    $(function () {
        $("#allcheck").click(function() {
            var flag = $(this).prop("checked");
            if(flag) {
                $(".onecheck").prop("checked", true);
            } else {
                $(".onecheck").prop("checked", false);

            }
            totalPrice();
            counts();
        });

        //单选
        $(".onecheck").click(function() {

            var CL = $(".onecheck").length; //列表长度；
            var CH = $(".onecheck:checked").length; //列表中被选中的长度

            if(CL == CH) {
                $("#allcheck").prop("checked", true);

            } else {
                $("#allcheck").prop("checked", false);

            }

            totalPrice();
            counts();
        })
        //总价格
        totalPrice();

        function totalPrice() {
            var prices = 0;
            $('.onecheck:checked').each(function(i) {
                console.log()
                prices += parseFloat($(this).parents("ul ").find('#price').text());
            })
            $('#zong').text(prices);
        }

        //总数目
        counts();

        function counts() {
            var sum = 0;
            $('.onecheck:checked').each(function(i) {
                sum += parseInt($(this).parents("ul").find('.num_show').val());
            })
            $('#zongshu').text(sum);
        }

    });

</script>

</body>
</html>
