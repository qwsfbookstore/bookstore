<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>密码修改</title>
    <link rel="shortcut icon" href="images/storelogo.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/base.css">
    <link rel="stylesheet" type="text/css" href="css/base_1.css">
    <link rel="stylesheet" type="text/css" href="css/editpwd.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/foot.css">
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/ie6.js"></script>

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
                    <a href="personalinfo.php" %}" id="a_personal">个人信息</a>
                </dd>
                <dd>
                    <a href="editpwd.php" %}" id="a_eidpwd">修改密码</a>
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
            <span class="title">密码管理</span>
        </div>

        <div class="shadow_box">
            <div class="body">
                <form  id='reFrom' action="edit.php"  method="post">

                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td class="t">旧密码：</td>
                            <td class="z_index2">
                                <input name="oldpassword" id="oldpassword"  type="password"  class="text1" placeholder="6位非中文字符">
                            </td>
                            <td class="tips">
                                <span id="oldpassword_tips" style="display: none;"></span>
                            </td>
                        </tr>
                        <tr>
                        <tr>
                            <td class="t">新密码：</td>
                            <td class="z_index2">
                                <input name="newpassword" id="newpassword" type="password"  class="text1" placeholder="6位非中文字符">
                            </td>
                            <td class="tips">
                                <span id="newpassword_tips" style="display: none;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="t">重输新密码: </td>
                            <td class="z_index2">
                                <input name="newpassword2" id="newpassword2" type="password" class="text1" placeholder="6位非中文字符">
                            </td>
                            <td class="tips">
                                <span id="newpassword2_tips" style="display: none;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="t"></td>
                            <td class="z_index2">
                                <input type="button" id="address_btn" value="提交" >
                            </td>
                        </tr>
                    </table>
                </form>

            </div>
        </div>
    </div>




    <script type="text/javascript" src="js/editpwd.js"></script>

</body>
</html>
