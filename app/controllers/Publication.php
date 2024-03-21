<?php
namespace app\controllers;

class Publication extends \app\core\Controller{

    public function index(){
        $publicationModel = new \app\models\Publication();
        $publications = $publicationModel->getAll();

        $this->view('Publication/index', ['publications' => $publications]);
    }

    public function create(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $publicationModel = new \app\models\Publication();
            $publicationModel->profile_id = $_SESSION['profile_id'];
            $publicationModel->publication_title = $_POST['publication_title'];
            $publicationModel->publication_text = $_POST['publication_text'];
            $publicationModel->publication_status = $_POST['publication_status'];
            $publicationModel->insert();
            header('Location: /Publication/index');
            exit;
        } else {
            $this->view('Publication/create');
        }
    }

    public function edit($publication_id){
        $publicationModel = new \app\models\Publication();
        $publication = $publicationModel->get($publication_id);

        if(!$publication) {
            // Handle case when publication is not found
            header('Location: /Publication/index');
            exit;
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $publication->publication_title = $_POST['publication_title'];
            $publication->publication_text = $_POST['publication_text'];
            $publication->publication_status = $_POST['publication_status'];
            $publication->update();
            header('Location: /Publication/index');
            exit;
        } else {
            $this->view('Publication/edit', ['publication' => $publication]);
        }
    }

    public function delete($publication_id){
        $publicationModel = new \app\models\Publication();
        $publication = $publicationModel->get($publication_id);

        if(!$publication) {
            // Handle case when publication is not found
            header('Location: /Publication/index');
            exit;
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $publication->delete();
            header('Location: /Publication/index');
            exit;
        } else {
            $this->view('Publication/delete', ['publication' => $publication]);
        }
    }
}
