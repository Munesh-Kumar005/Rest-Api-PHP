<?php


header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:DELETE');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested_With'); //X-Requested_With use for ajax request
include 'config.php'; ?>

<?php

$data = json_decode(file_get_contents("php://input"), true);
$student_id = $data['sid'];

$sql = "delete from students where id = {$student_id}";
$result = mysqli_query($conn, $sql) or die("not proceeed");

if (mysqli_query($conn, $sql)) {
    echo json_encode(array('message' => 'Deleted record', 'status' => true));
} else {
    echo json_encode(array('message' => 'no record Deleted', 'status' => false));
}




?>