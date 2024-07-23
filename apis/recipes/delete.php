<?php
header("Content-Type: application/json; charset=UTF-8");
include_once '../../config/Database.php';
include_once '../../models/Recipe.php';

$database = new Database();
$db = $database->getConnection();

$data = json_decode(file_get_contents("php://input"), true);
$recipe = new Recipe($db);

$response = $recipe->delete($data['recipes_id']);
echo json_encode($response);
?>
