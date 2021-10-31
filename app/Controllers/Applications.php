<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Applications extends BaseController{

    private $application ='';
    public function __construct(){
        $this->application = new ApplicationsModel();       
    }

    // Testing the view
    public function index(){
        $results = $application->getApplications(1); 
        $data = ['Applications'=>json_encode($results)];
        echo view('Applications',$data);
    }
}