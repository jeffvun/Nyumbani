<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\Property2;
use App\Models\PropertyListingModel;

class Listing extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $db = db_connect();
        $property = new PropertyListingModel($db);
        $lists = $property->getPropertyListing(2);

        // return json_encode($lists);
        return $this->respond($lists);

        //Only for display purposes
        // echo "<pre>";
        // print_r($lists);
        // echo "</pre>";

        // $data = ['listings'=>json_encode($lists)];
        // return view('listings', $data);
    }
}