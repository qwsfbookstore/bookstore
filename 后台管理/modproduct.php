<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <title>奇文书坊后台管理系统</title>
    <meta name="author" content="DeathGhost" />
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!--[if lt IE 9]>
    <script src="js/html5.js"></script>
    <![endif]-->
    <script type="text/javascript" src="js/ie6.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- Toastr style -->
    <link rel="stylesheet" type="text/css" href="css/plugins/toastr/toastr.min.css">
    <!-- Gritter -->
    <link rel="stylesheet" type="text/css" href="css/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="js/plugins/gritter/jquery.gritter.css">
    <link rel="stylesheet" type="text/css" href="css/plugins/sweetalert/sweetalert.css">

    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/newstyle2.css">

    <link rel="stylesheet" type="text/css" href="css/plugins/summernote/summernote.css">
    <link rel="stylesheet" type="text/css" href="css/plugins/summernote/summernote-bs3.css">

</head>

<body>
<header>
    <h1><img src="images/admin_logo.png"/></h1>
    <ul class="rt_nav">
        <li><a href="admin_index.html" target="_blank" class="website_icon">站点首页</a></li>
        <li><a href="" class="quit_icon">安全退出</a></li>
    </ul>
</header>
<aside class="lt_aside_nav content mCustomScrollbar">
    <h2><a href="#">超级管理员：&nbsp;{{ userinfo.username }}</a></h2>
    <ul>

        <li>
            <dl>
                <!--当前链接则添加class:active-->
                <dt>商品管理</dt>
                <dd><a href="addproduct.php">书目添加</a></dd>
                <dd><a href="product_list.php" class="active1">书目列表/修改/补货</a></dd>
            </dl>
        </li>
        <li>
            <dl>
                <dt>订单管理</dt>
                <dd><a href="order_list.php">订单列表</a></dd>
                <dd><a href="monthly_profit.html" >订单可视化</a></dd>
                <dd><a href="#">订单详情</a></dd>
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

$book_id = $_GET["book_id"];

$sql = "SELECT book_picture, book_name, book_info.book_id, book_type, names, book_publisher, CH_intro, ENG_intro, book_grade, book_purchase_price, book_sale_price, stock_num FROM ((book_info JOIN authors_name ON book_info.book_id = authors_name.book_id) JOIN (SELECT book_id, sum(stock_number) AS stock_num FROM book_stock GROUP BY book_id) AS stock ON book_info.book_id=stock.book_id) WHERE book_info.book_id='".$book_id."'";
$result = $conn->query($sql);
?>

<section class="rt_wrap content mCustomScrollbar">
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>商品管理</h2>
                    <ol class="breadcrumb">
                        <li class="active">
                            <strong>更改书目信息</strong>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
<?php
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        ?>
                                <form action="product_operate.php?action=update&book_id=<?php echo $row["book_id"]?>" method="post" class="form-horizontal" id="ishow-form">
                                    <input type="hidden" name="csrfmiddlewaretoken" value="{{ csrf_token }}">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">书名</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="bookname" required="" value=<?php echo $row["book_name"];?>>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">书目id</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="bookid" required="" value=<?php echo $row["book_id"];?>>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">书目作者</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="authorname" required="" value=<?php echo $row["names"];?>>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">出版商</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="publisher" required="" value=<?php echo $row["book_publisher"];?>>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">书目种类</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="booktype" value=<?php echo $row["book_type"];?>>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">中文简介</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="CH_intro" value='<?php echo $row["CH_intro"];?>'>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">英文简介</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="ENG_intro" value='<?php echo $row["ENG_intro"];?>'>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">进价</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="price1" value=<?php echo $row["book_purchase_price"];?>>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">售价</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="price2" value=<?php echo $row["book_sale_price"];?>>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">评分</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="bookscore"
                                            value=<?php echo $row["book_grade"];?>>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">书目图链接</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="imglink" value=<?php echo $row["book_picture"];?>>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <input class="btn btn-primary" type="submit" value="更新">
                                        </div>
                                    </div>
<?php
    }
}
?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- Mainly scripts -->

<script src="js/jquery-2.1.1.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="js/jquery.metisMenu.js" type="text/javascript"></script>
<script src="js/jquery.slimscroll.min.js" type="text/javascript"></script>


<!-- Flot -->
<script src="js/plugins/flot/jquery.flot.js" type="text/javascript"></script>
<script src="js/plugins/flot/jquery.flot.tooltip.min.js" type="text/javascript"></script>
<script src="js/plugins/flot/jquery.flot.spline.js" type="text/javascript"></script>
<script src="js/plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>
<script src="js/plugins/flot/jquery.flot.pie.js" type="text/javascript"></script>

<!-- Peity -->
<script src="js/plugins/peity/jquery.peity.min.js" type="text/javascript"></script>
<script src="js/demo/peity-demo.js" type="text/javascript"></script>


<!-- Custom and plugin javascript -->
<script src="js/inspinia.js" type="text/javascript"></script>
<script src="js/pace.min.js" type="text/javascript"></script>

<!-- jQuery UI -->
<script src="js/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>

<!-- GITTER -->
<script src="js/plugins/gritter/jquery.gritter.min.js" type="text/javascript"></script>

<!-- Sparkline -->
<script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>


<!-- Sparkline demo data  -->
<script src="js/demo/sparkline-demo.js" type="text/javascript"></script>


<!-- ChartJS-->
<script src="js/plugins/chartJs/Chart.min.js" type="text/javascript"></script>

<!-- Toastr -->
<script src="js/plugins/toastr/toastr.min.js" type="text/javascript"></script>

<!-- FooTable -->

<script src="js/plugins/footable/footable.all.min.js" type="text/javascript"></script>
<script src="js/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>


<script src="js/modproduct.js" type="text/javascript"></script>



</body>
</html>


