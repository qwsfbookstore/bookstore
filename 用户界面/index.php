<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/foot.css">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <script src="js/html5.js"></script>
    <script type="text/javascript" src="js/ie6.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/index.js"></script>
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
	<form action="search_result.php" method="post" autocomplete="off">
    <div class="search_con fl">
        <input type="text" class="input_text fl" name="search_word" placeholder="搜索商品">
        <input type="button" class="input_btn fr" name="" value="搜索">
    </div>
</form>
<a href="advanced_search.html" style="position:absolute; top:75px; left:990px; ">高级检索</a>
    <div class="guest_cart fr">
        <a href="ShowCart.php" class="cart_name fl">我的购物车</a>
        <div class="goods_count fl" id="show_count">0</div>
    </div>
</div>
<div class="center_con clearfix">

<a href="detail.php?id='9787040406641'"><img src="images/index_ad.jpg" width="739" height="423"  style="margin-left:20%; border: 5px solid orangered">
<div class="list_model">
        <div class="list_title clearfix">
            <h3 class="fl" id="model01">文学</h3>
            <div class="subtitle fl">
                <span>|</span>
            </div>
            <a href="#" class="goods_more fr" >查看更多 ></a>
  </div>

        <div class="goods_con clearfix">

            <ul  class="goods_list fl">
                <span></span>
                <?php
                include "db.php";
                $sql1="SELECT*from book_info where book_type='文学'";
                $r1=mysqli_query($conn,$sql1);
                for($x=0; $x<=3; $x++) {
                    $row1=mysqli_fetch_array($r1);
                ?>
                <li>

                    <h4><a href="detail.php?id=<?php echo $row1["book_id"]?>"><?php echo $row1["book_name"] ?></a></h4>
                    <a href="detail.php?id=<?php echo $row1["book_id"]?>"><img src=<?php echo $row1["book_picture"]?>></a>
                    <div class="prize"><?php echo $row1["book_sale_price"]."元"?></div>
                </li>
                    <?php
                }
                ?>
            </ul>
        </div>

</div>

    <div class="list_model">
        <div class="list_title clearfix">
            <h3 class="fl" id="model01">经济</h3>
            <div class="subtitle fl">
                <span>|</span>
            </div>
            <a href="#" class="goods_more fr" id="fruit_more">查看更多 ></a>
        </div>


        <div class="goods_con clearfix">

            <ul  class="goods_list fl">
                <span></span>
                <?php
                $sql2="SELECT*from book_info where book_type='经济' or book_type='投资'";
                $r2=mysqli_query($conn,$sql2);
                for($x=0; $x<=3; $x++) {
                    $row2=mysqli_fetch_array($r2);
                    ?>
                    <li>

                        <h4><a href="detail.php?=id=<?php echo $row2["book_id"]?>"><?php echo $row2["book_name"] ?></a></h4>
                        <a href="detail.php?id=<?php echo $row2["book_id"]?>"><img src=<?php echo $row2["book_picture"]?>></a>
                        <div class="prize"><?php echo $row2["book_sale_price"]."元"?></div>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>

    </div>
    <div class="list_model">
        <div class="list_title clearfix">
            <h3 class="fl" id="model01">教辅</h3>
            <div class="subtitle fl">
                <span>|</span>
            </div>
            <a href="#" class="goods_more fr" id="fruit_more">查看更多 ></a>
        </div>


        <div class="goods_con clearfix">

            <ul  class="goods_list fl">
                <span></span>
                <?php
                $sql3="SELECT*from book_info where book_type='数学' or book_type='计算机' or  book_type='艺术'";
                $r3=mysqli_query($conn,$sql3);
                for($x=0; $x<=3; $x++) {
                    $row3=mysqli_fetch_array($r3);
                    ?>
                    <li>

                        <h4><a href="detail.php?id=<?php echo $row3["book_id"]?>"><?php echo $row3["book_name"] ?></a></h4>
                        <a href="detail.php?id=<?php echo $row3["book_id"]?>"><img src=<?php echo $row3["book_picture"]?>></a>
                        <div class="prize"><?php echo $row3["book_sale_price"]."元"?></div>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>

    </div>
    <div class="list_model">
        <div class="list_title clearfix">
            <h3 class="fl" id="model01">史哲</h3>
            <div class="subtitle fl">
                <span>|</span>
            </div>
            <a href="#" class="goods_more fr" id="fruit_more">查看更多 ></a>
        </div>


        <div class="goods_con clearfix">

            <ul  class="goods_list fl">
                <span></span>
                <?php
                $sql4="SELECT*from book_info where book_type='哲学' or book_type='历史' or  book_type='心理学'";
                $r4=mysqli_query($conn,$sql4);
                for($x=0; $x<=3; $x++) {
                    $row4=mysqli_fetch_array($r4);
                    ?>
                    <li>

                        <h4><a href="detail.php?id=<?php echo $row4["book_id"]?>"><?php echo $row4["book_name"] ?></a></h4>
                        <a href="detail.php?id=<?php echo $row4["book_id"]?>"><img src=<?php echo $row4["book_picture"]?>></a>
                        <div class="prize"><?php echo $row4["book_sale_price"]."元"?></div>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>

    </div>


        <div class="goods_con clearfix">

            <ul  class="goods_list fl">
                <span></span>


            </ul>
        </div>

    </div>




    <script type="text/javascript" src="js/editpwd.js"></script>

</body>
</html>
