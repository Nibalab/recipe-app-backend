<?php
header("Content-Type: application/json; charset=UTF-8");
include_once '../../config/Database.php';
include_once '../../models/User.php';

$database = new Database();
$db = $database->getConnection();

$data = json_decode(file_get_contents("php://input"), true);
$user = new User($db);

$response = $user->update($data['user_id'], $data['username'], $data['email'], $data['password']);
echo json_encode($response);
?>
