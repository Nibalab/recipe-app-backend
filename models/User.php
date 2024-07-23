<?php
class User {
    private $conn;
    private $table_name = "users";

    public $user_id;
    public $username;
    public $email;
    public $password;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($username, $email, $password) {
        $query = "INSERT INTO " . $this->table_name . " (username, email, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$username, $email, password_hash($password, PASSWORD_BCRYPT)]);
        return ["success" => "User created"];
    }

    public function update($user_id, $username, $email, $password) {
        $query = "UPDATE " . $this->table_name . " SET username = ?, email = ?, password = ? WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$username, $email, password_hash($password, PASSWORD_BCRYPT), $user_id]);
        return ["success" => "User updated"];
    }

    public function delete($user_id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$user_id]);
        return ["success" => "User deleted"];
    }
}
?>
