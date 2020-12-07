<?php


header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested_With');//X-Requested_With use for ajax request
include 'config.php'; ?>

<?php

$data = json_decode(file_get_contents("php://input"), true);
$name = $data['sname'];
$age = $data['sage'];
$city = $data['scity'];

$sql = "insert into students(name,age,city)Values('{$name}',{$age},'{$city}')";

if (mysqli_query($conn, $sql)) {
    echo json_encode(array('message' => 'inserted record', 'status' => true));
} else {
    echo json_encode(array('message' => 'no record insert', 'status' => false));
}



?>