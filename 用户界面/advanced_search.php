<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>奇文书坊-高级检索</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/foot.css">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <script src="js/html5.js"></script>
    <script type="text/javascript" src="js/ie6.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/index.js"></script>
    <script>
        function funClear() {
        var txts = document.getElementsByTagName("input");
        for (var i = 0; i < txts.length; i++) {
            if (txts[i].type == "text"||txts[i].type == "number"||txts[i].type == "checkbox") {
                txts[i].value = "";
            }
        }
    }
    </script>
    <style type="text/css" media="screen">

    table{
        border-width: 1px;
        border-color: #FF2832;
    }

    input[type=text],
    select {
        padding: 10px 30px;
        margin: 4px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=number] {
        width: 30%;
        padding: 10px 15px;
        margin: 4px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=checkbox] {
        margin: 4px 0;
    }

    input[type=submit],
    input[type=button] {
        background-color: #FF2832;
        color: white;
        padding: 14px 20px;
        margin-left: 0;
        margin-right: 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
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
    <form id="form1" name="form1" action="adv_search_result.php" method="post">
        <div class="basic_condition">
        <table align="center">
                <tr>
                    <label>
                        <td><span class="title">书名：</span></td>
                        <td><input type="text" name="bookname"></td>
                    </label>
                </tr>
                <br>
                <tr>
                    <label>
                        <td><span class="title">作者/译者：</span></td>
                        <td><input type="text" name="authorname"></td>
                    </label>
                </tr>
                <br>
                <tr>
                    <label>
                        <td><span class="title">关键词：</span></td>
                        <td><input type="text" name="keyword"></td>
                    </label>
                </tr>
                <br>
                <tr>
                    <label>
                        <td><span class="title">出版社：</span></td>
                        <td><input type="text" name="publisher"></td>
                    </label>
                </tr>
                <br>
                <tr>
                    <label>
                        <td><span class="title">ISBN：</span></td>
                        <td><input type="text" name="ISBN"></td>
                    </label>
                </tr>
        </div>
        <div class="other_condition">
            <tr>
                <label>
                    <td><span class="title">分类：</span></td>
                    <td><select name="type">
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
                        $sql = "SELECT DISTINCT book_type FROM book_info";
                        $result = $conn->query($sql);
                        echo '<option value="所有分类">所有分类</option>';
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                echo "<option value=".$row["book_type"].">".$row["book_type"]."</option>";
                            }
                        }
                        $conn->close();
                         ?>
                        </select></td>
                </label>
            </tr>
            <br>
            <tr>
                <label>
                    <td><span class="title">价格区间：</span></td>
                    <td>
                        <input type="number" name="lower_price">
                        至
                        <input type="number" name="higher_price">
                    </td>
                </label>
            </tr>
            <br>
            <tr>
                <label>
                    <td><span class="title">评分高于：</span></td>
                    <td><input type="number" name="score"></td>
                </label>
            </tr>
            <br>
            <tr>
                <label>
                    <td><span class="title">库存状态：</span></td>
                    <td><input type="checkbox" name="stock_status[]" value=1>仅显示有货</td>
                </label>
            </tr>
        </div>
        <tr>
            <td>&nbsp;</td><td>&nbsp;</td>
            <td><input type="submit" value="检索" name="search"></td>
            <td><input type="button" value="清空检索条件" onclick="funClear()"></td>
        </tr>
        </table>
    </form>
</body>

</html>
