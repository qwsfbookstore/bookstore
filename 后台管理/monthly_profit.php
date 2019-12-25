<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <title>奇文书坊-月利润</title>
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
                <dd><a href="order_list.php" >订单可视化</a></dd>
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
                <dt>消息管理</dt>
                <dd><a href="admin_guestbook.php" >留言列表</a></dd>
                <dd>
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

                    $staff_store=$_SESSION["staff_store"];
                    if($_SESSION['staff_position']=='普通员工') {
                        $check_sql = "SELECT * FROM book_stock WHERE store_id='$staff_store' AND stock_number<10";
                    }
                    $num_result = $conn->query($check_sql);
                    ?>
                    <a href="message.php" >库存消息&nbsp;&nbsp;<?php echo $num_result->num_rows ?></a>
                </dd>
            </dl>
        </li>

        <li>
            <p class="btm_infor">© 奇文书坊出品</p>
        </li>
    </ul>
</aside>



<section class="rt_wrap content mCustomScrollbar">
    <div class="page_title">
        <h2 class="fl">奇文书坊-月利润</h2>
    </div>

    <div style="height: 80%">
        <div id="container" style="height: 100%"></div>
        <script src="https://cdn.bootcss.com/jquery/3.0.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/echarts-gl/dist/echarts-gl.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/echarts-stat/dist/ecStat.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/echarts/dist/extension/dataTool.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/echarts/map/js/china.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/echarts/map/js/world.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/echarts/dist/extension/bmap.min.js"></script>
        <script type="text/javascript">


            var arr1=[],arr2=[];
            function arrTest(){
                $.ajax({
                    type:"post",
                    async:false,
                    url:"profit_js.php",
                    data:{},
                    dataType:"json",
                    success:function(result){
                        if (result) {
                            for (var i = 0; i < result.length; i++) {
                                arr1.push(result[i].monthly);
                                arr2.push(result[i].total_sales);
                            }
                        }
                    },
                    error: function(errmsg) {
                        alert("Ajax获取服务器数据出错了！"+ errmsg);
                    }
                })
                return arr1,arr2;
            }
            arrTest();

            var dom = document.getElementById("container");
            var myChart = echarts.init(dom);
            var app = {};

            option = null;
            option = {
                tooltip: {
                    trigger: 'axis',
                    position: function (pt) {
                        return [pt[0], '10%'];
                    }
                },
                title: {
                    left: 'center',
                    text: '奇文书坊-月利润',
                },
                toolbox: {
                    feature: {
                        dataZoom: {
                            yAxisIndex: 'none'
                        },
                        restore: {},
                        saveAsImage: {}
                    }
                },
                xAxis: {
                    type: 'category',
                    boundaryGap: false,
                    data: arr1
                },
                yAxis: {
                    type: 'value',
                    boundaryGap: [0, '100%']
                },
                dataZoom: [{
                    type: 'inside',
                    start: 0,
                    end: 10
                }, {
                    start: 0,
                    end: 10,
                    handleIcon: 'M10.7,11.9v-1.3H9.3v1.3c-4.9,0.3-8.8,4.4-8.8,9.4c0,5,3.9,9.1,8.8,9.4v1.3h1.3v-1.3c4.9-0.3,8.8-4.4,8.8-9.4C19.5,16.3,15.6,12.2,10.7,11.9z M13.3,24.4H6.7V23h6.6V24.4z M13.3,19.6H6.7v-1.4h6.6V19.6z',
                    handleSize: '80%',
                    handleStyle: {
                        color: '#fff',
                        shadowBlur: 3,
                        shadowColor: 'rgba(0, 0, 0, 0.6)',
                        shadowOffsetX: 2,
                        shadowOffsetY: 2
                    }
                }],
                series: [
                    {
                        name:'月利润',
                        type:'line',
                        smooth:true,
                        symbol: 'none',
                        sampling: 'average',
                        itemStyle: {
                            color: 'rgb(255, 70, 131)'
                        },
                        areaStyle: {
                            color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
                                offset: 0,
                                color: 'rgb(255, 158, 68)'
                            }, {
                                offset: 1,
                                color: 'rgb(255, 70, 131)'
                            }])
                        },
                        data: arr2
                    }
                ]
            };
            ;
            if (option && typeof option === "object") {
                myChart.setOption(option, true);
            }
        </script>
    </div>


</section>


</body>
</html>