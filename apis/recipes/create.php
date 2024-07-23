<?php
header("Content-Type: application/json; charset=UTF-8");
include_once '../../config/Database.php';
include_once '../../models/Recipe.php';

$database = new Database();
$db = $database->getConnection();

$data = json_decode(file_get_contents("php://input"), true);
$recipe = new Recipe($db);

$response = $recipe->create($data['user_id'], $data['name'], $data['ingredients'], $data['steps']);
echo json_encode($response);
?>
