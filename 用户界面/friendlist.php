<html>
<head>
    <meta charset="UTF-8">
    <title>我的好友</title>
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
                <dd>
                    <a href="friendlist.php" id="a_adress">我的好友</a>
                </dd>
            </dl>
        </div>
    </div>
    <div class="my_main">
        <div class="my_title">
            <span class="title">我的好友</span>
        </div>
        <div class="address_list">
            <h3>好友列表</h3>
            <dl>
                <dt>好友总数：<?php
                    $id=$_SESSION['user_id'];
                    $q = "SELECT * from friend_relationship WHERE uid='$id'";
                    $r = mysqli_query($conn,$q);
                    $ra=mysqli_num_rows($r);
                    echo $ra.'个'
                    ?></dt>
                <dt ><a href="frienddetail.php" style="color: orangered">查看详情</a></dt>

            </dl>
        </div>
        <div class="shadow_box">

                <style type="text/css">
            .table-con th{
                background-color: #FE642E;/*背景颜色*/
                color: #FFFFFF;
            }
            table{
                background-color: #FFFFFF;
                border-collapse: collapse;
                vertical-align: center;
            }
            th,td{
                width:100px;
                height: auto;
                border:1px solid #D8D8D8;
                table-layout: fixed;
                word-wrap: break-word;
            }
            td{
                text-align: center;
                vertical-align: middle;
            }

                </style>
				
			 <p>
             <div class="table-con">
                 <?php
                 $sql="SELECT*from friend_apply,user_info where friend_apply.sid = '$id' and friend_apply.uid = user_info.user_id order by apply_time desc";
                 $r=mysqli_query($conn,$sql);
                 if($r){
                 ?>
                <table>
                    <caption align="top" style="margin-bottom: 5px;"><strong>收到申请</strong></caption>
                <tr>
                  <th>申请人ID</th>
                  <th>申请人姓名</th>
                  <th>申请内容</th>
                  <th>申请时间</th>
                    <th>申请状态</th>
                    <th>操作</th>
                </tr>
                    <?php
                    while ($row=mysqli_fetch_array($r)) {
                    ?>
                    <tr>
                            <td><?php echo $row["uid"] ?></td>
                            <td><?php echo $row["user_name"] ?></td>
                            <td><?php echo $row["apply_text"]?></td>
                            <td><?php echo $row["apply_time"]?></td>
                            <td><?php echo $row["apply_status"]?></td>
                            <td><a href="friendoperate.php?action=accept&id=<?=$row['uid']?>">接受</a>
                                <span>/</span>&nbsp;<a href="friendoperate.php?action=refuse&id=<?=$row['uid']?>">拒绝</a></td>

                    </tr>
                        <?php
                    }}

                    ?>

                </table>
				
              </div>
			  </p>
			</br></br></br>
			<p>
            <div class="table-con">
                <?php
                $sql="SELECT*from friend_apply,user_info  where friend_apply.uid = '$id' and friend_apply.sid = user_info.user_id order by apply_time desc";
                $r=mysqli_query($conn,$sql);
                if($r){
                echo '
                <table>
                    <caption align="top" style="margin-bottom: 5px;"><strong>发出申请</strong></caption>

                    <tr>
                        <th>申请对象ID</th>
                        <th>申请对象姓名</th>
                        <th>申请内容</th>
                        <th>申请时间</th>
                        <th>申请状态</th>
                        <th>操作</th>
                    </tr>';

                    while ($row=mysqli_fetch_array($r)) {
                    ?>
                    <tr>
                        <td><?php echo $row["sid"] ?></td>
                        <td><?php echo $row["user_name"] ?></td>
                        <td><?php echo $row["apply_text"]?></td>
                        <td><?php echo $row["apply_time"]?></td>
                        <td><?php echo $row["apply_status"]?></td>
                        <td><a href="friendoperate.php?action=delete&id=<?=$row['sid']?>">删除</a></td>

                    </tr>
                    <?php
                    }}

                    ?>
                </table>
                <br><br><br>
                <div class="table-con">
                <table>
                    <caption align="top" style="margin-bottom: 5px;"><strong>好友推荐</strong></caption>
                    <thead>
                        <tr>
                            <th>用户名</th>
                            <th>性别</th>
                            <th>联系方式</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = 'SELECT user2_id, user_name, user_sex, user_tel FROM user_similarity JOIN user_info ON user_similarity.user2_id=user_info.user_id WHERE user1_id='.$id.' ORDER BY similarity DESC';
                        $result = mysqli_query($conn, $sql);
                        for ($i=0; $i<4; $i++){
                            $row = mysqli_fetch_array($result);

                            ?>
                        <tr>
                            <td><?php echo $row["user_name"]; ?></td>
                            <td><?php echo $row["user_sex"]; ?></td>
                            <td><?php echo $row["user_tel"]; ?></td>
                            <td><a href="" title="">加好友</a></td>
                        </tr>
                        <?php
                        }

                        ?>
                        
                    </tbody>
                </table>
            </div>

            </div>
			</p>

            </div>
  </div>
    </div>

</div>
<div class="footer_nav_box">
    <div class="clear"></div>
</div>
</body>
</html>


