<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <title>奇文书坊-读书社区</title>
	<link rel="stylesheet" type="text/css" href="css/style1.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <link rel="stylesheet" type="text/css" href="css/foot.css"/>
    <link rel="stylesheet" type="text/css" href="css/reset.css"/>
    <link rel="stylesheet" type="text/css"  href="css/booklist.css"/>
    <script src="js/html5.js"></script>
    <script type="text/javascript" src="js/ie6.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/index.js"></script>
	<script language="JavaScript">
	function InputCheck(form1)
	{
	  if (form1.nickname.value == "")
	  {
		alert("请输入您的昵称。");
		form1.nickname.focus();
		return (false);
	  }
	  if (form1.content.value == "")
	  {
		alert("动态内容不可为空。");
		form1.content.focus();
		return (false);
	  }
	}
	</script>

    <!--引入bootstrap的css文件-->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!--引入js包-->
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <!--引入bootstrap的js文件-->
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div class="header_con">
    <div class="header">
        <div class="welcome fl">欢迎来到奇文书坊</div>
        <div class="fr">
            <div class="login_btn fl">
                <?php
                include ("db.php");
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
    <div class="search_con fl">
        <form action="search_result.php" method="post">
            <input type="text" class="input_text fl" name="search_word" placeholder="搜索商品">
            <input type="submit" class="input_btn fr" name="search" value="搜索">
        </form>
    </div>
	<a href="advanced_search.php" style="position:absolute; top:75px; left:990px; ">高级检索</a>
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
        ?></div>
    </div>
</div>
<div id="container">
<div id="guestbook"><!--动态列表-->
	<h3>读书社区</h3>
	<?php
	// 引用相关文件
	require("config.php");
	// 确定当前页数 $p 参数
	$p = $_GET['p']?$_GET['p']:1;
	// 数据指针
	$offset = ($p-1)*$pagesize;

	$sql = "SELECT * FROM guest_book ORDER BY id DESC LIMIT  $offset , $pagesize";
	$result=mysqli_query($conn,$sql);
	// 如果出现错误并退出
	if(!$result) exit(0);
	// 循环输出
	while($gb_array = mysqli_fetch_array($result)){
	?>
	<div class="guestbook-list">
	<p class="guestbook-head">
	<img src="images/<?=$gb_array['face']?>.gif" />
	<span class="bold"><?=$gb_array['user_id']."&nbsp;&nbsp;".$gb_array['nickname']?></span> <span class="guestbook-time">[<?=date("Y-m-d H:i", $gb_array['create_time'])?>]</span>
      <?php if($user_id!=$gb_array['user_id'])  {echo "<button id='add' class='btn btn-primary' style='height: 25px;background: #FF8000;border-color: #FF8000;padding-top: 2px' data-toggle='modal' data-target='#myModal' code=".$gb_array['user_id'].">加好友</button></p>";}?>
	<p class="guestbook-content"><?=nl2br($gb_array['content'])?></p>
	<?php
		// 回复
		if(!empty($gb_array['reply_time'])) {
	?>
	<p class="guestbook-head">管理员回复： <span class="guestbook-time">[<?=date("Y-m-d H:i", $gb_array['reply_time'])?>]</span></p>
	<p class="guestbook-content"><?=nl2br($gb_array['reply'])?></p>
	<?php
		}	// 回复结束
	?>
</div>
	<?php
	}	//while循环结束
	?>
	<div class="guestbook-list guestbook-page">
	<p>
	<?php
	//计算动态页数
	$count_result = mysqli_query($conn,("SELECT count(*) FROM guest_book"));
	$count_array = mysqli_fetch_array($count_result);
	$pagenum = ceil($count_array['count(*)']/$pagesize);
	echo '共 ',$count_array['count(*)'],' 条动态&nbsp;&nbsp;';
	if ($pagenum > 1) {
		for($i=1;$i<=$pagenum;$i++) {
			if($i==$p) {
				echo '&nbsp;[',$i,']';
			} else {
				echo '&nbsp;<a href="guestbook.php?p=',$i,'">'.$i.'</a>';
			}
		}
	}
	?>
</p>
</div>
</div><!--动态列表结束-->

    <!-- 好友申请模态框（Modal） -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">好友申请</h4>
                </div>
                <textarea id='applytext' class="modal-body" style="width: 599px;"></textarea>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button id='submit' type="button" class="btn btn-primary qdhf" style='height: 35px;background: #FF8000;border-color: #FF8000;padding-top: 3px'>发送申请</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

<div id="guestbook-form">
	<h3>发表动态</h3>
	<form id="form1" name="form1" method="post" action="submiting.php" onSubmit="return InputCheck(this)">
	<p>
	<label for="title">昵&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;称:</label>
	<input id="nickname" name="nickname" type="text" /><span>(必须填写，不超过16个字符串)</span>
	</p>
	<p>
	<label for="face">头&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;像:</label>
	<input type="radio" name="face" value="1" checked>
	<img src="images/1.gif" />
	<input type="radio" name="face" value="2">
	<img src="images/2.gif" />
	<input type="radio" name="face" value="3">
	<img src="images/3.gif" />
	<input type="radio" name="face" value="4">
	<img src="images/4.gif" />
	<input type="radio" name="face" value="5">
	<img src="images/5.gif" />
	<input type="radio" name="face" value="6">
	<img src="images/6.gif" />
	<input type="radio" name="face" value="7">
	<img src="images/7.gif" />
	</p>
	<p class="leftmargin">
	<input type="radio" name="face" value="8">
	<img src="images/8.gif" />
	<input type="radio" name="face" value="9">
	<img src="images/9.gif" />
	<input type="radio" name="face" value="10">
	<img src="images/10.gif" />
	<input type="radio" name="face" value="11">
	<img src="images/11.gif" />
	<input type="radio" name="face" value="12">
	<img src="images/12.gif" />
	<input type="radio" name="face" value="13">
	<img src="images/13.gif" />
	<input type="radio" name="face" value="14">
	<img src="images/14.gif" />
	</p>
	<p>
	<p>
	<label for="title">动态内容:</label>
	<textarea id="content" name="content"></textarea>
	</p>
	<input type="submit" name="submit" class="submit" value="  确 定  " />
	<span>(请自觉遵守互联网相关政策法规，严禁发布色情、暴力、反动言论) </span>
	</form>
	</div>
	</div><!--container-->
	<br/>
	<br/>
	<br/>
</body>
</html>

<script>
    //定义空字符串，容纳被申请人的id
    var code="";
    $("#add").click(function(){
        code = $(this).attr("code");
    })
    //将申请写进数据库
    $("#submit").click(function(){
        var plnr = $("#applytext").val();
        var plid = code;
        $.ajax({
            url:"addfriend.php",
            data:{apply_text:plnr,sid:plid},
            type:"POST",
            dataType:"TEXT",
            success:function(data){
                window.location.href="addfriend.php";
            }
        });
    })

</script>

