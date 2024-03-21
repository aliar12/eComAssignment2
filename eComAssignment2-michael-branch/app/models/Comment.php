<?php

namespace app\models;

use PDO;

class CommentModel extends \app\core\Controller {

    private $db;

    public function __construct() {
        $this->db = new PDO("mysql:host=localhost;dbname=ecommerce.sql", "username", "password");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function insert($publication_id, $profile_id, $comment_text) {
        $stmt = $this->db->prepare("INSERT INTO publication_comment (publication_id, profile_id, comment_text, timestamp) VALUES (?, ?, ?, NOW())");
        $stmt->execute([$publication_id, $profile_id, $comment_text]);
    }

    public function update($comment_id, $comment_text) {
        $stmt = $this->db->prepare("UPDATE publication_comment SET comment_text = ? WHERE publication_comment_id = ?");
        $stmt->execute([$comment_text, $comment_id]);
    }

    public function delete($comment_id) {
        $stmt = $this->db->prepare("DELETE FROM publication_comment WHERE publication_comment_id = ?");
        $stmt->execute([$comment_id]);
    }

    public function getById($comment_id) {
        $stmt = $this->db->prepare("SELECT * FROM publication_comment WHERE publication_comment_id = ?");
        $stmt->execute([$comment_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getForPublication($publication_id) {
        $stmt = $this->db->prepare("SELECT * FROM publication_comment WHERE publication_id = ?");
        $stmt->execute([$publication_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
