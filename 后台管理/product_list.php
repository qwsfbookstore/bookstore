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
                <dt>图书管理</dt>
                <dd><a href="addproduct.php">书目添加</a></dd>
                <dd><a href="product_list.php">书目列表</a></dd>
            </dl>
        </li>
        <li>
            <dl>
                <dt>订单管理</dt>
                <dd><a href="order_list.php" >订单列表</a></dd>
            </dl>
        </li>
		<li>
            <dl>
                <dt>员工管理</dt>
				<dd><a href="addstaff.php">员工添加</a></dd>
                <dd><a href="staff_list.php" >员工列表</a></dd>
            </dl>
        </li>
		<li>
            <dl>
                <dt>留言管理</dt>
                <dd><a href="admin_guestbook.php" >留言列表</a></dd>
            </dl>
        </li>

        <li>
            <p class="btm_infor">© 奇文书坊出品</p>
        </li>
    </ul>
</aside>

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
?>

<section class="rt_wrap content mCustomScrollbar">
    <div class="rt_content">
        <div class="page_title">
            <h2 class="fl">书目列表</h2>
            <a href="addproduct.php" class="fr top_rt_btn add_icon">添加书目</a>
        </div>
        <form action="product_list.php" method="post" accept-charset="utf-8" name="form1">
        <section class="mtb">
            <select class="select" name="query">
                <option value="name" selected="true">图书名称</option>}
                <option value="author">图书作者</option>
                <option value="type">书目分类</option>
                <option value="id">ISBN</option>}
                <option value="publisher">出版社</option>
            </select>
            <input type="text" class="textbox textbox_225" name="search_word"/>
            <input type="submit" value="查询" class="group_btn"/>
        </section>
        </form>
        <table class="table">
            <tr>
                <th>书目图片</th>
                <th>书目名称</th>
                <th>书目ID</th>
                <th>书目种类</th>
                <th>书目作者</th>
                <th>出版社</th>
                <th>书目评分</th>
                <th>进价</th>
                <th>售价</th>
                <th>库存</th>
                <th>操作</th>
            </tr>
<?php 
$query = "query";
$search_word = "search_word";
if (isset($_POST[$query])){
    $query = $_POST["query"];
}else{
    $query = "";
}
if (isset($_POST[$search_word])){
    $search_word = $_POST["search_word"];
}else{
    $search_word = "";
}
$sql = "SELECT book_picture, book_name, book_info.book_id, book_type, author_name, author_info.author_id, book_publisher, CH_intro, ENG_intro, book_grade, book_purchase_price, book_sale_price, stock_num FROM (((book_info JOIN author_book_relationship ON book_info.book_id=author_book_relationship.book_id) JOIN author_info ON author_book_relationship.author_id=author_info.author_id) JOIN (SELECT book_id, sum(stock_number) AS stock_num FROM book_stock GROUP BY book_id) AS stock ON book_info.book_id=stock.book_id)";
if ($search_word!=""){
    if ($query=="name"){
        $sql = $sql." WHERE book_name LIKE '%".$search_word."%'";
    }elseif ($query=="author"){
        $sql = $sql." WHERE author_name='".$search_word."'";
    }elseif ($query=="type"){
        $sql = $sql." WHERE book_type='".$search_word."'";
    }elseif ($query=="id"){
        $sql = $sql." WHERE book_id='".$search_word."'";
    }elseif ($query=="publisher"){
        $sql = $sql." WHERE book_publisher LIKE '%".$search_word."%'";
    }elseif ($query==""){
        $sql = $sql;
    }
}else{
    $sql = $sql;
}

$result = $conn->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        ?>
        <tr>
                <td class="center"><img id="img" src=<?php echo $row["book_picture"]?> width=50 height=50/></td>
                <td class="center"><?php echo $row["book_name"]?></td>
                <td class="center"><?php echo $row["book_id"]?></td>
                <td class="center"><?php echo $row["book_type"]?></td>
                <td class="center"><?php echo $row["author_name"]?></td>
                <td class="center"><?php echo $row["book_publisher"]?></td>
                <td class="center"><?php echo $row["book_grade"]?></td>
                <td class="center"><strong class="rmb_icon"><?php echo $row["book_purchase_price"]?></strong></td>
                <td class="center"><strong class="rmb_icon"><?php echo $row["book_sale_price"]?></strong></td>
                <td class="center"><?php echo $row["stock_num"]?></td>
                <td class="center">
                    <a href="modproduct.php?book_id=<?php echo $row["book_id"]?>&author_id=<?php echo $row["author_id"]?>" title="修改书目信息/补货" class="link_icon">&#101;</a>
                    <a href="product_operate.php?action=delete&?book_id=<?php echo $row["book_id"]?>&author_id=<?php echo $row["author_id"]?>" title="删除书籍" class="link_icon">&#100;</a>
                </td>
            </tr>
            <?php
        }
    }
$conn->close();
?>
        </table>
    </div>
</section>
<script src="js/product_list.js" type="text/javascript"></script>
</body>
</html>
