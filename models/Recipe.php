<?php
class Recipe {
    private $conn;
    private $table_name = "recipes";

    public $recipes_id;
    public $user_id;
    public $name;
    public $ingredients;
    public $steps;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($user_id, $name, $ingredients, $steps) {
        $query = "INSERT INTO " . $this->table_name . " (user_id, name, ingredients, steps) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$user_id, $name, $ingredients, $steps]);
        return ["success" => "Recipe created"];
    }

    public function update($recipes_id, $user_id, $name, $ingredients, $steps) {
        $query = "UPDATE " . $this->table_name . " SET user_id = ?, name = ?, ingredients = ?, steps = ? WHERE recipes_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$user_id, $name, $ingredients, $steps, $recipes_id]);
        return ["success" => "Recipe updated"];
    }

    public function delete($recipes_id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE recipes_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$recipes_id]);
        return ["success" => "Recipe deleted"];
    }
}
?>
