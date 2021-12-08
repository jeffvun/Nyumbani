<?php namespace App\Models;
use CodeIgniter\Model;

use CodeIgniter\Database\ConnectionInterface;

class PropertyDetailsModel{

    protected $db;

    //Set the db variable to the reference of connected db
    public function __construct(ConnectionInterface &$db){
        $this->db = & $db;
    }

    public function getPropertyDetails($id){
        //Initializing query builder
        $builder = $this->db->table('tbl_property');
        $builder->join("tbl_users", "tbl_property.tenantID = tbl_users.userID",  "left");
        $builder->join("tbl_propertymedia", "tbl_property.propertyID = tbl_propertymedia.propertyID", "left");
        $builder->join("tbl_propertydetails", "tbl_property.propertyID = tbl_propertydetails.propertyID",  "left");
        $builder->where("ownerID", $id);
        $query=$builder->get();

        return $query->getResult();

    }

}