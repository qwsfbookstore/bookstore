<?php 

ini_set("memory_limit", "512M");
set_time_limit(0);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

mysqli_query($conn, "set names 'UTF8'");

$sql1 = "SELECT book_id, ENG_intro FROM book_info";
$result1 = $conn->query($sql1);
$words = array();
$books = array();
while($row = $result1->fetch_assoc()){
    $id = $row["book_id"];
    $text = $row["ENG_intro"];
    $text = str_replace(array("<p>", "</p>", ".", ",", "!", "?", ";", "--", "/", '"', "(", ")", "<", "p", ">"), "", $text);
    $text_split = explode(" ", $text);
    $books[$id] = array_count_values($text_split);
    foreach ($text_split as $word) {
        if (!array_key_exists($word, $words)) $words[$word] = 0;
    }
}

$tf_matrix = array();
$d_num = $words;
foreach ($books as $id => $word_frequency) {
    $f_vector = $words;
    foreach ($word_frequency as $word => $frequency) {
        if (array_key_exists($word, $f_vector)) $f_vector[$word] = $frequency;
        $d_num[$word] += 1;
    }
    $tf_matrix[$id] = $f_vector;
}

$idf = $d_num;
foreach ($d_num as $word => $num) {
    $idf[$word] = log(count($books)/$num);
}

$w_matrix = $tf_matrix;
foreach ($tf_matrix as $book => $word_frequency) {
    foreach ($word_frequency as $word => $frequency) {
        $w_matrix[$book][$word] = $frequency * $idf[$word];
    }
}

$w1_matrix = $w_matrix;
foreach ($w_matrix as $book => $words_vector) {
    $length = 0;
    foreach ($words_vector as $word => $v) {
        $length += $v * $v;
    }
    $length = sqrt($length);
    foreach ($words_vector as $word => $v) {
        $w1_matrix[$book][$word] = $v / $length;
    }
}

$ids = array_keys($books);
foreach ($ids as $id1) {
    foreach ($ids as $id2) {
        if ($id1 != $id2){
            $similarity = 0;
            foreach ($words as $word => $f) {
                $similarity += ($w1_matrix[$id1][$word] * $w1_matrix[$id2][$word]);
            }
            $sql = "INSERT INTO book_similarity VALUES({$id1}, {$id2}, {$similarity})";
            $r = $conn->query($sql);
        }
    }
}
echo "全部计算完成";

$conn->close();
?>