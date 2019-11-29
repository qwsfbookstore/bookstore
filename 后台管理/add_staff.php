<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>添加员工</title>
</head>
<body>
<?php
header("Content-type: text/html; charset=utf-8");
$servername = "localhost";
$staffname = "root";
$password = "";
$dbname = "bookstore";

$conn = new mysqli($servername, $staffname, $password, $dbname);

if ($conn->connect_error){
	echo '数据库连接失败！';
	exit(0);    }
else{
	mysqli_query($conn,"set names'UTF8");
	$name = $_POST['staffname'];
	$sex = $_POST['staffsex'];
	$age = $_POST['staffage'];
	$tel = $_POST['stafftel'];
	$password=$_POST['staffpassword'];
	$sql = "select staff_tel from staff_info where staff_tel = '$tel'";
	$result = $conn->query($sql);
	$number = mysqli_num_rows($result);
	if ($number)
	{echo '<script>alert("该员工手机号已经存在");history.go(-1);</script>';}
	else {
		$sql_id = "select cast(max(cast(staff_id as unsigned))+1 as char) as new_id from staff_info";
		$res_id = $conn->query($sql_id);
		while($row = mysqli_fetch_assoc($res_id)) {
			$newid=$row["new_id"];
		}
		$sql_insert = "insert into staff_info(staff_id,staff_name,staff_sex,staff_age,staff_tel,staff_password) values('$newid','$name','$sex','$age','$tel','$password')";
		$res_insert=$conn->query($sql_insert);
		if($res_insert){
			echo '<script>alert("添加成功！");window.location="staff_list.php";</script>';
		}
		else {
			echo '<script>alert("添加失败！");</script>';
		}
	}
}
mysqli_close($conn);
?>
</body>
</html>