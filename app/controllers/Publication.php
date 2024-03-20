<?php
namespace app\controllers;

//applying the Login condition to the whole class
#[\app\filters\Login]
class Publication extends \app\core\Controller{

	#[\app\filters\HasProfile]
	public function index(){
		$publication = new \app\models\Publication();
		$publication = $publication->getForUser($_SESSION['profile_id']);

		//redirect a user that has no profile to the profile creation URL
		$this->view('Publication/index',$publication);
	}

	public function create(){
		if($_SERVER['REQUEST_METHOD'] === 'POST'){//data is submitted through method POST
			//make a new profile object
			$publication = new \app\models\Publication();
			//populate it
			$publication->profile_id = $_SESSION['profile_id'];
			$publication->publication_title = $_POST['publication_title'];
			$publication->publication_text = $_POST['publication_text'];
			$publication->publication_status = $_POST['publication_status'];
			//insert it
			$publication->insert();
			//redirect
			header('location:/Publication/index');
		}else{
			$this->view('Publication/create');
		}
	}

	public function modify(){
		$publication = new \app\models\Publication();
		$publication = $publication->getForUser($_SESSION['profile_id']);

		if($_SERVER['REQUEST_METHOD'] === 'POST'){//data is submitted through method POST
			//make a new profile object
			//populate it
			$publication->profile_id = $_SESSION['profile_id'];
			$publication->publication_title = $_POST['publication_title'];
			$publication->publication_text = $_POST['publication_text'];
			$publication->publication_status = $_POST['publication_status'];
			//update it
			$publication->update();
			//redirect
			header('location:/Publication/index');
		}else{
			$this->view('Publication/modify', $publication);
		}
	}

	public function delete(){
		//present the user with a form to confirm the deletion that is requested and delete if the form is submitted
/*		//make sure that the user is logged in
		if(!isset($_SESSION['user_id'])){
			header('location:/User/login');
			return;
		}
*/
		$publication = new \app\models\Publication();
		$publication = $publication->getForUser($_SESSION['profile_id']);

		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			$publication->delete();
			header('location:/Publication/index');
		}else{
			$this->view('Publication/delete',$publication);
		}
	}
}