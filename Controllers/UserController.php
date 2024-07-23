<?php
include_once '../config/Database.php';
include_once '../models/User.php';

class UserController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function read() {
        return $this->user->read();
    }

    public function create($username, $email, $password) {
        return $this->user->create($username, $email, $password);
    }

    public function update($user_id, $username, $email, $password) {
        return $this->user->update($user_id, $username, $email, $password);
    }

    public function delete($user_id) {
        return $this->user->delete($user_id);
    }
}
?>
