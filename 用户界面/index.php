<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>奇文书坊-首页</title>

    <link rel="stylesheet" type="text/css" href="css/demo.css">
    <link rel="stylesheet" type="text/css" href="css/nava.css">
    <link rel="stylesheet" type="text/css" href="css/floor.css">
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
                include "db.php";
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
				<span>|</span>
                <a href="guestbook.php">读书社区</a>
            </div>
        </div>
    </div>
</div>
<div class="search_bar clearfix">
    <a href="index.php" class="logo fl"><img src="images/logo1.png" width="160" height="99"></a>
	<form action="search_result.php" method="get" autocomplete="off">
    <div class="search_con fl">
        <input type="text" class="input_text fl" name="search_word" placeholder="搜索商品">
        <input type="submit" class="input_btn fr" name="" value="搜索">
		
		
    </div>
	</form>
		<a href="advanced_search.php" style="position: relative; top:45px;">&nbsp;&nbsp;高级检索</a>
    <div class="guest_cart fr">
        <a href="ShowCart.php" class="cart_name fl">我的购物车</a>
        <?php
        if(!empty($_SESSION['user_id'])){
			$user_id=$_SESSION['user_id'];
            $q = "SELECT * from cart_info WHERE user_id='$user_id'";
            $r = mysqli_query($conn,$q);
            $ra=mysqli_num_rows($r);
        }else{
            $ra = 0;
        }
        echo '<div class="goods_count fl" id="show_count">'.$ra.'</div>';
        ?>
    </div>
</div>

