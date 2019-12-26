<?php 

ini_set("memory_limit", "512M");
set_time_limit(0);

function user_similarity($array1, $array2)
{
	$length1 = 0;
	$length2 = 0;
	$similarity = 0;
	foreach ($array1 as $book_id => $value) {
		$length1 += pow($array1[$book_id], 2);
		$length2 += pow($array2[$book_id], 2);
		$similarity += $array1[$book_id] * $array2[$book_id];
	}
	return $similarity / sqrt($length1 * $length2);
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

mysqli_query($conn, "set names 'UTF8'");

$sql1 = 'SELECT user_id FROM user_info';
$sql2 = 'SELECT book_id FROM book_info';
$sql3 = 'SELECT user_id, book_id FROM purchase_record';

$vector = array();

$result1 = $conn->query($sql1);
while ($row = $result1->fetch_assoc()) {
	$vector[$row["user_id"]] = array();
}

$result2 = $conn->query($sql2);
while ($row = $result2->fetch_assoc()) {
	foreach ($vector as $user_id => $books) {
		$vector[$user_id][$row["book_id"]] = 0;
	}
}

$result3 = $conn->query($sql3);
while ($row = $result3->fetch_assoc()) {
	$user_id = $row["user_id"];
	$book_id = $row["book_id"];
	$vector[$user_id][$book_id] = 1;
}


foreach ($vector as $user_id => $consumption) {
	$sql = "INSERT INTO book_consumption VALUES(".$user_id.", '".json_encode($consumption)."')";
	$conn->query($sql);
}

foreach ($vector as $user1_id => $array1) {
	foreach ($vector as $user2_id => $array2) {
		if ($user1_id != $user2_id){
			$similarity = user_similarity($array1, $array2);
			$sql = 'INSERT INTO user_similarity VALUES('.$user1_id.', '.$user2_id.', '.$similarity.')';
			$conn->query($sql);
			echo $sql;
		}
	}
}

echo "完成";
?>