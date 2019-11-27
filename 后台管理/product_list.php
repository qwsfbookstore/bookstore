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
        <li><a href="admin_index.html" target="_blank" class="website_icon">站点首页</a></li>
        <li><a href="" class="quit_icon">安全退出</a></li>
    </ul>
</header>
<!--aside nav-->
<!--aside nav-->
<aside class="lt_aside_nav content mCustomScrollbar">
    <h2><a href="#">超级管理员：&nbsp;{{ userinfo.username }}</a></h2>
    <ul>

        <li>
            <dl>
                <!--当前链接则添加class:active-->
                <dt>商品管理</dt>
                <dd><a href="addproduct.php">书目添加</a></dd>
                <dd><a href="product_list.html" class="active1">书目列表/修改/补货</a></dd>
            </dl>
        </li>
        <li>
            <dl>
                <dt>订单管理</dt>
                <dd><a href="#" >订单列表</a></dd>
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
            <h2 class="fl">书目列表</h2>
            <a href="addproduct.php" class="fr top_rt_btn add_icon">添加书目</a>
        </div>
        <section class="mtb">
            <select class="select">
                <option>书目分类</option>

            </select>
            <input type="text" class="textbox textbox_225" placeholder="输入产品关键词或产品货号..."/>
            <input type="button" value="查询" class="group_btn"/>
        </section>
        <table class="table">
            <tr>
                <th>书目图片</th>
                <th>书目名称</th>
                <th>书目ID</th>
                <th>书目种类</th>
                <th>书目作者</th>
                <th>出版社</th>
                <th>中文简介</th>
                <th>英文简介</th>
                <th>书目评分</th>
                <th>进价</th>
                <th>售价</th>
                <th>库存</th>
                <th>操作</th>
            </tr>

            <?php
            include "db.php";
            $sql="SELECT*from book_info";
            $r=mysqli_query($conn,$sql);
            for($x=0; $x<=3; $x++){
                $row=mysqli_fetch_array($r);

                ?>

                {% for product in products %}
                <tr>
                    <td class="center"><a href="detail.php?id=id=<?php echo $row["book_id"]?>"><?php echo $row["book_picture"] ?></a></td>
                    <td class="center"><?php echo $row["book_name"] ?></td>
                    <td class="center">{{ book.id }}<?php echo $row["book_id"] ?></td>
                    <td class="center">{{ book.type }}<?php echo $row["book_type"] ?></td>
                    <td class="center">{{ book.author }}</td>
                    <td class="center">{{ book.publisher }}<?php echo $row["book_publisher"] ?></td>
                    <td class="center">{{ book.chintro }}<?php echo $row["CH_intro"] ?></td>
                    <td class="center">{{ book.engintro }}<?php echo $row["ENG_intro"] ?></td>
                    <td class="center">{{ book.bookscore }}<?php echo $row["book_grade"] ?></td>
                    <td class="center"><strong class="rmb_icon">{{ book.price1 }}<?php echo $row["book_purchase_price"] ?></strong></td>
                    <td class="center"><strong class="rmb_icon">{{ book.price2 }}<?php echo $row["book_sale_price"] ?></strong></td>
                    <td class="center">{{ book.stocknumber }}</td>
                    <td class="center">
                        <a href="{% url 'Admin:modproduct' %}?p_id={{ product.pid }}" title="修改书目信息/补货" class="link_icon">&#101;</a>
                        <a href="{% url 'Admin:prodelete' %}?p_id={{ product.pid }}" title="删除书籍" class="link_icon">&#100;</a>
                    </td>
                </tr>
                <?php
            }
            ?>
            {% empty %}
            {% endfor %}
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