<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class RentedPropertiesModel{

    protected $db;

    //Set the db variable to the reference of connected db
    public function __construct(ConnectionInterface &$db){
        $this->db = & $db;
    }

    public function getPropertyDetailsByTenantId($id){
        //Initializing query builder
        $builder = $this->db->table('tbl_property')->select('propertyDescription, propertyRent, rentDueDate, thumbnailPhoto');
        $builder->where("tenantID", $id);
        $query=$builder->get();
        return $query->getResult();

    }

    public function getPropertyDetailsByPropertyId($id){
        //Initializing query builder
        $builder = $this->db->table('tbl_property')->select('propertyDescription, propertyType, propertyCounty, propertyPhysicalAddress, propertyRent, thumbnailPhoto');
        $builder->join("tbl_propertymedia", "tbl_property.propertyID = tbl_propertymedia.propertyID", "left")->select('videoLink, otherImages');
        $builder->join("tbl_users", "tbl_property.ownerID = tbl_users.userID",  "left")->select('firstName, lastName, email');
        $builder->where("tbl_property.propertyID", $id);
        $query=$builder->get();

        return $query->getResult();

    }

}
