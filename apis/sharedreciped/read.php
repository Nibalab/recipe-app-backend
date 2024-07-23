<?php
header("Content-Type: application/json; charset=UTF-8");
include_once '../../config/Database.php';
include_once '../../models/SharedRecipe.php';

$database = new Database();
$db = $database->getConnection();

$sharedRecipe = new SharedRecipe($db);
$data = $sharedRecipe->read();
echo json_encode($data);
?>
