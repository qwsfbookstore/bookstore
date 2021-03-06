<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<title>留言管理</title>
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
	<div id="container">
<div id="guestbook"><!--留言列表-->
<h3>留言列表</h3>
<?php
// 引用相关文件
require("./db.php");
require("./config.php");

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
<span class="bold"><?=$gb_array['nickname']?></span> <span class="guestbook-time">[<?=date("Y-m-d H:i:s", $gb_array['create_time'])?>]</span><span> 留言ID：<?=$gb_array['id']?> 用户ID：<?=$gb_array['user_id']?> <a href="reply.php?action=delete&id=<?=$gb_array['id']?>">删除留言</a>
<p class="guestbook-content"><?=nl2br($gb_array['content'])?></p>
<form id="form1" name="form1" method="post" action="reply.php">
<p><label for="reply">回复本条留言:</label></p>
<br/>
<textarea id="reply" name="reply" cols="40" rows="5"><?=$gb_array['reply']?></textarea>
<p>
<input name="id" type="hidden" value="<?=$gb_array['id']?>" />
<br/>
<input type="submit" name="submit" value="回复留言" />
</p>
<br/>
<br/>
</form>
</div>
<?php
}	//while循环结束
?>
<div class="guestbook-list guestbook-page">
<p>
<?php
//计算留言页数
$count_result = mysqli_query($conn,("SELECT count(*) FROM guest_book"));
$count_array = mysqli_fetch_array($count_result);
$pagenum = ceil($count_array['count(*)']/$pagesize);
echo '共 ',$count_array['count(*)'],' 条留言';
if ($pagenum > 1) {
	for($i=1;$i<=$pagenum;$i++) {
		if($i==$p) {
			echo '&nbsp;[',$i,']';
		} else {
			echo '&nbsp;<a href="admin_guestbook.php?p=',$i,'">'.$i.'</a>';
		}
	}
}
?>
</p>
</div>
</div><!--留言列表结束-->


</div><!--container-->
    </div>
</section>


</body>
</html>


