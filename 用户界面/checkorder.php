<html>
<head>
    <meta charset="UTF-8">
    <title>我的订单</title>
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
            <span class="title">我的订单</span>
        </div>
        <div class="address_list">
            <h3>我的消费</h3>
            <dl>
                <dt>消费总额：</dt>
                <dd><?php
					$id=$_SESSION['user_id'];
					$row = sql('user_consumption', '*', "user_id = '$id'");
                    echo $row['total_consumption']."元";
                    ?></dd>
            </dl>
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
                  <th width=100 >订单编号</th>
                  <th width=100>员工编号</th>
                  <th width=100>订单时间</th>
                  <th width=100>订单总额</th>
                    <th width=100>查看详情</th>
                </tr>
                    <?php
                    $sql="SELECT*from order_sum where user_id = '$id' order by order_time desc";
                    $r=mysqli_query($conn,$sql);
                    while ($row=mysqli_fetch_array($r)) {
                    ?>
                    <tr>
                            <td><?php echo $row["order_id"] ?></td>
                            <td><?php echo $row["staff_id"]?></td>
                            <td><?php echo $row["order_time"]?></td>
                            <td><?php echo $row["total_sales"]?></td>
                            <td><a href="orderdetail.php?id=<?php echo $row["order_id"]?>">查看详情</ a></td>

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


