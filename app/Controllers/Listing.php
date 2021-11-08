<?php

namespace App\Controllers;
use App\Models\Property2;
use App\Models\PropertyListingModel;

class Listing extends BaseController
{
    public function index($id)
    {
        $db = db_connect();
        $property = new PropertyListingModel($db);
        $lists = $property->getPropertyListing($id);

        // return json_encode($results);

        //Only for display purposes
        echo "<pre>";
        print_r($lists);
        echo "</pre>";

        $data = ['listings'=>json_encode($lists)];
        return view('listings', $data);
    }
}