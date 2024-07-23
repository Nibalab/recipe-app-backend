<?php
include_once '../config/Database.php';
include_once '../models/SharedRecipe.php';

class SharedRecipeController {
    private $db;
    private $sharedRecipe;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->sharedRecipe = new SharedRecipe($this->db);
    }

    public function read() {
        return $this->sharedRecipe->read();
    }

    public function create($recipeId, $sharedBy, $sharedTo) {
        return $this->sharedRecipe->create($recipeId, $sharedBy, $sharedTo);
    }

    public function update($sharedReciped_id, $recipeId, $sharedBy, $sharedTo) {
        return $this->sharedRecipe->update($sharedReciped_id, $recipeId, $sharedBy, $sharedTo);
    }

    public function delete($sharedReciped_id) {
        return $this->sharedRecipe->delete($sharedReciped_id);
    }
}
?>
