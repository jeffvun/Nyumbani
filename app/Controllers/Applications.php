<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\ApplicationsModel;

class Applications extends BaseController{

    use ResponseTrait;

    // Testing the view
    public function index(){
        $db = db_connect();
        $application = new ApplicationsModel($db);     

        $results = $application->getApplications(1);

        return $this->respond($results);

        #For Testing Purporse
        // echo "<pre>";
        // print_r($results);
        // echo "</pre>"; 
        // $data = ['ViewApplications'=>json_encode($results)];

        // return view('ViewApplications', $data);
    }
}