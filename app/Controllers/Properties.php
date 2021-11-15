<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\Property;
use App\Models\PropertyDetailsModel;

class Properties extends BaseController
{
    use ResponseTrait;
    
    public function index($id)
    {
        
        $db = db_connect();
        $property = new PropertyDetailsModel($db);
        $props = $property->getPropertyDetails($id);

        return $this->respond($props);
        // return json_encode($props);


        
        //Only for display purposes

        // echo "<pre>";
        // print_r($props);
        // echo "</pre>";
        // $data = ['properties'=>json_encode($props)];
        // return view('properties', $data);
    }

}