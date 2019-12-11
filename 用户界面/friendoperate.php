<?php
session_start();
require("./db.php");
    $id=$_GET['id'];
    $user_id=$_SESSION["user_id"];

    if($_GET['action'] == 'accept'){
        $q = "update friend_apply set apply_status='已通过' where uid='$id'and sid='$user_id'";
        $q1= "insert into friend_relationship(uid,fid) values('$user_id','$id')";
        $q2= "insert into friend_relationship(uid,fid) values('$id','$user_id')";
        if(mysqli_query($conn,$q)&&mysqli_query($conn,$q1)&&mysqli_query($conn,$q2)){
            exit('<script language="javascript">alert("添加好友成功！");self.location = "friendlist.php";</script>');
        } else {
            echo '<script>alert("添加好友失败！");history.go(-1);</script>';
        }
    }

    if($_GET['action'] == 'refuse'){
        $q = "update friend_apply set apply_status='未通过' where uid='$id'and sid='$user_id'and apply_status='待通过'";
        mysqli_query($conn,$q);
        $q1=  "select * from friend_apply where uid='$id'and sid='$user_id'and apply_status='未通过'";
        if(mysqli_fetch_array(mysqli_query($conn,$q1))){
            exit('<script language="javascript">alert("拒绝成功！");self.location = "friendlist.php";</script>');
        } else {
            echo '<script>alert("拒绝失败！");history.go(-1);</script>';
        }
    }

    if($_GET['action'] == 'delete'){
        $q = "delete from friend_apply where sid='$id'and uid='$user_id'and apply_status='待通过'";
        if( mysqli_query($conn,$q)){
            exit('<script language="javascript">alert("删除成功！");self.location = "friendlist.php";</script>');
        } else {
            echo '<script>alert("删除失败！");history.go(-1);</script>';
        }
    }
?>