<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\RentedPropertiesModel;

class RentedProperties extends BaseController
{
    use ResponseTrait;

    public function index($id)
    {

    }

    public function getPropertyDetailsByTenantId($id){
        $db = db_connect();
        $rentedPropertiesModel = new RentedPropertiesModel($db);
        $rentedProperties = $rentedPropertiesModel->getPropertyDetailsByTenantId($id);
        // return $this->respond($lists);
        $data = json_encode($rentedProperties);
        return $data;

    }

    public function getPropertyDetailsByPropertyId($id){
        $db = db_connect();
        $rentedPropertiesModel = new RentedPropertiesModel($db);
        $propertyDetails = $rentedPropertiesModel->getPropertyDetailsByPropertyId($id);
        // return $this->respond($lists);
        $data = json_encode($propertyDetails);
        return $data;

    }

}
