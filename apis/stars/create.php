<?php
header("Content-Type: application/json; charset=UTF-8");
include_once '../../config/Database.php';
include_once '../../models/Star.php';

$database = new Database();
$db = $database->getConnection();

$data = json_decode(file_get_contents("php://input"), true);
$star = new Star($db);

$response = $star->create($data['recipes_id'], $data['user_id']);
echo json_encode($response);
?>
