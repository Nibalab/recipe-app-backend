<?php
class SharedRecipe {
    private $conn;
    private $table_name = "sheredrecipes";

    public $sharedReciped_id;
    public $recipeId;
    public $sharedBy;
    public $sharedTo;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($recipeId, $sharedBy, $sharedTo) {
        $query = "INSERT INTO " . $this->table_name . " (recipeId, sharedBy, sharedTo) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$recipeId, $sharedBy, $sharedTo]);
        return ["success" => "Shared recipe created"];
    }

    public function update($sharedReciped_id, $recipeId, $sharedBy, $sharedTo) {
        $query = "UPDATE " . $this->table_name . " SET recipeId = ?, sharedBy = ?, sharedTo = ? WHERE sharedReciped_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$recipeId, $sharedBy, $sharedTo, $sharedReciped_id]);
        return ["success" => "Shared recipe updated"];
    }

    public function delete($sharedReciped_id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE sharedReciped_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$sharedReciped_id]);
        return ["success" => "Shared recipe deleted"];
    }
}
?>
