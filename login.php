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
	$id=$_POST['username'];
	$password=$_POST['password'];
	$result=mysqli_query($conn,"select*from id_password where id='$id' and password='$password'and identity='staff'");       
	$number = mysqli_num_rows($result);        
	if ($number) {            
	echo '<script>window.location="admin_index.html";</script>';        } 
	else {            
	echo '<script>alert("ID或密码错误！");history.go(-1);</script>';        
	}   
	}
	mysqli_close($conn);
?>
</body>
</html>