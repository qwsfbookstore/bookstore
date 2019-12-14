<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <title>添加员工</title>
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
                <dd><a href="monthly_profit.html" >订单可视化</a></dd>
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
<section class="rt_wrap content mCustomScrollbar">
    <div class="rt_content">
        <div class="page_title">
            <h2 class="fl">员工列表</h2>
        </div>
        <form action="staff_list.php" method="post" accept-charset="utf-8">
        <section class="mtb">
            <input type="text" name="search_word" class="textbox textbox_225" placeholder="输入员工号/姓名..."/>
            <input type="submit" value="查询" class="group_btn"/>
        </section>
        </form>
        <table class="table">
            <tr>
                <th>员工ID</th>
                <th>员工姓名</th>
                <th>员工性别</th>
                <th>员工年龄</th>
                <th>员工电话</th>
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
            $sql="SELECT * from staff_info";
            $word = "search_word";
            if (isset($_POST[$word])){
                $word = $_POST["search_word"];
            }else{
                $word = "";
            }
            if ($word!=""){
                $sql = $sql." WHERE staff_id='".$word."' OR staff_name LIKE '%".$word."%'";
            }
            $r=mysqli_query($conn,$sql);
            while ($row=mysqli_fetch_array($r)) {
                ?>
                <tr>
                    <td><?php echo $row["staff_id"] ?></td>
                    <td><?php echo $row["staff_name"]?></td>
                    <td><?php echo $row["staff_sex"]?></td>
                    <td><?php echo $row["staff_age"]?></td>
                    <td><?php echo $row["staff_tel"]?></td>
                    <td class="center">
                        <a href="modstaff.php?id=<?=$row['staff_id']?>" title="修改员工信息" class="link_icon">&#101;</a>
                        <a href="staff_operate.php?action=delete&id=<?=$row['staff_id']?>"title="删除员工" class="link_icon">&#100;</a>
                    </td>
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


