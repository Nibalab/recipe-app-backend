<?php
header("Content-Type: application/json; charset=UTF-8");
include_once '../../config/Database.php';
include_once '../../models/Star.php';

$database = new Database();
$db = $database->getConnection();

$star = new Star($db);
$data = $star->read();
echo json_encode($data);
?>
