<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\Property2;
use App\Models\PropertyListingModel;

class Listing extends BaseController
{
    use ResponseTrait;

    public function index($id)
    {
        $db = db_connect();
        $property = new PropertyListingModel($db);
        $lists = $property->getPropertyListing($id);



        return $this->respond($lists);

        //Only for display purposes
        // echo "<pre>";
        // print_r($lists);
        // echo "</pre>";

        // $data = ['listings'=>json_encode($lists)];
        // return view('listings', $data);
    }

    public function getListings(){
        $db = db_connect();
        $property = new PropertyListingModel($db);
        $lists = $property->getAllListings();

        return $this->respond($lists);

        // $data = ['listings'=>json_encode($lists)];
        // return view('browseListings', $data);

    }

    public function getSingleListing($id){
        $db = db_connect();
        $property = new PropertyListingModel($db);
        $lists = $property->getSingleListing($id);

        return $this->respond($lists);

        // $data = ['listings'=>json_encode($lists)];
        // return view('browseListings', $data);

    }

}