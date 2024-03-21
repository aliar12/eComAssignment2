<<<<<<< Updated upstream
=======
<?php
namespace app\models;

use PDO;

class Publication extends \app\core\Model
{
    public $publication_id;
    public $profile_id;
    public $publication_title;
    public $publication_text;
    public $timestamp;
    public $publication_status;

    // Create a new publication
    public function create()
    {
        $SQL = 'INSERT INTO publication(profile_id, publication_title, publication_text, publication_status) VALUES (:profile_id, :publication_title, :publication_text, :publication_status)';
        $STMT = self::$_conn->prepare($SQL);
        return $STMT->execute([
            'profile_id' => $_SESSION['profile_id'], // Assign profile_id based on the currently logged-in user
            'publication_title' => $this->publication_title,
            'publication_text' => $this->publication_text,
            'publication_status' => $this->publication_status
        ]);
    }

    // Edit an existing publication
    public function edit()
    {
        $SQL = 'UPDATE publication SET publication_title = :publication_title, publication_text = :publication_text WHERE publication_id = :publication_id';
        $STMT = self::$_conn->prepare($SQL);
        return $STMT->execute([
            'publication_id' => $this->publication_id,
            'publication_title' => $this->publication_title,
            'publication_text' => $this->publication_text
        ]);
    }

    // Delete a publication
    public function delete()
    {
        $SQL = 'DELETE FROM publication WHERE publication_id = :publication_id';
        $STMT = self::$_conn->prepare($SQL);
        return $STMT->execute(['publication_id' => $this->publication_id]);
    }

    // Toggle publication status between public and private
    public function toggleStatus()
    {
        $newStatus = ($this->publication_status === 'public') ? 'private' : 'public';
        $SQL = 'UPDATE publication SET publication_status = :new_status WHERE publication_id = :publication_id';
        $STMT = self::$_conn->prepare($SQL);
        return $STMT->execute(['new_status' => $newStatus, 'publication_id' => $this->publication_id]);
    }

    // Get all publications
    public function getAll()
    {
        $SQL = 'SELECT * FROM publication ORDER BY timestamp DESC';
        $STMT = self::$_conn->query($SQL);
        return $STMT->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get a publication by its ID
    public function getById($publication_id)
    {
        $SQL = 'SELECT * FROM publication WHERE publication_id = :publication_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['publication_id' => $publication_id]);
        return $STMT->fetch(PDO::FETCH_ASSOC);
    }

    // Search for publications by title or content
    public function search($keyword)
    {
        $SQL = 'SELECT * FROM publication WHERE publication_title LIKE :keyword OR publication_text LIKE :keyword';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['keyword' => '%' . $keyword . '%']);
        return $STMT->fetchAll(PDO::FETCH_ASSOC);
    }
}

>>>>>>> Stashed changes
