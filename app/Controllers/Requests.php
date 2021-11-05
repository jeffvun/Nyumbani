<?php

namespace App\Controllers;
use App\Models\RequestsModel;

class Requests extends BaseController{

    public function index(){
        $request = new RequestsModel(); 
        $results = $request->getRequests(1); 

        // return json_encode($results);
        
        #For Testing Purporse
        echo "<pre>";
        print_r($results);
        echo "</pre>"; 

        $data = ['ViewRequests'=>json_encode($results)];

        return view('ViewRequests', $data);
    }
}