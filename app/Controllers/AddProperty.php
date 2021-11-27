<?php
//taking a json as the parameter
//json is decoded and split into separate variables
//After validation the model is used to insert them into the database

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Property;
use App\Models\PropertyModel;
use App\Models\PropertyDetails;
use App\Models\PropertyMedia;


class AddProperty extends BaseController{


    public function index() {

      //Dummy data used to work on models

      // $json = '{
      //   "ownerID": "2",
      //   "thumbnailPhoto": "test.png",
      //   "propertyType": "Villa",
      //   "propertyCounty": "Mombasa",
      //   "propertyPhysicalAddress": "Tempore maxime dolo",
      //   "propertyDescription": "Molestias culpa dolo",
      //   "propertyRent": "50000",
      //   "otherImages": {
      //     "1": "pic1.jpg",
      //     "2": "pic2.jpg"
      //   },
      //   "dateBuilt": "24-12-2020",
      //   "videoLink": "https://youtu.be/dQw4w9WgXcQ",
      //   "propertySize": "15",
      //   "landSize": "22",
      //   "bedrooms": "5",
      //   "bathrooms": "2",
      //   "propertyFeatures": {
          
      //       "balcony":"1",
      //       "security":"0",
      //       "laundry":"0",
      //       "elevator":"0",
      //       "parking":"1"
         
      //   }
      // }';

      //     $assoc_array = json_decode($json, true);
      //     echo "<pre>"; var_dump($assoc_array['otherImages']);die();



      if($this->request->getMethod() == 'post'){

          $json = $this->request->getJSON();


          // $assoc_array = json_decode($json, true);
          $assoc_array = $json;
          

          $ownerID = $assoc_array->ownerID;
          $thumbnailPhoto = $assoc_array->thumbnailPhoto;
          $propertyType = $assoc_array->propertyType;
          $propertyPhysicalAddress = $assoc_array->propertyPhysicalAddress;
          $propertyDescription = $assoc_array->propertyDescription;
          $dateBuilt = $assoc_array->dateBuilt;
          $propertyCounty = $assoc_array->propertyCounty;
          $propertyRent = $assoc_array->propertyRent;
          $otherImages = json_encode($assoc_array->otherImages);
          $videoLink = $assoc_array->videoLink;
          $propertySize = $assoc_array->propertySize;
          $landSize = $assoc_array->landSize;
          $bedrooms = $assoc_array->bedrooms;
          $bathrooms = $assoc_array->bathrooms;
          $propertyFeatures = json_encode($assoc_array->propertyFeatures);

          


          // $ownerID = $assoc_array['ownerID'];
          // $thumbnailPhoto = $assoc_array['thumbnailPhoto'];
          // $propertyType = $assoc_array['propertyType'];
          // $propertyPhysicalAddress = $assoc_array['propertyPhysicalAddress'];
          // $propertyDescription = $assoc_array['propertyDescription'];
          // $dateBuilt = $assoc_array['dateBuilt'];
          // $propertyCounty = $assoc_array['propertyCounty'];
          // $propertyRent = $assoc_array['propertyRent'];
          // $otherImages = json_encode($assoc_array['otherImages']);
          // $videoLink = $assoc_array['videoLink'];
          // $propertySize = $assoc_array['propertySize'];
          // $landSize = $assoc_array['landSize'];
          // $bedrooms = $assoc_array['bedrooms'];
          // $bathrooms = $assoc_array['bathrooms'];
          // $propertyFeatures = json_encode($assoc_array['propertyFeatures']);

          // Splitting the incoming data into appropriate arrays for passing to Models

          //For PropertyModel
          $data1 = [
              'ownerID' => $ownerID,
              'propertyDescription'    => $propertyDescription,
              'propertyCounty' => $propertyCounty,
              'propertyPhysicalAddress'    => $propertyPhysicalAddress,
              'propertyType' => $propertyType,
              'propertyRent'    => $propertyRent,
              'thumbnailPhoto' => $thumbnailPhoto,
          ];

          //Working with Models
          $db = db_connect();
          $propertyModel = new PropertyModel($db);
          $propertydetailsModel = new PropertyDetails();
          $propertymediaModel = new PropertyMedia();
          $propertyID = $propertyModel->addProperty($data1);

          //For PropertyDetailsModel
          $data2 = [
            'propertyID' => $propertyID,
            'landSize' => $landSize,
            'propertySize' => $propertySize,
            'bedrooms' => $bedrooms,
            'bathrooms' => $bathrooms,
            'dateBuilt' => $dateBuilt,
            'propertyFeatures' => $propertyFeatures,
          ];
          $propertydetailsModel->insert($data2);

          // For PropertyMedia
          $data3 = [
            'propertyID' => $propertyID,
            'otherImages'=> $otherImages,
            'videoLink'=> $videoLink,
          ];
          $propertymediaModel->insert($data3);

          return 'Success';
      }
    }

    public function dummyview() {
      echo view('addpropertydummyview');
    }

}