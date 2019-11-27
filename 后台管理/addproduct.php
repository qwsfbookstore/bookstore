<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <title>奇文书坊后台管理系统</title>
    <meta name="author" content="DeathGhost" />
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!--[if lt IE 9]>
    <![endif]-->

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

    <link rel="stylesheet" type="text/css" href="css/style.css">

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
                <dd><a href="addproduct.php" class="active1">书目添加</a></dd>
                <dd><a href="product_list.html">书目列表/修改/补货</a></dd>
            </dl>
        </li>
        <li>
            <dl>
                <dt>订单管理</dt>
                <dd><a href="#">订单列表</a></dd>
                <dd><a href="#">订单详情</a></dd>
            </dl>
        </li>

        <li>
            <p class="btm_infor">© 奇文书坊出品</p>
        </li>
    </ul>
</aside>
<section class="rt_wrap content mCustomScrollbar">
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h1>商品管理</h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <strong>添加书目</strong>
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
                                <form action="add_product.php" method="post" id="addproduct_form" class="form-horizontal">

                                    <div class="form-group">
                                        <text class="col-sm-2 control-label">书名</text>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="bookname" required="" value="" id="bookname" placeholder="请输入书名">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <text class="col-sm-2 control-label">书目id</text>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="bookid" required="" id="bookid" value="" placeholder="请输入书目id">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <text class="col-sm-2 control-label">书目作者</text>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="authorname" required="" id="authorname" placeholder="请输入作者名">
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <text class="col-sm-2 control-label">作者id</text>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="authorid" required="" id="authorid" placeholder="请输入作者id">
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <text class="col-sm-2 control-label">出版商</text>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="publisher" id="publisher">
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <text class="col-sm-2 control-label">书目种类</text>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="booktype" id="booktype">
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">中文简介</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="CH_intro" id="CH_intro">
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">英文简介</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="ENG_intro" id="ENG_intro">
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">进价</label>
                                        <div class="col-sm-10">
                                            <input type="number" step="any" class="form-control" name="price1" id="price1" required="" placeholder="请输入书目进价">
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">售价</label>
                                        <div class="col-sm-10">
                                            <input type="number" step="any" class="form-control" name="price2" id="price2" required="" placeholder="请输入书目售价">
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">评分</label>
                                        <div class="col-sm-10">
                                            <input type="number" step="any" class="form-control" name="bookscore" id="bookscore">
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">进货量</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="stocknumber" id="stocknumber" required="" placeholder="请输入进货量">
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">书店id</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="storeid" id="storeid" required="" placeholder="请输入书店id">
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">书目图链接</label>
                                        <div class="col-sm-8">
                                            <input type="file" class="form-control" name="imglink" id="imglink">
                                        </div>
                                        <button class="btn btn-primary new-imgurl" type="button">
                                            添加
                                        </button>
                                        <button class="btn btn-primary new-ishow" type="button">
                                            <a href="">图库</a>
                                        </button>


                                        <div class="image-list-wrp">

                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>

                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-primary new-pro" type="submit" id="addbook_button" >新增书目</button>
                                        </div>
                                    </div>
                                    <script type="text/javascript" src="js/addproduct.js"></script>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


</body>
</html>


