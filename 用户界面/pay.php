<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/foot.css">
     <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/showcat.css">
    <link rel="stylesheet" type="text/css" href="css/pay.css">

    <script src="js/html5.js"></script>
    <script type="text/javascript" src="js/ie6.js"></script>
    <script src="js/jquery.js"></script>
    <script>
        $(function () {
            $('#order_btn').click(function () {
                $('#order_form').submit();
            });
        });
    </script>

</head>

<body>
    <div class="header_con">
		<div class="header">
			<div class="welcome fl">欢迎来到奇文书坊</div>
			<div class="fr">
				<div class="login_btn fl">
                    <?php
                    include "db.php";
                    session_start();
                    if(empty($_SESSION['user_name']))
                        echo "<script>alert('请先登录！');window.location.href='index.php';</script>";
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
                    <a href="guestbook.php">留言板</a>
				</div>
			</div>
		</div>
     </div>
      <div class="search_bar clearfix">
		<a href="index.php" class="logo fl"><img src="images/logo1.png" width="182" height="110"></a>
		<div class="sub_page_name fl">|&nbsp;&nbsp;&nbsp;&nbsp;支付生成订单</div>
	</div>
    <h3 class="common_title">确认收货地址</h3>
    <div class="common_list_con clearfix">
		<dl>
			<dt>寄送到：</dt>
			<dd><input type="radio" name="" checked="">
			<?php
			    $id=$_SESSION['user_id'];
                $row = sql('user_info', '*', "user_id = '$id'");
                echo $row['user_address'];?></dd>
		</dl>
		<a href="address.php" class="edit_site">编辑收货地址</a>
	</div>
    <h3 class="common_title">支付方式</h3>
    <div class="common_list_con clearfix">
		<div class="pay_style_con clearfix">
			<input type="radio" name="pay_style" checked="">
			<label class="cash">货到付款</label>
			<input type="radio" name="pay_style">
			<label class="weixin">微信支付</label>
			<input type="radio" name="pay_style">
			<label class="zhifubao"></label>
			<input type="radio" name="pay_style">
			<label class="bank">银行卡支付</label>
		</div>
	</div>
    <h3 class="common_title">书目列表</h3>
    <div class="common_list_con clearfix">
		<ul class="goods_list_th clearfix">
			<li class="col01">图书名称</li>
			<li class="col02">图书定价</li>
			<li class="col03">图书折扣</li>
			<li class="col04">数量</li>
			<li class="col05">小计</li>
		</ul>
	</div>
    <form method="post" action="submitorder.php" id="order_form">
        <ul class="goods_list_td clearfix" id="461">
            <?php
            $sql="SELECT*from cart_info where user_id = '$id'";
            $r=mysqli_query($conn,$sql);
            $totalprice=0;
            $count=0;
            while ($row=mysqli_fetch_array($r)) {

            ?>
			<li class="col01"></li>
			<li class="col02"><img class="imgl" src="<?php echo $row['book_picture'];?>"></li>
			<li class="col03"><?php echo $row['book_name'];?></li>
			<li class="col04"><?php echo $row['book_sale_price'];?></li>
			<li class="col05"><?php echo $row['user_discount'];?></li>
			<li class="col06"><em class="num"><?php echo $row['book_num'];?></em></li>
			<li class="col07"><em class="price"><?php echo $row['book_sumprice'];?></em>元</li>
            <?php
                $totalprice+=$row["book_sumprice"];
                $count+=$row["book_num"];
            }?>

		</ul>


    <h3 class="common_title">总金额结算</h3>
    <div class="common_list_con clearfix">
		<div class="settle_con">
			<div class="total_goods_count">共<em id="shuliang"><?php echo $count;?></em>件商品，商品总金额<b id="zong"><?php echo $totalprice;?>元</b></div>
			<div class="transit">运费：<b>包邮</b></div>
			<div class="total_pay">应付款：<b id="fu"><?php echo $totalprice;?>元</b></div>
		</div>
	</div>
    <div class="order_submit clearfix">
		<a href="javascript:;" id="order_btn">支付</a>
	</div>

    </form>

</body>
</html>

