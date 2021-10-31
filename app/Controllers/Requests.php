<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Requests extends BaseController{

    private $request ='';
    public function __construct(){
        $this->request = new RequestsModel();       
    }
    public function index(){
        $results = $request->getRequests(1); 
        $data = ['Requests'=>json_encode($results)];
        echo view('Request', $data);
    }
}