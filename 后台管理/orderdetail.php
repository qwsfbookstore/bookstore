<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <title>订单列表</title>
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
        <li><a href="admin_index.php" class="website_icon">站点首页</a></li>
        <li><a href="admin_logout.php" class="quit_icon">安全退出</a></li>
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
        <?php
        if($_SESSION['staff_position']=='经理') {
            ?>
            <li>
                <dl>
                    <dt>员工管理</dt>
                    <dd><a href="addstaff.php">员工添加</a></dd>
                    <dd><a href="staff_list.php">员工列表</a></dd>
                </dl>
            </li>
            <?php
        }
        ?>
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
<section class="rt_wrap content mCustomScrollbar">
    <div class="rt_content">
        <div class="page_title">
            <h2 class="fl">订单详情&nbsp;&nbsp;<?php include("db.php");$order_id=$_GET['id'];echo $order_id; ?></h2>
        </div>
 
        </form>
        <table class="table">
            <tr>
                            <th>图书ISBN</th>
                            <th>书名</th>
                            <th>图书封面</th>
                            <th>售价</th>
                            <th>数量</th>
                        </tr>

            <?php
						
                        $row_book=sql('order_details', '*', "order_id = '$order_id'");
                        $book_id=$row_book['book_id'];
                        $sql="select book_id,book_name,book_picture,book_sale_price from book_info where book_id='$book_id'";
                        $r=mysqli_query($conn,$sql);
                        while ($row=mysqli_fetch_array($r)) {
                            ?>
                            <tr>
                                <td><?php echo $row["book_id"] ?></td>
                                <td><?php echo $row["book_name"]?></td>
                                <td><img src=<?php echo $row["book_picture"]?> width=100px></td>
                                <td><?php echo $row["book_sale_price"]?></td>
                                <td><?php echo $row_book["book_num"]?></td>
                            </tr>
                            <?php
                        }
                        ?>
        </table>
        </aside>
    </div>
</section>


</body>
</html>


