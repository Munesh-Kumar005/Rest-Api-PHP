<?php


header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:PUT');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested_With'); //X-Requested_With use for ajax request
include 'config.php'; ?>

<?php

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['sid'];
$name = $data['sname'];
$age = $data['sage'];
$city = $data['scity'];

$sql = "update students set name='{$name}', age={$age}, city='{$city}' where id ={$id} ";

if (mysqli_query($conn, $sql)) {
    echo json_encode(array('message' => 'Updated record', 'status' => true));
} else {
    echo json_encode(array('message' => 'no record Updated', 'status' => false));
}



?>