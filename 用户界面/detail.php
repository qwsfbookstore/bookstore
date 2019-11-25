<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/detail.css">
       <link rel="stylesheet" type="text/css" href="css/foot.css">
     <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/foot.css">
    <script type="text/JavaScript" src="js/html5.js"></script>
    <script type="text/javascript" src="js/ie6.js"></script>
    <script type="text/JavaScript" src="js/jquery.js"></script>
     <script type="text/JavaScript" src="js/detail.js"></script>
        <script type="text/javascript" src="js/test.js"></script>
    <script type="text/javascript"   src="js/common.js"></script>



</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "bookstore";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
            }

        $book_id = $_GET['book_id'];

        $sql = "SELECT * FROM book_info WHERE book_id = $book_id";

        $result1 = $conn->query($sql);
        $result2 = $conn->query($sql);
        $result3 = $conn->query($sql);
        $result4 = $conn->query($sql);
    ?>
    <div class="header_con">
        <div class="header">
            <div class="welcome fl">欢迎来到奇文书坊!</div>
        </div>
     </div>
    <div class="search_bar clearfix">
        <a href="index.html" class="logo fl"><img src="images/logo1.png" width="140" height="90"></a>
        <div class="guest_cart fr">
            <a href="ShowCart.html" class="cart_name fl">我的购物车</a>
            <div class="goods_count fl" id="show_count">click</div>
        </div>
    </div>

     <div class="navbar_con">
        <div class="navbar">
            <h1 class="fl">全部商品分类</h1>
            <span></span>


        </div>
    </div>
     <div class="breadcrumb">
        <a href="#">全部分类</a>
        <span>></span>
        <?php
        while ($row1=mysqli_fetch_array($result1)) {
            echo $row1['book_type'];
        }
        ?>
        <span>></span>
        <span>商品详情</span>
    </div>
    <div class="goods_detail_con clearfix">
       <!--产品简介-->
        <div id="product_intro">
            <div id="preview">
                <p id="medimImgContainer">
                          <img id="mediumImg" src="book_images/9787040406641.png"/>
                  </p>
            </div>
            <form method="get" action="detail.php">
                 <div class="goods_detail_list fr">
                    <h3>
                    <?php
                        while ($row2=mysqli_fetch_array($result2)) {
                        echo '<p>图书编号：'.$row2['book_id'].'</p>';
                        echo '<p>图书名称：'.$row2['book_name'].'</p>';
                        }
                    ?>
                    </h3>
                    <div class="prize_bar">
                        <span class="show_pirze2">
                            <em id="danjia">
                            <?php
                                while ($row3=mysqli_fetch_array($result3)){ echo'<p>价格：'.$row3['book_sale_price'].'元</p>';
                            }
                            ?>
                        </span>
                     </div>
                     <div class="goods_num clearfix">
                         <div class="num_name fl">数 量：</div>
                            <div class="num_add fl">
                                <input type="text" class="num_show_{{ product.pid }} fl" id="shuliang" value="1">
                                <a href="javascript:;" class="add fr" id="jiahao">+</a>
                                <a href="javascript:;"  class="minus fr" id="jianhao">-</a>
                            </div>
                        </div>
                        <div class="operate_btn">
                            <a href="#" class="buy_btn">立即购买</a>
                            <a href="javascript:;"  class="add_cart" id="add_cart">加入购物车<i class="cart"></i></a>
                        </div>
                      </div>

            </form>
      </div>



        </div>

    </div>

<div class="product_content clearfix">
<div id="right-content" class="main">
    <div id="buyTogether" class="group_buy" dd_name="最佳拍档">
        <ul class="tab clearfix">
            <li class="hover">中文介绍</li>
            <li class="hover">英文介绍</li>
        </ul>
         <div class="over">
            <?php
                while ($row4=mysqli_fetch_array($result4)) {
                    echo '<p>中文简介：'.$row4['CH_intro'].'</p>';
                    echo '<p>英文简介：'.$row4['ENG_intro'].'</p>';
                    }
            ?>
         </div>

    </div>


</div>

</div>
 <div class="footer_nav_box">
   <div class="clear"></div>
</div>





</body>
</html>

