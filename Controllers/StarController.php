<?php
include_once '../config/Database.php';
include_once '../models/Star.php';

class StarController {
    private $db;
    private $star;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->star = new Star($this->db);
    }

    public function read() {
        return $this->star->read();
    }

    public function create($recipes_id, $user_id) {
        return $this->star->create($recipes_id, $user_id);
    }

    public function update($stars_id, $recipes_id, $user_id) {
        return $this->star->update($stars_id, $recipes_id, $user_id);
    }

    public function delete($stars_id) {
        return $this->star->delete($stars_id);
    }
}
?>
