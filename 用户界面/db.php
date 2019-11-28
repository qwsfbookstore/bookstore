<?php
header("Content-type: text/html; charset=utf-8");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_query($conn,"set names 'UTF8'");

function sql($table, $field = '*', $where = '')
{
    global $conn;
    $sql = 'select' . ' ' . $field . ' ' . 'from' . ' ' . $table . ' where ' . $where;
    $data=mysqli_fetch_assoc($conn->query($sql));
    return $data;
}
?>
