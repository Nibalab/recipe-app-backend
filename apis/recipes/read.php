<?php
header("Content-Type: application/json; charset=UTF-8");
include_once '../../config/Database.php';
include_once '../../models/Recipe.php';

$database = new Database();
$db = $database->getConnection();

$recipe = new Recipe($db);
$data = $recipe->read();
echo json_encode($data);
?>