<div class="navbar_con">
		<div class="navbar">
			<h1 class="fl">全部商品分类</h1>

		</div>
	</div>
	

 <div class="center_con clearfix">
		<ul class="subnav fl">
			<li><a href="list.php?type=文学" >文学经典</a></li>
			<li><a href="list.php?type=情感" >情感生活</a></li>
            <li><a href="list.php?type=儿童" >儿童书刊</a></li>
			<li><a href="list.php?type=历史" >历史名著</a></li>
			<li><a href="list.php?type=悬疑" >悬疑探案</a></li>
			<li><a href="list.php?type=社会" >社会纪实</a></li>
		</ul>
   <div class="container">
     <div class="wrap"  style="left:-802px;">
                <img src="images/ad.jpg">
                <a href="detail.php?id='9787040406641'"><img src="images/index_ad.jpg"></a>
                <img src="images/ad_staff.jpg">
                <img src="images/ad2.jpg">
                <img src="images/ad3.jpg">
                <img src="images/ad.jpg">
                <a href="detail.php?id='9787040406641'"><img src="images/index_ad.jpg"></a>

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
         <div class="floor">
             <div class="book floor1 F1">
                 <div class="bookHeader">
                     <div class="bookLeft floorNav">
                       
                     <div class="bookRight">
                         <div class="bookRightTop">
                             <span class="topSpan">图书畅销榜</span>
                             <span>高分好书榜</span>
                         </div>
                         <div class="bookRightButtom">
                             <div class="bookRightBtm">
                                 <?php
                                 $sql_sale="SELECT * from book_top order by book_sale_num desc";
                                 $r_sale=mysqli_query($conn,$sql_sale);
                                 $row_sale=mysqli_fetch_array($r_sale);
                                 ?>
                                 <div>
                                     <p class="num">1</p>
                                     <ul>
                                         <li class="ol222"><?php echo $row_sale['book_name'];?></li>
                                         <ol class="ol22">
                                             <li><img src="<?php echo $row_sale['book_picture'];?>"></li>
                                             <li class="li22">
                                                 <a href="detail.php?id=<?php echo $row_sale["book_id"]?>" ><span><?php echo $row_sale['book_name'];?></span></a>
                                                 <a href="detail.php?id=<?php echo $row_sale["book_id"]?>" >
                                                     <p><?php echo mb_substr($row_sale['CH_intro'],0,50);?></p></a>
                                             </li>
                                         </ol>
                                     </ul>
                                 </div>
                                 <?php
                                 for($num=2;$num<=6;$num++)
                                 {$row_sale=mysqli_fetch_array($r_sale)
                                 ?>
                                 <div>
                                     <p class="num"><?php echo $num;?></p>
                                     <ul>
                                         <li><?php echo $row_sale['book_name'];?></li>
                                         <ol>
                                             <li><img src="<?php echo $row_sale['book_picture'];?>"></li>
                                             <li class="li22">
                                                 <a href="detail.php?id=<?php echo $row_sale["book_id"]?>" ><span><?php echo $row_sale['book_name'];?></span></a>
                                                 <a href="detail.php?id=<?php echo $row_sale["book_id"]?>" >
                                                     <p><?php echo mb_substr($row_sale['CH_intro'],0,50);?></p></a>
                                             </li>
                                         </ol>
                                     </ul>
                                 </div>
                                 <?php
                                 }?>

                             </div>
                             <div class="bookRightBtm">
                                 <?php
                                 $sql_grade="SELECT * from book_top order by book_grade desc";
                                 $r_grade=mysqli_query($conn,$sql_grade);
                                 $row_grade=mysqli_fetch_array($r_grade);
                                 ?>
                                 <div>
                                     <p class="num">1</p>
                                     <ul>
                                         <li class="ol222"><?php echo $row_grade['book_name'];?></li>
                                         <ol class="ol22">
                                             <li><img src="<?php echo $row_grade['book_picture'];?>"></li>
                                             <li class="li22">
                                                 <a href="detail.php?id=<?php echo $row_grade["book_id"]?>" ><span><?php echo $row_grade['book_name'];?></span></a>
                                                 <a href="detail.php?id=<?php echo $row_grade["book_id"]?>" >
                                                     <p><?php echo mb_substr($row_grade['CH_intro'],0,50);?></p></a>
                                             </li>
                                         </ol>
                                     </ul>
                                 </div>
                                 <?php
                                 for($num=2;$num<=6;$num++)
                                 {$row_grade=mysqli_fetch_array($r_grade)
                                     ?>
                                     <div>
                                         <p class="num"><?php echo $num;?></p>
                                         <ul>
                                             <li><?php echo $row_grade['book_name'];?></li>
                                             <ol>
                                                 <li><img src="<?php echo $row_grade['book_picture'];?>"></li>
                                                 <li class="li22">
                                                     <a href="detail.php?id=<?php echo $row_grade["book_id"]?>" ><span><?php echo $row_grade['book_name'];?></span></a>
                                                     <a href="detail.php?id=<?php echo $row_grade["book_id"]?>" >
                                                         <p><?php echo mb_substr($row_grade['CH_intro'],0,50);?></p></a>
                                                 </li>
                                             </ol>
                                         </ul>
                                     </div>
                                     <?php
                                 }?>

                             </div>
                         </div>
                     </div>
                 </div>
        
             </div>
     </div>
</div>
</div>
<div class="list_model">
        <div class="list_title clearfix">
            <h3 class="fl" id="model01">文学</h3>
            <div class="subtitle fl">
                <span>|</span>
            </div>
            <a href="list.php?type=文学" class="goods_more fr" id="fruit_more">查看更多 ></a>
  </div>

        <div class="goods_con clearfix">

            <ul  class="goods_list fl">
                <span></span>
                <?php

                $sql1="SELECT*from book_info where book_type='文学'";
                $r1=mysqli_query($conn,$sql1);
                for($x=0; $x<=3; $x++) {
                    $row1=mysqli_fetch_array($r1);
                ?>
                <li>

                    <h4><a href="detail.php?id=<?php echo $row1["book_id"]?>"><?php echo $row1["book_name"] ?></a></h4>
                    <a href="detail.php?id=<?php echo $row1["book_id"]?>"><img src=<?php echo $row1["book_picture"]?>></a>
                    <div class="prize"><?php echo $row1["book_sale_price"]."元"?></div>
                </li>
                    <?php
                }
                ?>
            </ul>
        </div>

