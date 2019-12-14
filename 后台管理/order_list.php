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
        $staffid = $_SESSION['staff_id'];
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
                <dd><a href="monthly_profit.html" >订单可视化</a></dd>
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
            <h2 class="fl">订单列表</h2>
        </div>
        <form action="order_list.php" method="post" accept-charset="utf-8">
        <section class="mtb">
            <input type="text" name="search_word" class="textbox textbox_225" placeholder="输入订单号..."/>
            <input type="submit" value="查询" class="group_btn"/>
        </section>
        </form>
        <table class="table">
            <tr>
                <th>订单ID</th>
                <th>用户ID</th>
                <th>员工ID</th>
                <th>订单时间</th>
                <th>订单状态</th>
                <th>查看详情</th>
                <th>操作</th>
          
            </tr>

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
            if ($_SESSION['staff_position']=='经理') {
                $sql = "SELECT * from order_info ORDER BY order_time DESC";
            }else{
                $sql = "SELECT * from order_info where staff_id='$staffid' or staff_id=NULL or staff_id = '' ORDER BY order_time DESC";
            }
            $word = "search_word";
            if (isset($_POST[$word])){
                $word = $_POST["search_word"];
            }else{
                $word = "";
            }
            if ($word!=""){
                $sql = $sql." WHERE order_id='".$word."'";
            }
            $r=mysqli_query($conn,$sql);



            while ($row=mysqli_fetch_array($r)) {
                ?>
               <tr>
                <td class="center"><?php echo $row["order_id"] ?></td>
                <td class="center"><?php echo $row["user_id"]?></td>
                <td class="center"><?php echo $row["staff_id"]?></td>
                <td class="center"><?php echo $row["order_time"]?></td>
                <td class="center"><?php echo $row["order_status"]?></td>
                <td class="center"><a href="orderdetail.php?id=<?php echo $row["order_id"]?>">查看详情</a></td>
                   <?php
                   if ($row["staff_id"]) {
                       if ($row["staff_id"] != $_SESSION['staff_id']) {
                       ?>
                       <td class="center">不可操作</td>
                       <?php
                   }else if($row["order_status"]=="未发货"){
                           ?>
                           <td class = "center"><a href="deliver.php?id=<?php echo $row["order_id"]?>">发货</a></td>
                           <?php
                       }else{
                           ?>
                           <td class="center">不可操作</td>
                           <?php
                       }
                   }else{
                       session_start();
                       $_SESSION['order_id']=$row["order_id"];
                       ?>
                       <td class = "center"><a href="order_operation.php">接单</a></td>
                       <?php
                   }
                   ?>

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


