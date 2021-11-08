<?php

namespace App\Controllers;
use App\Models\Property2;
use App\Models\PropertyListingModel;

class Listing  extends BaseController
{
    public function index()
    {
        $db = db_connect();
        $property = new PropertyListingModel($db);
        $props = $property->getPropertyListing($id);

        //Only for display purposes
        echo "<pre>";
        print_r($props);
        echo "</pre>";
        $data = ['properties'=>json_encode($props)];
        return view('properties', $data);
    }
}