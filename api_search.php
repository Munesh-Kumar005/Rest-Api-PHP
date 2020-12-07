<?php


header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
include 'config.php'; ?>

<?php
/*
$data = json_decode(file_get_contents("php://input"), true);
$search_value = $data['search'];*/

// if we search using url than check new methos below

$search_value = isset($_GET['search']) ? $_GET['search'] : die();  // acess like this http://localhost/api/api_search.php?search=munesh

$sql = "select * from students where name LIKE '%{$search_value}%'";
$result = mysqli_query($conn, $sql) or die("not proceeed");
if (mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo json_encode($output);
} else {
    echo json_encode(array('message' => 'no search found', 'status' => false));
}



?>