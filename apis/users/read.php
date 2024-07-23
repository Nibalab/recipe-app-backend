<?php
header("Content-Type: application/json; charset=UTF-8");
include_once '../../config/Database.php';
include_once '../../models/User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$data = $user->read();
echo json_encode($data);
?>
