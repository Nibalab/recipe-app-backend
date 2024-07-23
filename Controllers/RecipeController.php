<?php
include_once '../config/Database.php';
include_once '../models/Recipe.php';

class RecipeController {
    private $db;
    private $recipe;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->recipe = new Recipe($this->db);
    }

    public function read() {
        return $this->recipe->read();
    }

    public function create($user_id, $name, $ingredients, $steps) {
        return $this->recipe->create($user_id, $name, $ingredients, $steps);
    }

    public function update($recipes_id, $user_id, $name, $ingredients, $steps) {
        return $this->recipe->update($recipes_id, $user_id, $name, $ingredients, $steps);
    }

    public function delete($recipes_id) {
        return $this->recipe->delete($recipes_id);
    }
}
?>
