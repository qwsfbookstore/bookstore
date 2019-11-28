<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>奇文书坊后台管理系统</title>
    <meta name="author" content="DeathGhost" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <!--[if lt IE 9]>
    <script src="{% static 'admin/js/html5.js' %}"></script>
    <![endif]-->
    <script src="js/jquery.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script>
        (function($){
            $(window).load(function(){
                $("a[rel='load-content']").click(function(e){
                    e.preventDefault();
                    var url=$(this).attr("href");
                    $.get(url,function(data){
                        $(".content .mCSB_container").append(data); //load new content inside .mCSB_container
                        //scroll-to appended content
                        $(".content").mCustomScrollbar("scrollTo","h2:last");
                    });
                });
                $(".content").delegate("a[href='top']","click",function(e){
                    e.preventDefault();
                    $(".content").mCustomScrollbar("scrollTo",$(this).attr("href"));
                });
            });
        })(jQuery);
    </script>
</head>
<body>
<!--header-->
<header>
    <h1><img src="images/admin_logo.png"/></h1>
    <ul class="rt_nav">
        <li><a href="admin_index.php" class="website_icon">站点首页</a></li>
        <li><a href="admin_logout.php" class="quit_icon">安全退出</a></li>
    </ul>
</header>
<!--aside nav-->
<!--aside nav-->
<aside class="lt_aside_nav content mCustomScrollbar">
    <h2>
        <?php
        session_start();
        echo'超级管理员：'.$_SESSION['staff_name'];
        ?>
    </h2>
    <ul>
        <li>
            <dl>
                <!--当前链接则添加class:active-->
                <dt>商品管理</dt>
                <dd><a href="addproduct.php">书目添加</a></dd>
                <dd><a href="product_list.php">书目列表/修改/补货</a></dd>
            </dl>
        </li>
        <li>
            <dl>
                <dt>订单管理</dt>
                <dd><a href="order_list.php" class="active1">订单列表</a></dd>
                <dd><a href="#">订单详情</a></dd>
            </dl>
        </li>

        <li>
            <p class="btm_infor">© 奇文书坊出品</p>
        </li>
    </ul>
</aside>

<section class="rt_wrap content mCustomScrollbar">
    <div class="rt_content">
        <div class="page_title">
            <h2 class="fl">订单列表</h2>
        </div>
        <section class="mtb">

            <input type="text" class="textbox textbox_225" placeholder="输入订单号..."/>
            <input type="button" value="查询" class="group_btn"/>
        </section>
        <table class="table">
            <tr>
                <th>订单号</th>
                <th>用户ID</th>
                <th>负责员工ID</th>
                <th>下单时间</th>
                <th>查看详情</th>
            </tr>

            <tr>

            <?php
                include "db.php";
                $sql="SELECT*from order_info";
                $result = $conn->query($sql);
                $row=mysqli_fetch_array($result);
                $row_num=mysqli_num_rows($result);
                for($i=0;$i<$row_num;$i++){

                ?>

                <td class="center"><?php echo $row["order_id"] ?></td>
                <td class="center"><?php echo $row["user_id"]?></td>
                <td class="center"><?php echo $row["staff_id"]?></td>
                <td class="center"><?php echo $row["order_time"]?></td>
                <td class="center"><a href="orderdetail.php?id=<?php echo $row["order_id"]?>">查看详情</a></td>

            </tr>
            <?php
            }
            ?>


        </table>
        <aside class="paging">
            {% if page.has_previous  %}
            <a href="{% url 'Admin:product_list' %}?page_num={{ page.previous_page_number }}">上一页</a>
            {% else %}
            <a href="#">上一页</a>
            {% endif %}

            {% if page.has_next  %}
            <a href="{% url 'Admin:product_list' %}?page_num={{ page.next_page_number }}">下一页</a>
            {% else %}
            <a href="#">下一页</a>
            {% endif %}
        </aside>
    </div>
</section>
<script src="js/product_list.js" type="text/javascript"></script>
</body>
</html>