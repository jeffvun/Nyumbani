<?php

namespace App\Controllers;

use App\Models\ApplicationsModel;

class Applications extends BaseController{

    private $application ='';
    
    // Testing the view
    public function index(){
        $db = db_connect();
        $this->application = new ApplicationsModel($db); 

        $results = $application->getApplications(1); 
        $data = ['Applications'=>json_encode($results)];
        echo view('Applications',$data);
    }
}