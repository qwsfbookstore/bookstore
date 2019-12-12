<?php

require("db.php");
$result = mysqli_query($conn, "SELECT order_id,book_num,book_name FROM order_details,book_info WHERE order_details.book_id=book_info.book_id ");
$data = "";
$array = array();

class User
{
    public $order_id;
    public $book_name;
    public $book_num;
}

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $user = new User();
    $user->order_id = $row['order_id'];
    $user->book_name = $row['book_name'];
    $user->book_num = $row['book_num'];
    $array[] = $user;
}
$data = json_encode($array);
// echo "{".'"user"'.":".$data."}";
echo $data;

?>

