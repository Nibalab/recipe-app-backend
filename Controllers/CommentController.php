<?php
include_once '../config/Database.php';
include_once '../models/Comment.php';

class CommentController {
    private $db;
    private $comment;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->comment = new Comment($this->db);
    }

    public function read() {
        return $this->comment->read();
    }

    public function create($recipes_id, $user_id, $content) {
        return $this->comment->create($recipes_id, $user_id, $content);
    }

    public function update($comment_id, $recipes_id, $user_id, $content) {
        return $this->comment->update($comment_id, $recipes_id, $user_id, $content);
    }

    public function delete($comment_id) {
        return $this->comment->delete($comment_id);
    }
}
?>
