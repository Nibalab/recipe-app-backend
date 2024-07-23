<?php
class Star {
    private $conn;
    private $table_name = "stars";

    public $stars_id;
    public $recipes_id;
    public $user_id;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($recipes_id, $user_id) {
        $query = "INSERT INTO " . $this->table_name . " (recipes_id, user_id) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$recipes_id, $user_id]);
        return ["success" => "Star created"];
    }

    public function update($stars_id, $recipes_id, $user_id) {
        $query = "UPDATE " . $this->table_name . " SET recipes_id = ?, user_id = ? WHERE stars_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$recipes_id, $user_id, $stars_id]);
        return ["success" => "Star updated"];
    }

    public function delete($stars_id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE stars_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$stars_id]);
        return ["success" => "Star deleted"];
    }
}
?>
