<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>注册系统后台执行过程</title>
</head>
<body>
<?php
    header("Content-type: text/html; charset=utf-8");
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "bookstore";
	
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error){        
	echo '数据库连接失败！';        
	exit(0);    }
	else{
	mysqli_query($conn,"set names'UTF8");
	$username = $_POST['txt_username'];  
	$user_sex = $_POST['txt_sex'];
	$password = $_POST['txt_password'];
	$tel = $_POST['txt_tel'];        
    $sql = "select user_tel from user_info where user_tel = '$tel'";
    $result = $conn->query($sql);
	$number = mysqli_num_rows($result);                
	if ($number) 
	{echo '<script>alert("手机号已经注册");history.go(-1);</script>';}
	else { 
	$sql_id = "select cast(max(cast(user_id as unsigned))+1 as char) as new_id from user_info";
	$res_id = $conn->query($sql_id);
	while($row = mysqli_fetch_assoc($res_id)) {
        $newid=$row["new_id"];
    }
	$sql_insert = "insert into user_info(user_id,user_name,user_sex,user_tel,user_password) values('$newid','$username','$user_sex','$tel','$password')";
	$res_insert=$conn->query($sql_insert);
	if($res_insert){
	echo '<script>alert("注册成功！");window.location="index.php";</script>';
	} 	
	else {
    echo '<script>alert("注册失败！");</script>';
		}
	   }
	}
	mysqli_close($conn);
?>
</body>
</html>