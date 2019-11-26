<html>
<head>
    <meta charset="UTF-8">
    <title>订单详情</title>
    <link rel="shortcut icon" href="images/storelogo.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <link rel="stylesheet" type="text/css" href="css/base_1.css">
    <link rel="stylesheet" type="text/css" href="css/address.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/foot.css">
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/method.js"></script>
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
                    echo "<script>alert('请先登录！');window.location.href='index.php';</script>";
                else
                    echo'欢迎您：'.$_SESSION['user_name'];
                ?>
                <span>|</span>
                <a href="logout.php">退出</a>
            </div>
            <div class="user_link fl">
                <span>|</span>
                <a href="ShowCart.php">我的购物车</a>
                <span>|</span>
                <a href="index.php">首页</a>
            </div>
        </div>
    </div>
</div>

<div class="mydang">
    <div class="head">
        <a class="logo" href="index.php">
            <img src="images/logo1.png" alt="">
        </a>
    </div>
    <div class="my_left">
        <div class="my_menu">
            <h3 class="my_menu_title">
                <a href="#" id="J_myhomeBtn">我的书坊</a>
            </h3>
            <dl>
                <dt id="class600" name="orders">我的交易</dt>
                <dd>
                    <a href="checkorder.php">我的订单</a>
                </dd>
                <dt id="class640" name="personalinformation">个人中心</dt>
                <dd>
                    <a href="personalinfo.php" id="a_personal">个人信息</a>
                </dd>
                <dd>
                    <a href="editpwd.php" id="a_eidpwd">修改密码</a>
                </dd>
                <dd>
                    <a href="address.php" id="a_adress">收货地址</a>
                </dd>
            </dl>
        </div>
    </div>
    <div class="my_main">
        <div class="my_title">
            <span class="title"><?PHP
                include "db.php";
                $order_id=$_GET['id'];
                echo $order_id;
                ?>
                </span>
        </div>
        <div class="shadow_box">

            <form  id='reFrom' action=""  method="post">
                <style type="text/css">
                    .table-con th{
                        background-color: #FE642E;/*背景颜色*/
                        color: #FFFFFF;
                    }
                    table{
                        background-color: #FFFFFF;
                        border-collapse: collapse;
                        vertical-align: center;
                        height: auto;
                        margin-top: 50px;
                    }
                    table,th,td{
                        border:1px solid #D8D8D8;
                    }
                    td{
                        text-align: center;
                        vertical-align: middle;
                    }

                </style>
                </head>

                <div class="table-con">
                    <table align="left">
                        <tr>
                            <th width=100 >图书ISBN</th>
                            <th width=100>书名</th>
                            <th width=100>图书封面</th>
                            <th width=100>售价</th>
                            <th width=100>数量</th>
                        </tr>
                        <?php
                        $row_book=sql('order_details', '*', "order_id = '$order_id'");
                        $book_id=$row_book['book_id'];
                        $sql="select book_id,book_name,book_picture,book_sale_price from book_info where book_id='$book_id'";
                        $r=mysqli_query($conn,$sql);
                        while ($row=mysqli_fetch_array($r)) {
                            ?>
                            <tr>
                                <td><?php echo $row["book_id"] ?></td>
                                <td><?php echo $row["book_name"]?></td>
                                <td><img src=<?php echo $row["book_picture"]?> width=100px></td>
                                <td><?php echo $row["book_sale_price"]?></td>
                                <td><?php echo $row_book["book_num"]?></td>
                            </tr>
                            <?php
                        }
                        ?>

                    </table>

                </div>



            </form>

        </div>
    </div>
</div>

</div>
<div class="footer_nav_box">
    <div class="clear"></div>
</div>
</body>
</html>


