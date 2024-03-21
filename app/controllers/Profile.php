<?php
namespace app\controllers;

// Applying the Login condition to the whole class
#[\app\filters\Login]
class Profile extends \app\core\Controller{

<<<<<<< Updated upstream
	#[\app\filters\HasProfile]
	public function index(){
		$profile = new \app\models\Profile();
		$profile = $profile->getForUser($_SESSION['user_id']);

		//redirect a user that has no profile to the profile creation URL
		$this->view('Profile/index',$profile);
	}
=======
    #[\app\filters\HasProfile]
    public function index(){
        $profile = new \app\models\Profile();
        $profile = $profile->getForUser($_SESSION['user_id']);

        // Fetch publications for the current profile
        $publication = new \app\models\Publication();
        $publications = $publication->getForUser($profile->profile_id);
>>>>>>> Stashed changes

        // Pass profile and publications data to the view
        $this->view('Profile/index', ['profile' => $profile, 'publications' => $publications]);
    }
	public function create(){
<<<<<<< Updated upstream
		if($_SERVER['REQUEST_METHOD'] === 'POST'){//data is submitted through method POST
			//make a new profile object
			$profile = new \app\models\Profile();
			//populate it
			$profile->user_id = $_SESSION['user_id'];
			$profile->first_name = $_POST['first_name'];
			$profile->last_name = $_POST['last_name'];
			//insert it
			$profile->insert();
			//redirect
			header('location:/Profile/index');
		}else{
			$this->view('Profile/create');
		}
=======
	    if($_SERVER['REQUEST_METHOD'] === 'POST'){//data is submitted through method POST
	        // Make a new profile object
	        $profile = new \app\models\Profile();
	        // Populate it
	        $profile->user_id = $_SESSION['user_id'];
	        $profile->first_name = $_POST['first_name'];
	        $profile->middle_name = $_POST['middle_name'];
	        $profile->last_name = $_POST['last_name'];
	        // Insert it
	        $profile->insert();

	        // Set the profile ID in the session
	        $_SESSION['profile_id'] = $profile->profile_id;

	        // Redirect
	        header('location:/Profile/index');
	    }else{
	        $this->view('Profile/create');
	    }
>>>>>>> Stashed changes
	}
    public function modify(){
        $profile = new \app\models\Profile();
        $profile = $profile->getForUser($_SESSION['user_id']);

        if($_SERVER['REQUEST_METHOD'] === 'POST'){//data is submitted through method POST
            // Populate the profile object with updated data
            $profile->first_name = $_POST['first_name'];
            $profile->middle_name = $_POST['middle_name'];
            $profile->last_name = $_POST['last_name'];
            // Update the profile
            $profile->update();
            // Redirect
            header('location:/Profile/index');
        }else{
            $this->view('Profile/modify', $profile);
        }
    }

<<<<<<< Updated upstream
		if($_SERVER['REQUEST_METHOD'] === 'POST'){//data is submitted through method POST
			//make a new profile object
			//populate it
			$profile->first_name = $_POST['first_name'];
			$profile->last_name = $_POST['last_name'];
			//update it
			$profile->update();
			//redirect
			header('location:/Profile/index');
		}else{
			$this->view('Profile/modify', $profile);
		}
	}
=======
    public function delete(){
        $profile = new \app\models\Profile();
        $profile = $profile->getForUser($_SESSION['user_id']);
>>>>>>> Stashed changes

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $profile->delete();
            header('location:/Profile/index');
        }else{
            $this->view('Profile/delete',$profile);
        }
    }
}
