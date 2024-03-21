<?php
namespace app\models;

use PDO;

class Publication extends \app\core\Model {
    public $publication_id;
    public $profile_id;
    public $publication_title;
    public $publication_text;
    public $publication_status;

    public function insert() {
        $SQL = 'INSERT INTO publication(profile_id, publication_title, publication_text, publication_status) 
                VALUES (:profile_id, :publication_title, :publication_text, :publication_status)';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'profile_id' => $this->profile_id,
            'publication_title' => $this->publication_title,
            'publication_text' => $this->publication_text,
            'publication_status' => $this->publication_status
        ]);
    }

    public function update() {
        $SQL = 'UPDATE publication SET publication_title=:publication_title, publication_text=:publication_text, 
                publication_status=:publication_status WHERE publication_id=:publication_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'publication_id' => $this->publication_id,
            'publication_title' => $this->publication_title,
            'publication_text' => $this->publication_text,
            'publication_status' => $this->publication_status
        ]);
    }

    public function delete() {
        $SQL = 'DELETE FROM publication WHERE publication_id=:publication_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['publication_id' => $this->publication_id]);
    }

    public function get($publication_id) {
        $SQL = "SELECT * FROM publication WHERE publication_id = :publication_id";
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['publication_id' => $publication_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Publication');
        return $STMT->fetch();
    }

    public function getAll() {
        $SQL = "SELECT * FROM publication ORDER BY timestamp DESC";
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Publication');
        return $STMT->fetchAll();
    }

    public function getByTitle($publication_title) {
        $SQL = "SELECT * FROM publication WHERE publication_title LIKE :publication_title ORDER BY timestamp DESC";
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['publication_title' => '%' . $publication_title . '%']);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Publication');
        return $STMT->fetchAll();
    }

    public function getByContent($content) {
        $SQL = "SELECT * FROM publication WHERE publication_text LIKE :content ORDER BY timestamp DESC";
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['content' => '%' . $content . '%']);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Publication');
        return $STMT->fetchAll();
    }

    public function getForUser($profile_id) {
        $SQL = "SELECT * FROM publication WHERE profile_id = :profile_id ORDER BY timestamp DESC";
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['profile_id' => $profile_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Publication');
        return $STMT->fetchAll();
    }
}
