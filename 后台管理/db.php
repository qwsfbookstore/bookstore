<?php
header("Content-type: text/html; charset=utf-8");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

$dsn = "mysql:host=$servername;dbname=$dbname";
$pdo = new PDO($dsn, $username, $password);

function sql($table, $field = '*', $where = '')
{
    global $pdo;
    $sql = 'select' . ' ' . $field . ' ' . 'from' . ' ' . $table . ' where ' . $where;
    $data = $pdo->query($sql)->fetch();
    return $data;
}
?>
