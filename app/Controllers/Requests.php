<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\RequestsModel;

class Requests extends BaseController{

    use ResponseTrait;

    public function index(){
        $request = new RequestsModel(); 
        $results = $request->getRequests(1); 

        return $this->respond($results);
        
        #For Testing Purporse
        // echo "<pre>";
        // print_r($results);
        // echo "</pre>"; 

        // $data = ['ViewRequests'=>json_encode($results)];

        // return view('ViewRequests', $data);
    }
}