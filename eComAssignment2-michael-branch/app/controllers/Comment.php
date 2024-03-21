<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Comment;

class CommentController extends \app\core\Controller {

    public function add($publication_id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['user_id'])) {
                header('Location: /User/login');
                exit();
            }

            $comment = new Comment();
            $comment->insert($publication_id, $_SESSION['profile_id'], $_POST['comment_text']);
            header("Location: /Publication/view/$publication_id");
            exit();
        } else {
            $this->view('Comment/add', ['publication_id' => $publication_id]);
        }
    }

    public function edit($comment_id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $comment = new Comment();
            $comment_text = $_POST['comment_text'];
            $comment->update($comment_id, $comment_text);
            header("Location: /Publication/view/{$comment->getById($comment_id)['publication_id']}");
            exit();
        } else {
            $comment = new Comment();
            $comment_data = $comment->getById($comment_id);
            $this->view('Comment/edit', ['comment_id' => $comment_id, 'comment_text' => $comment_data['comment_text']]);
        }
    }

    public function delete($comment_id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $comment = new Comment();
            $comment->delete($comment_id);
            header("Location: /Publication/view/{$comment->getById($comment_id)['publication_id']}");
            exit();
        } else {
            $this->view('Comment/delete', ['comment_id' => $comment_id]);
        }
    }
}
?>