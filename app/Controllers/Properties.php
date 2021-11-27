<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\Property;
use App\Models\PropertyDetailsModel;
use App\Models\PropertyDetails;


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

    public function propertyChartData(){

        if($this->request->getMethod() == 'post'){
            $data = $this->request->getPost('filter');
            $pdetails = new PropertyDetails();
            $props = $pdetails->getPropertyStatistics($data);
            return $this->respond($props);

        }
        return view('charts');
    }

    public function propertyLocationChartData(){
        $pdetails = new Property();
        $props = $pdetails->getLocationStatistics();
        return $this->respond($props);
    }

    

}