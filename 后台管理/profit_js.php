<?php

require("dbconn.php");
$conn = mysqli_connect($mysql_server_name, $mysql_username, $mysql_password) or die("error connecting");
mysqli_query($conn, "set names 'utf8'");
mysqli_select_db($conn, $mysql_database);
$result = mysqli_query($conn, "SELECT MONTH(order_time) AS monthly, ROUND(SUM((book_info.book_sale_price-book_info.book_purchase_price)*order_details.book_num),2) AS total_sales FROM (order_info join (book_info join order_details on(book_info.book_id = order_details.book_id)) on((order_info.order_id = order_details.order_id))) GROUP BY MONTH(order_time)");
$data = "";
$array = array();

class User
{
    public $monthly;
    public $total_sales;

}

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $user = new User();
    $user->monthly = $row['monthly'];
    $user->total_sales = $row['total_sales'];
    $array[] = $user;
}
$data = json_encode($array);
// echo "{".'"user"'.":".$data."}";
echo $data;

?>


