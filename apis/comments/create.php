<?php
header("Content-Type: application/json; charset=UTF-8");
include_once '../../config/Database.php';
include_once '../../models/Comment.php';

$database = new Database();
$db = $database->getConnection();

$data = json_decode(file_get_contents("php://input"), true);
$comment = new Comment($db);

$response = $comment->create($data['recipes_id'], $data['user_id'], $data['content']);
echo json_encode($response);
?>
