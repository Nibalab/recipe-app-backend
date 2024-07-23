<?php
header("Content-Type: application/json; charset=UTF-8");
include_once '../../config/Database.php';
include_once '../../models/Comment.php';

$database = new Database();
$db = $database->getConnection();

$comment = new Comment($db);
$data = $comment->read();
echo json_encode($data);
?>
