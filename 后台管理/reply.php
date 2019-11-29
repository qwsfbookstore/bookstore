<?php
session_start();
require("./db.php");
if($_POST){
	if(get_magic_quotes_gpc()){
		$reply = htmlspecialchars(trim($_POST['reply']));
	} else {
		$reply = addslashes(htmlspecialchars(trim($_POST['reply'])));
	}
	// 回复为空时，将回复时间置为空
	$replytime = $reply?time():'NULL';
	$staff_id=$_SESSION['staff_id'];
	$update_sql = "UPDATE guest_book SET staff_id='$staff_id',reply = '$reply', reply_time = $replytime WHERE id = $_POST[id]";
	if(mysqli_query($conn,$update_sql)&&$reply!=null){
		exit('<script language="javascript">alert("回复成功！");self.location = "admin_guestbook.php";</script>');
	} else {
		exit('<script>alert("回复失败！");history.go(-1);</script>');
	}
}

// 删除留言
if($_GET['action'] == 'delete'){
	$delete_sql = "DELETE FROM guest_book WHERE id = $_GET[id]";
	if(mysql_query($delete_sql)){
		exit('<script language="javascript">alert("删除成功！");self.location = "admin_guestbook.php";</script>');
	} else {
		echo '<script>alert("删除失败！");history.go(-1);</script>';
	}
}
?>