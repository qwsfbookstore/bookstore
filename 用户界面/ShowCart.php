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
    <script>
        function addgoods(id) {
            var cookieop = new cookieOperate();
            var csrf = cookieop.getCookie('csrftoken');
            $.ajax({
                url: "addgoods.php",
                type: 'POST',
                data: {'book_id': id},

                beforeSend: function (request) {
                    request.setRequestHeader("X-CSRFToken", csrf);
                },
                success: function (data) {
                    window.location = window.location;
                },
                error:function (data) {
                    alert("失败")
                }
            });
        }
        function subgoods(id) {
            var cookieop = new cookieOperate();
            var csrf = cookieop.getCookie('csrftoken');
            $.ajax({
                url: 'subgoods.php',
                type: 'POST',
                data: {'book_id': id},

                beforeSend: function (request) {
                    request.setRequestHeader("X-CSRFToken", csrf);
                },
                success: function (data) {
                    window.location = window.location;
                }
            });
        }
    </script>
    <script>
        $(function () {
            $('#jiesuan').click(function () {
                var cartlist ="";
                $('.onecheck:checked').each(function(i) {
                    cartlist+= parseFloat($(this).parents("ul ").find('.cat_cid').val());
                    cartlist+="#"
                })
                $('#cartlist').val(cartlist);
                $('#payform').submit();
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
    <a href="index.php" class="logo fl"><img src="images/logo1.png" width="175" height="104"></a>
    <div class="sub_page_name fl">|&nbsp;&nbsp;&nbsp;&nbsp;购物车</div>
</div>
<?php
    $id=$_SESSION['user_id'];
    $sql="SELECT*from cart_info where user_id = '$id'";
    $r=mysqli_query($conn,$sql);
    $ra=mysqli_num_rows($r);
?>
<div class="total_count">全部书目<em><?php echo $ra;?></em>种</div>
<ul class="cart_list_th clearfix">
    <li class="col01">图书名称</li>
    <li class="col02">图书定价</li>
    <li class="col03">图书折扣</li>
    <li class="col04">数量</li>
    <li class="col05">小计</li>
    <li class="col06">操作</li>
</ul>
<form id="payform" method="post" action="pay.php" id="cartform">

    <ul class="cart_list_td clearfix" id="436">
        <?php
        $totalprice=0;
        $count=0;
        while ($row=mysqli_fetch_array($r)) {
            echo '<li class="col01"></li>';

        echo '<input type="hidden" name="id"  value="'.$row["book_id"].'">
        <li class="col02">  <img src="'.$row["book_picture"].'"></li>
        <li class="col03">'.$row["book_name"].'</li>
        <li class="col04">'.$row["book_sale_price"].'元</li>
        <li class="col05">'.$row["user_discount"].'折</li>
        <li class="col06">
            <div class="num_add">
                <a href="javascript:;"  class="add fl" onclick="addgoods('.$row["book_id"].')">+</a>
                <input type="text" class="num_show  fl" value="'.$row["book_num"].'">
                <a href="javascript:;"  class="minus fl" onclick="subgoods('.$row["book_id"].')">-</a>
            </div>
        </li>
        <li class="col07"><em id="price">'.$row["book_sumprice"].'</em>元</li>
        <li class="col08"><a href="deletecart.php?id='.$row["book_id"].'">删除</a></li>';
            $totalprice+=$row["book_sumprice"];
            $count+=$row["book_num"];
        }
        ?>

    </ul>

    <input type="text" id="cartlist" name="cartlist" value="">
    <ul class="settlements">
        <li class="col01"></li>
        <li class="col02">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
        <li class="col03">合计(包邮)：<span>¥</span><em id="zong"><?php echo $totalprice;?></em> <br>共计<b id="zongshu"><?php echo $count;?></b>件商品</li>
        <li class="col04"><a href="javascript:;" id="jiesuan" style="background-color: rgb(255, 61, 61);">去结算</a></li>
    </ul>
</form>

</body>
</html>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,




































































