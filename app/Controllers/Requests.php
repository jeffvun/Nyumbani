<?php

namespace App\Controllers;
use App\Models\RequestsModel;

class Requests extends BaseController{

    public function index($id){
        $request = new RequestsModel(); 
        $results = $request->getRequests($id); 

        // return json_encode($results);
        
        #For Testing Purporse
        echo "<pre>";
        print_r($results);
        echo "</pre>"; 

        $data = ['ViewRequests'=>json_encode($results)];
        return view('ViewRequests', $data);
    }
}