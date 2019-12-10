<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>奇文书坊-首页</title>
	
	<link rel="stylesheet" type="text/css" href="css/public.css"/>
	<link rel="stylesheet" type="text/css" href="css/index.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/foot.css">
    <link rel="stylesheet" type="text/css" href="css/reset.css">

    <script src="js/index.js"></script>
    <script src="js/html5.js"></script>
	<script src="js/jquery-3.4.1.js"></script>
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
                include "db.php";
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
	<form action="search_result.php" method="post" autocomplete="off">
    <div class="search_con fl">
        <input type="text" class="input_text fl" name="search_word" placeholder="搜索商品">
        <input type="submit" class="input_btn fr" name="" value="搜索">
		
		
    </div>
	</form>
		<a href="advanced_search.php" style="position: relative; top:45px;">&nbsp;&nbsp;高级检索</a>
    <div class="guest_cart fr">
        <a href="ShowCart.php" class="cart_name fl">我的购物车</a>
        <?php
        $user_id=$_SESSION['user_id'];
        if($user_id){
            $q = "SELECT * from cart_info WHERE user_id='$user_id'";
            $r = mysqli_query($conn,$q);
            $ra=mysqli_num_rows($r);
        }else{
            $ra = 0;
        }
        echo '<div class="goods_count fl" id="show_count">'.$ra.'</div>';
        ?>
    </div>
</div>

<div class="navbar_con">
		<div class="navbar">
			<h1 class="fl">全部商品分类</h1>

		</div>
	</div>
	

 <div class="center_con clearfix">
		<ul class="subnav fl">
			<li><a href="#" >文学小说</a></li>
			<li><a href="#" >经济投资</a></li>
			<li><a href="#" >畅销教辅</a></li>
			<li><a href="#" >儿童书刊</a></li>
			<li><a href="#" >史哲经典</a></li>
			<li><a href="#" >艺术荟萃</a></li>
		</ul>
         <div class="container">
            <div class="wrap"  style="left:-802px;">
                <img src="images/1.webp">
                <a href="detail.php?id='9787040406641'"><img src="images/index_ad.jpg"></a>
                <img src="images/ad1.jpg">
                <img src="images/ad2.jpg">
                <img src="images/4.webp">
                <img src="images/1.webp">
				<img src="images/index_ad.jpg">

            </div>
             <ul class="tab-nav" style="margin-left: -78px; display: block;">
                <s class="nav-item" data-tab-idx="0"></s>
                <s class="nav-item " data-tab-idx="1"></s>
                <s class="nav-item" data-tab-idx="2"></s>
                <s class="nav-item" data-tab-idx="3"></s>
                <s class="nav-item" data-tab-idx="4"></s>

             </ul>
            <div class="tab-prev" id='tab-prev'contenteditable="true"></div>
            <div class="tab-next" id='tab-next'contenteditable="true"></div>
         </div>	

<div class="list_model">
        <div class="list_title clearfix">
            <h3 class="fl" id="model01">文学</h3>
            <div class="subtitle fl">
                <span>|</span>
            </div>
            <a href="list.php?type=文学" class="goods_more fr" >查看更多 ></a>
  </div>

        <div class="goods_con clearfix">

            <ul  class="goods_list fl">
                <span></span>
                <?php

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
            <a href="list.php?type=经济" class="goods_more fr" id="fruit_more">查看更多 ></a>
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
