<?php
session_start();
require("./db.php");
if($_POST){
    $id=$_GET['id'];
    $name = $_POST['staffname'];
    $sex = $_POST['staffsex'];
    $age = $_POST['staffage'];
    $tel = $_POST['stafftel'];
    $password=$_POST['staffpassword'];

    $sql1 = "update staff_info set staff_name='$name'where staff_id = '$id'";
    $sql2 = "update staff_info set staff_sex='$sex'where staff_id = '$id'";
    $sql3 = "update staff_info set staff_age='$age'where staff_id = '$id'";
    $sql4 = "update staff_info set staff_tel='$tel'where staff_id = '$id'";
    $sql5 = "update staff_info set staff_password='$password'where staff_id = '$id'";

    $result1 = $conn->query($sql1);
        if($result1){
            echo '<script>alert("修改成功！");window.location="staff_list.php";</script>';
        }
        else {
            echo '<script>alert("修改失败！");</script>';
        }

}
if($_GET['action'] == 'delete'){
	$delete_sql = "DELETE FROM staff_info WHERE staff_id = $_GET[id]";
    if(mysqli_query($conn,$delete_sql)){
		exit('<script language="javascript">alert("删除成功！");self.location = "staff_list.php";</script>');
	} else {
		echo '<script>alert("删除失败！");history.go(-1);</script>';
	}
}
?>