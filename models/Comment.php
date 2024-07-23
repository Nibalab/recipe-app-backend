<?php
class Comment {
    private $conn;
    private $table_name = "comments";

    public $comment_id;
    public $recipes_id;
    public $user_id;
    public $content;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($recipes_id, $user_id, $content) {
        $query = "INSERT INTO " . $this->table_name . " (recipes_id, user_id, content) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$recipes_id, $user_id, $content]);
        return ["success" => "Comment created"];
    }

    public function update($comment_id, $recipes_id, $user_id, $content) {
        $query = "UPDATE " . $this->table_name . " SET recipes_id = ?, user_id = ?, content = ? WHERE comment_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$recipes_id, $user_id, $content, $comment_id]);
        return ["success" => "Comment updated"];
    }

    public function delete($comment_id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE comment_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$comment_id]);
        return ["success" => "Comment deleted"];
    }
}
?>
