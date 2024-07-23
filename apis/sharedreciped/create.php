<?php
header("Content-Type: application/json; charset=UTF-8");
include_once '../../config/Database.php';
include_once '../../models/SharedRecipe.php';

$database = new Database();
$db = $database->getConnection();

$data = json_decode(file_get_contents("php://input"), true);
$sharedRecipe = new SharedRecipe($db);

$response = $sharedRecipe->create($data['recipeId'], $data['sharedBy'], $data['sharedTo']);
echo json_encode($response);
?>