</div>

    <div class="list_model">
        <div class="list_title clearfix">
            <h3 class="fl" id="model01">情感</h3>
            <div class="subtitle fl">
                <span>|</span>
            </div>
            <a href="list.php?type=情感" class="goods_more fr" id="fruit_more">查看更多 ></a>
        </div>


        <div class="goods_con clearfix">

            <ul  class="goods_list fl">
                <span></span>
                <?php
                $sql2="SELECT*from book_info where book_type='情感'";
                $r2=mysqli_query($conn,$sql2);
                for($x=0; $x<=3; $x++) {
                    $row2=mysqli_fetch_array($r2);
                    ?>
                    <li>

                        <h4><a href="detail.php?=id=<?php echo $row2["book_id"]?>"><?php echo $row2["book_name"] ?></a></h4>
                        <a href="detail.php?id=<?php echo $row2["book_id"]?>"><img src=<?php echo $row2["book_picture"]?>></a>
                        <div class="prize"><?php echo $row2["book_sale_price"]."元"?></div>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>

    </div>
    <div class="list_model">
        <div class="list_title clearfix">
            <h3 class="fl" id="model01">儿童</h3>
            <div class="subtitle fl">
                <span>|</span>
            </div>
            <a href="list.php?type=儿童" class="goods_more fr" id="fruit_more">查看更多 ></a>
        </div>


        <div class="goods_con clearfix">

            <ul  class="goods_list fl">
                <span></span>
                <?php
                $sql3="SELECT*from book_info where book_type='儿童'";
                $r3=mysqli_query($conn,$sql3);
                for($x=0; $x<=3; $x++) {
                    $row3=mysqli_fetch_array($r3);
                    ?>
                    <li>

                        <h4><a href="detail.php?id=<?php echo $row3["book_id"]?>"><?php echo $row3["book_name"] ?></a></h4>
                        <a href="detail.php?id=<?php echo $row3["book_id"]?>"><img src=<?php echo $row3["book_picture"]?>></a>
                        <div class="prize"><?php echo $row3["book_sale_price"]."元"?></div>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>

    </div>
    <div class="list_model">
        <div class="list_title clearfix">
            <h3 class="fl" id="model01">历史</h3>
            <div class="subtitle fl">
                <span>|</span>
            </div>
            <a href="list.php?type=历史" class="goods_more fr" id="fruit_more">查看更多 ></a>
        </div>


        <div class="goods_con clearfix">

            <ul  class="goods_list fl">
                <span></span>
                <?php
                $sql4="SELECT*from book_info where book_type='历史'";
                $r4=mysqli_query($conn,$sql4);
                for($x=0; $x<=3; $x++) {
                    $row4=mysqli_fetch_array($r4);
                    ?>
                    <li>

                        <h4><a href="detail.php?id=<?php echo $row4["book_id"]?>"><?php echo $row4["book_name"] ?></a></h4>
                        <a href="detail.php?id=<?php echo $row4["book_id"]?>"><img src=<?php echo $row4["book_picture"]?>></a>
                        <div class="prize"><?php echo $row4["book_sale_price"]."元"?></div>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>


    </div>

     <div class="list_model">
         <div class="list_title clearfix">
             <h3 class="fl" id="model01">悬疑</h3>
             <div class="subtitle fl">
                 <span>|</span>
             </div>
             <a href="list.php?type=悬疑" class="goods_more fr" id="fruit_more">查看更多 ></a>
         </div>


         <div class="goods_con clearfix">

             <ul  class="goods_list fl">
                 <span></span>
                 <?php
                 $sql4="SELECT*from book_info where book_type='悬疑'";
                 $r4=mysqli_query($conn,$sql4);
                 for($x=0; $x<=3; $x++) {
                     $row4=mysqli_fetch_array($r4);
                     ?>
                     <li>

                         <h4><a href="detail.php?id=<?php echo $row4["book_id"]?>"><?php echo $row4["book_name"] ?></a></h4>
                         <a href="detail.php?id=<?php echo $row4["book_id"]?>"><img src=<?php echo $row4["book_picture"]?>></a>
                         <div class="prize"><?php echo $row4["book_sale_price"]."元"?></div>
                     </li>
                     <?php
                 }
                 ?>
             </ul>
         </div>


     </div>

     <div class="list_model">
         <div class="list_title clearfix">
             <h3 class="fl" id="model01">社会</h3>
             <div class="subtitle fl">
                 <span>|</span>
             </div>
             <a href="list.php?type=社会" class="goods_more fr" id="fruit_more">查看更多 ></a>
         </div>


         <div class="goods_con clearfix">

             <ul  class="goods_list fl">
                 <span></span>
                 <?php
                 $sql4="SELECT*from book_info where book_type='社会'";
                 $r4=mysqli_query($conn,$sql4);
                 for($x=0; $x<=3; $x++) {
                     $row4=mysqli_fetch_array($r4);
                     ?>
                     <li>

                         <h4><a href="detail.php?id=<?php echo $row4["book_id"]?>"><?php echo $row4["book_name"] ?></a></h4>
                         <a href="detail.php?id=<?php echo $row4["book_id"]?>"><img src=<?php echo $row4["book_picture"]?>></a>
                         <div class="prize"><?php echo $row4["book_sale_price"]."元"?></div>
                     </li>
                     <?php
                 }
                 ?>
             </ul>
         </div>


     </div>

     <div class="list_model">
         <div class="list_title clearfix">
             <h3 class="fl" id="model01">科幻</h3>
             <div class="subtitle fl">
                 <span>|</span>
             </div>
             <a href="list.php?type=科幻" class="goods_more fr" id="fruit_more">查看更多 ></a>
         </div>


         <div class="goods_con clearfix">

             <ul  class="goods_list fl">
                 <span></span>
                 <?php
                 $sql4="SELECT*from book_info where book_type='科幻'";
                 $r4=mysqli_query($conn,$sql4);
                 for($x=0; $x<=3; $x++) {
                     $row4=mysqli_fetch_array($r4);
                     ?>
                     <li>

                         <h4><a href="detail.php?id=<?php echo $row4["book_id"]?>"><?php echo $row4["book_name"] ?></a></h4>
                         <a href="detail.php?id=<?php echo $row4["book_id"]?>"><img src=<?php echo $row4["book_picture"]?>></a>
                         <div class="prize"><?php echo $row4["book_sale_price"]."元"?></div>
                     </li>
                     <?php
                 }
                 ?>
             </ul>
         </div>

     </div>
     <div class="list_model">
         <div class="list_title clearfix">
             <h3 class="fl" id="model01">心理</h3>
             <div class="subtitle fl">
                 <span>|</span>
             </div>
             <a href="list.php?type=心理" class="goods_more fr" id="fruit_more">查看更多 ></a>
         </div>


         <div class="goods_con clearfix">

             <ul  class="goods_list fl">
                 <span></span>
                 <?php
                 $sql4="SELECT*from book_info where book_type='心理'";
                 $r4=mysqli_query($conn,$sql4);
                 for($x=0; $x<=3; $x++) {
                     $row4=mysqli_fetch_array($r4);
                     ?>
                     <li>

                         <h4><a href="detail.php?id=<?php echo $row4["book_id"]?>"><?php echo $row4["book_name"] ?></a></h4>
                         <a href="detail.php?id=<?php echo $row4["book_id"]?>"><img src=<?php echo $row4["book_picture"]?>></a>
                         <div class="prize"><?php echo $row4["book_sale_price"]."元"?></div>
                     </li>
                     <?php
                 }
                 ?>
             </ul>
         </div>


     </div>

     <div class="list_model">
         <div class="list_title clearfix">
             <h3 class="fl" id="model01">魔幻</h3>
             <div class="subtitle fl">
                 <span>|</span>
             </div>
             <a href="list.php?type=魔幻" class="goods_more fr" id="fruit_more">查看更多 ></a>
         </div>


         <div class="goods_con clearfix">

             <ul  class="goods_list fl">
                 <span></span>
                 <?php
                 $sql4="SELECT*from book_info where book_type='魔幻'";
                 $r4=mysqli_query($conn,$sql4);
                 for($x=0; $x<=3; $x++) {
                     $row4=mysqli_fetch_array($r4);
                     ?>
                     <li>

                         <h4><a href="detail.php?id=<?php echo $row4["book_id"]?>"><?php echo $row4["book_name"] ?></a></h4>
                         <a href="detail.php?id=<?php echo $row4["book_id"]?>"><img src=<?php echo $row4["book_picture"]?>></a>
                         <div class="prize"><?php echo $row4["book_sale_price"]."元"?></div>
                     </li>
                     <?php
                 }
                 ?>
             </ul>
         </div>


     </div>
     <div class="list_model">
         <div class="list_title clearfix">
             <h3 class="fl" id="model01">订单可视化</h3>
             <div class="subtitle fl">
                 <span>|</span>
             </div>
             <a href="bar.html" class="goods_more fr" id="fruit_more">查看更多 ></a>
         </div>
         <div class="goods_con clearfix">
             <div style="height: 100%; margin: 0">
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

                     var arr1=[],arr2=[],arr3=[];
                     function arrTest(){
                         $.ajax({
                             type:"post",
                             async:false,
                             url:"jsconn.php",
                             data:{},
                             dataType:"json",
                             success:function(result){
                                 if (result) {
                                     for (var i = 0; i < result.length; i++) {
                                         arr1.push(result[i].order_id);
                                         arr2.push(result[i].book_name);
                                         arr3.push(result[i].book_num);
                                     }
                                 }
                             },
                             error: function(errmsg) {
                                 alert("Ajax获取服务器数据出错了！"+ errmsg);
                             }
                         })
                         return arr1,arr2,arr3;
                     }
                     arrTest();
                     var dom = document.getElementById("container");
                     var myChart = echarts.init(dom);
                     var option = {
                         tooltip: {
                             trigger: 'axis'
                         },
                         legend: {
                             data:['销量']
                         },
                         toolbox: {
                             show : true,
                             feature : {
                                 dataView : {show: true, readOnly: false},
                                 magicType : {show: true, type: ['line', 'bar']},
                                 restore : {show: true},
                                 saveAsImage : {show: true}
                             }
                         },
                         calculable : true,
                         xAxis : [
                             {
                                 type : 'category',
                                 data : arr2
                             }],
                         yAxis : [
                             {type : 'value'}
                         ],
                         series : [
                             {
                                 "name":"销量",
                                 "type":"bar",
                                 "data":arr3,
                                 markPoint : {
                                     data : [
                                         {type : 'max', name: '最大值'},
                                         {type : 'min', name: '最小值'}
                                     ]
                                 },
                                 markLine : {
                                     data : [
                                         {type : 'average', name: '平均值'}
                                     ]
                                 }
                             }
                         ]
                     };
                     myChart.setOption(option);
                 </script>

             </>



         </div>



     </div>


     <div class="goods_con clearfix">

            <ul  class="goods_list fl">
                <span></span>


            </ul>
        </div>

    </div>




    <script type="text/javascript" src="js/editpwd.js"></script>

</body>
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/demo.js"></script>
<script type="text/javascript" src="js/floor.js"></script>
<script type="text/javascript" src="js/lunbo.js"></script>
</html>
