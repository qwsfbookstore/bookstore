<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>奇文书坊-高级检索</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/foot.css">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css"  href="css/booklist.css"/>
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
                include("db.php");
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
                <a href="guestbook.php">留言板</a>
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
    <a href="advanced_search.php" style="position: relative; top:45px;">&nbsp;&nbsp;高级检索</a>
    <div class="guest_cart fr">
        <a href="ShowCart.php" class="cart_name fl">我的购物车</a>
        <?php
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
        ?></div>
    </div>
</div>
</div>
<div style="float:center;width:650px;margin:0 auto;border:1px solid #ff2832;">
		
		
               <form id="form1" name="form1" action="adv_search_result.php" method="post">
        <table align="center">
                <tr>
                        <td><span class="title">书名：</span></td>
                        <td><input type="text" name="bookname"></td>
                </tr>
                <br>
                <tr>

                        <td><span class="title">作者/译者：</span></td>
                        <td><input type="text" name="authorname"></td>

                </tr>
                <br>
                <tr>

                        <td><span class="title">关键词：</span></td>
                        <td><input type="text" name="keyword"></td>

                </tr>
                <br>
                <tr>

                        <td><span class="title">出版社：</span></td>
                        <td><input type="text" name="publisher"></td>

                </tr>
                <br>
                <tr>

                        <td><span class="title">ISBN：</span></td>
                        <td><input type="text" name="ISBN"></td>

                </tr>


            <tr>

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

            </tr>
            <br>
            <tr>

                    <td><span class="title">价格区间：</span></td>
                    <td>
                        <input type="number" name="lower_price">
                        至
                        <input type="number" name="higher_price">
                    </td>

            </tr>
            <br>
            <tr>

                    <td><span class="title">评分高于：</span></td>
                    <td><input type="number" name="score"></td>

            </tr>
            <br>
            <tr>

                    <td><span class="title">库存状态：</span></td>
                    <td><input type="checkbox" name="stock_status[]" value=1>仅显示有货</td>

            </tr>
		<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
        <tr>
            <td><input type="submit" value="检索" name="search">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="清空检索条件" onclick="funClear()"></td>
        </tr>
        </table>
    </form>
	 <br/><br/><br/><br/>

            <div class="product_storyList_content_bottom"></div>
            </div>

   
</div>
<br/><br/>
</body>

</html>
