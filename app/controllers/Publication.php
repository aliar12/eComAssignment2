<<<<<<< Updated upstream
=======
<?php
namespace app\controllers;

use app\models\Publication;

class Publication extends \app\core\Controller
{
    public function index()
    {
        // Create a new Publication model instance
        $publication = new Publication();
        
        // Fetch all publications from the database
        $publications = $publication->getAll();
        
        // Load the view with all publications
        $this->view('Publication/index', ['publications' => $publications]);
    }

    public function create()
    {
        // Create a new publication object
        $publication = new Publication();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Check if the profile ID is set in the session
            if (isset($_SESSION['profile_id']) && $_SESSION['profile_id'] !== '') {
                // Populate the publication object
                $publication->profile_id = $_SESSION['profile_id'];
                $publication->publication_title = $_POST['publication_title'];
                $publication->publication_text = $_POST['publication_text'];
                $publication->publication_status = $_POST['publication_status'];
                
                // Insert the publication into the database
                $publication->insert();
                
                // Redirect to the index page
                header('Location: /Publication/index');
                exit;
            } else {
                // If the profile ID is not set in the session, redirect to the profile creation page
                header('Location: /Profile/create');
                exit;
            }
        }
        
        // If the request method is not POST, display the create publication form
        $this->view('Publication/create');
    }

    public function edit($publication_id)
    {
        // Your code for editing a publication goes here
    }

    public function delete($publication_id)
    {
        // Your code for deleting a publication goes here
    }
}

>>>>>>> Stashed changes
