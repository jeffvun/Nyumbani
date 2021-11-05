<?php

namespace App\Controllers;
use App\Models\Property;
use App\Models\PropertyDetailsModel;

class Properties extends BaseController
{
    public function index($id)
    {
        $db = db_connect();
        $property = new PropertyDetailsModel($db);
        $props = $property->getPropertyDetails($id);
        return json_encode($props);





















        
        //Only for display purposes

        // echo "<pre>";
        // print_r($props);
        // echo "</pre>";
        // $data = ['properties'=>json_encode($props)];
        // return view('properties', $data);
    }

}