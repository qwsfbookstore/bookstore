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
            </div>
        </div>
    </div>
</div>
<div class="search_bar clearfix">
    <a href="index.php" class="logo fl"><img src="images/logo1.png" width="160" height="99"></a>
    <div class="search_con fl">
        <input type="text" class="input_text fl" name="" placeholder="搜索商品">
        <input type="button" class="input_btn fr" name="" value="搜索">
    </div>
    <div class="guest_cart fr">
        <a href="ShowCart.php" class="cart_name fl">我的购物车</a>
        <div class="goods_count fl" id="show_count">0</div>
    </div>
</div>


<div class="navbar_con">
    <div class="navbar">
        <h1 class="fl">全部商品分类</h1>

    </div>
</div>

<div class="center_con clearfix">
    <ul class="subnav fl">
        <li><a href="#" >学习书刊</a></li>
        <li><a href="#" >小说书刊</a></li>
        <li><a href="#" >时尚杂志</a></li>
        <li><a href="#" >儿童书刊</a></li>
        <li><a href="#" >明星传记</a></li>
        <li><a href="#" >励志书刊</a></li>
    </ul>
    <div class="container">
        <div class="wrap"  style="left:-802px;">
            <img src="images/5.webp">
            <img src="images/1.webp">
            <img src="images/2.webp">
            <img src="images/3.webp">
            <img src="images/4.webp">
            <img src="images/5.webp">
            <img src="images/1.webp">
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
    <div class="right_body">
        <img src="images/6.jpg">
        <img id="top_img" src="images/7.jpg">

    </div>

    <div class="list_model">
        <div class="list_title clearfix">
            <h3 class="fl" id="model01">学习书刊</h3>
            <div class="subtitle fl">
                <span>|</span>
            </div>
            <a href="#" class="goods_more fr" >查看更多 ></a>
        </div>

        <div class="goods_con clearfix">

            <ul  class="goods_list fl">
                <span></span>
                {% for book1 in book1s%}
                <li>

                    <h4><a href="{% url 'bShop:detail' %}?pid={{ book1.pid }}">{{ book1.pdname}}</a></h4>
                    {% with imgl=book1.pdImage %}
                    <a href="{% url 'bShop:detail' %}?pid={{ book1.pid }}"><img src="{{ imgl }}"></a>
                    {% endwith %}
                    <div class="prize">¥ {{ book1.pdprice }}</div>
                </li>
                {% endfor %}
            </ul>
        </div>

    </div>

    <div class="list_model">
        <div class="list_title clearfix">
            <h3 class="fl" id="model01">小说书刊</h3>
            <div class="subtitle fl">
                <span>|</span>
            </div>
            <a href="#" class="goods_more fr" id="fruit_more">查看更多 ></a>
        </div>


        <div class="goods_con clearfix">

            <ul  class="goods_list fl">
                <span></span>
                {% for book2 in book2s%}
                <li>
                    <h4><a href="{% url 'bShop:detail' %}?pid={{ book2.pid }}">{{ book2.pdname}}</a></h4>
                    {% with imgl2=book2.pdImage %}
                    <a href="{% url 'bShop:detail' %}?pid={{ book2.pid }}"><img src="{{ imgl2 }}"></a>
                    {% endwith %}
                    <div class="prize">¥ {{ book2.pdprice }}</div>
                </li>
                {% endfor %}
            </ul>
        </div>

    </div>
    <div class="list_model">
        <div class="list_title clearfix">
            <h3 class="fl" id="model01">时尚杂志</h3>
            <div class="subtitle fl">
                <span>|</span>
            </div>
            <a href="#" class="goods_more fr" id="fruit_more">查看更多 ></a>
        </div>


        <div class="goods_con clearfix">

            <ul  class="goods_list fl">
                <span></span>
                {% for book3 in book3s%}
                <li>
                    <h4><a href="{% url 'bShop:detail' %}?pid={{ book3.pid }}">{{ book3.pdname}}</a></h4>
                    {% with imgl3=book3.pdImage %}
                    <a href="{% url 'bShop:detail' %}?pid={{ book3.pid }}"><img src="{{ imgl3 }}"></a>
                    {% endwith %}
                    <div class="prize">¥ {{ book3.pdprice }}</div>
                </li>
                {% endfor %}
            </ul>
        </div>

    </div>
    <div class="list_model">
        <div class="list_title clearfix">
            <h3 class="fl" id="model01">儿童书刊</h3>
            <div class="subtitle fl">
                <span>|</span>
            </div>
            <a href="#" class="goods_more fr" id="fruit_more">查看更多 ></a>
        </div>


        <div class="goods_con clearfix">

            <ul  class="goods_list fl">
                <span></span>
                {% for book4 in book4s%}
                <li>
                    <h4><a href="{% url 'bShop:detail' %}?pid={{ book4.pid }}">{{ book4.pdname}}</a></h4>
                    {% with imgl4=book4.pdImage %}
                    <a href="{% url 'bShop:detail' %}?pid={{ book4.pid }}"><img src="{{ imgl4 }}"></a>
                    {% endwith %}
                    <div class="prize">¥ {{ book4.pdprice }}</div>
                </li>
                {% endfor %}
            </ul>
        </div>

    </div>
    <div class="list_model">
        <div class="list_title clearfix">
            <h3 class="fl" id="model01">明星传记</h3>
            <div class="subtitle fl">
                <span>|</span>
            </div>
            <a href="#" class="goods_more fr" id="fruit_more">查看更多 ></a>
        </div>


        <div class="goods_con clearfix">

            <ul  class="goods_list fl">
                <span></span>
                {% for book5 in book5s%}
                <li>
                    <h4><a href="{% url 'bShop:detail' %}?pid={{ book5.pid }}">{{ book5.pdname}}</a></h4>
                    {% with imgl5=book5.pdImage %}
                    <a href="{% url 'bShop:detail' %}?pid={{ book5.pid }}"><img src="{{ imgl5 }}"></a>
                    {% endwith %}
                    <div class="prize">¥ {{ book5.pdprice }}</div>
                </li>
                {% endfor %}
            </ul>
        </div>

    </div>
    <div class="list_model">
        <div class="list_title clearfix">
            <h3 class="fl" id="model01">励志书刊</h3>
            <div class="subtitle fl">
                <span>|</span>
            </div>
            <a href="#" class="goods_more fr" id="fruit_more">查看更多 ></a>
        </div>


        <div class="goods_con clearfix">

            <ul  class="goods_list fl">
                <span></span>
                {% for book6 in book6s%}
                <li>
                    <h4><a href="{% url 'bShop:detail' %}?pid={{ book6.pid }}">{{ book6.pdname}}</a></h4>
                    {% with imgl6=book6.pdImage %}
                    <a href="{% url 'bShop:detail' %}?pid={{ book6.pid }}"><img src="{{ imgl6 }}"></a>
                    {% endwith %}
                    <div class="prize">¥ {{ book6.pdprice }}</div>
                </li>
                {% endfor %}
            </ul>
        </div>

    </div>


    <script type="text/javascript" src="js/editpwd.js"></script>

</body>
</html>
