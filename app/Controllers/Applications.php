<?php

namespace App\Controllers;
use App\Models\ApplicationsModel;

class Applications extends BaseController{

    // Testing the view
    public function index(){
        $db = db_connect();
        $application = new ApplicationsModel($db); 
        $results = $application->getApplications(1);

        return json_encode($results);

        #For Testing Purporse
        // echo "<pre>";
        // print_r($results);
        // echo "</pre>"; 
        
        // $data = ['ViewApplications'=>json_encode($results)];

        // return view('ViewApplications', $data);
    }
}