<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require 'controllers/RecipeController.php';
require 'controllers/CommentController.php';
require 'controllers/SharedRecipeController.php';
require 'controllers/StarController.php';
require 'controllers/UserController.php';

$controller = null;
$data = json_decode(file_get_contents("php://input"), true);

switch ($_GET['controller']) {
    case 'recipes':
        $controller = new RecipeController();
        break;
    case 'comments':
        $controller = new CommentController();
        break;
    case 'sharedRecipes':
        $controller = new SharedRecipeController();
        break;
    case 'stars':
        $controller = new StarController();
        break;
    case 'users':
        $controller = new UserController();
        break;
    default:
        echo json_encode(["error" => "Invalid controller"]);
        exit();
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        echo json_encode($controller->read());
        break;
    case 'POST':
        echo json_encode($controller->create(...array_values($data)));
        break;
    case 'PUT':
        parse_str(file_get_contents("php://input"), $_PUT);
        echo json_encode($controller->update(...array_values($_PUT)));
        break;
    case 'DELETE':
        parse_str(file_get_contents("php://input"), $_DELETE);
        echo json_encode($controller->delete($_DELETE['id']));
        break;
    default:
        echo json_encode(["error" => "Invalid request method"]);
        break;
}
?>
