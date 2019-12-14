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
	<div id="wrapper">
		<div id="page-wrapper" class="gray-bg dashbard-1">
			<div class="row wrapper border-bottom white-bg page-heading">
				<div class="col-lg-9">
					<h1>员工管理</h1>
					<ol class="breadcrumb">
						<li class="active">
							<strong>添加员工</strong>
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
								<form action="add_staff.php" method="post" id="addproduct_form" class="form-horizontal">

									<div class="form-group">
										<text class="col-sm-2 control-label">员工姓名</text>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="staffname" required="" value="" id="bookname" placeholder="请输入员工姓名">
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									<div class="form-group">
										<text class="col-sm-2 control-label">员工性别</text>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="staffsex" required="" id="bookid" value="" placeholder="请输入员工性别">
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									<div class="form-group">
										<text class="col-sm-2 control-label">员工年龄</text>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="staffage" required="" id="authorname" placeholder="请输入员工年龄">
										</div>
									</div>

									<div class="hr-line-dashed"></div>
									<div class="form-group">
										<text class="col-sm-2 control-label">员工电话</text>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="stafftel" required="" id="authorid" placeholder="请输入员工电话">
										</div>
									</div>

									<div class="hr-line-dashed"></div>
									<div class="form-group">
										<text class="col-sm-2 control-label">员工密码</text>
										<div class="col-sm-10">
											<input type="password" class="form-control" name="staffpassword" required="" id="authorid" placeholder="请输入员工密码">
										</div>
									</div>
									</div>
									<div class="hr-line-dashed"></div>

									<div class="form-group">
										<div class="col-sm-4 col-sm-offset-2">
											<button class="btn btn-primary new-pro" type="submit" id="addbook_button" >新增员工</button>
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


