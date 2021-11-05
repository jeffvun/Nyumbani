<?php
//taking a json as the parameter
//json is decoded and split into separate variables
//variables are validated
//As of now assuming frontend validation
//After validation the model is used to insert them into the database

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Property;
use App\Models\PropertyDetails;
use App\Models\PropertyMedia;

class AddProperty extends BaseController{

    public function index() {
      //Dummy data used to work on models
      //Ideally should be passed in as a parameter in index()
      $json = '{
                  "ownerID": "7",
                  "propertyType": "Villa",
                  "propertyCounty": "Kisumu",
                  "propertyPhysicalAddress": "Tempore similique a",
                  "propertyDescription": "Elit placeat quide",
                  "propertyRent": "Ipsum pariatur Tot",
                  "propertySize": "18",
                  "landSize": "97",
                  "bedrooms": "5",
                  "bathrooms": "5",
                  "elevator": [
                    "1"
                  ],
                  "parking": [
                    "1"
                  ]
                }';
      $assoc_array = json_decode($json, true);
      print_r ($assoc_array);
      //Having issues moving links using JSON
      $ownerID = $assoc_array['ownerID'];
      //$thumbnailPhoto = $assoc_array['thumbnailPhoto'];
      $propertyType = $assoc_array['propertyType'];
      $propertyPhysicalAddress = $assoc_array['propertyPhysicalAddress'];
      $propertyDescription = $assoc_array['propertyDescription'];
      $propertyCounty = $assoc_array['propertyCounty'];
      $propertyRent = $assoc_array['propertyRent'];
      //$otherPhotos = $assoc_array['otherPhotos'];
      //$videoLink = $assoc_array['videoLink'];
      $propertySize = $assoc_array['propertySize'];
      $landSize = $assoc_array['landSize'];
      $bedrooms = $assoc_array['bedrooms'];
      $bathrooms = $assoc_array['bathrooms'];
      echo $ownerID;

      //Splitting the incoming data into appropriate arrays for passing to Models

      //For PropertyModel
      $data1 = [
          'ownerID' => $ownerID,
          'propertyDescription'    => $propertyDescription,
          'propertyCounty' => $propertyCounty,
          'propertyPhysicalAddress'    => $propertyPhysicalAddress,
          'propertyType' => $propertyType,
          'propertyRent'    => $propertyRent,
      ];
      //No thumbnailPhoto yet...Working on it

      //For PropertyDetailsModel
      $data2 = [
        'landSize' => $landSize,
        'bedrooms' => $rooms,
        'bathrooms' => $bathrooms,
      ];
      // I have ignored dateBuilt and propertyFeatures for now

      // For PropertyMedia
      $data3 = [
        'videoLink' => $videoLink,
        'otherImages' => $otherImage,
      ];

      //Working with Models

      $db = db_connect();
      $propertyModel = new Property($db);
      // $propertydetailsModel = new PropertyDetails($db);
      // $propertymediaModel = new PropertyMedia($db);
      $propertyModel->insert($data1);
      // $propertydetailsModel->insert($data2);
      // $propertymediaModel->insert($data3);

      //Waiting for database guys to review request to merge all tables
      //that contain property information into one...
      //So far only inserting into one table

    }

    public function dummyview() {
      echo view('addpropertydummyview');
    }
}