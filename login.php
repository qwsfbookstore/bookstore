<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>登录系统后台执行过程</title>
</head>
<body>
<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "bookstore";
	
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error){        
	echo '数据库连接失败！';        
	exit(0);    }
	else{        
	$id=$_POST['txtUsername'];
	$password=$_POST['txtPassword'];
	$result=mysqli_query($conn,"select*from user_info where user_id='$id' and user_password='$password'");       
	$number = mysqli_num_rows($result);        
	if ($number) {            
	echo '<script>window.location="index.html";</script>';        } 
	else {            
	echo '<script>alert("ID或密码错误！");history.go(-1);</script>';        
	}   
	}
	mysqli_close($conn);
?>
</body>
</html>