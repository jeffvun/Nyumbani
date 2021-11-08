<?php namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class PropertyListingModel extends Model{

    protected $db;
    
    //Set the db variable to the reference of connected db
    public function __construct(ConnectionInterface &$db){
        $this->db = & $db;
    }

    public function getPropertyListing($id){
        //Initializing query builder
        $builder = $this->db->table('tbl_listings');
        $builder->join("tbl_property", "tbl_listings.propertyID = tbl_property.propertyID",  "left");
        $builder->join("tbl_users", "tbl_property.tenantID = tbl_users.userID",  "left");
        $builder->join("tbl_propertydetails", "tbl_property.propertyID = tbl_propertydetails.propertyID",  "left");
        $builder->join("tbl_propertymedia", "tbl_propertydetails.propertyID = tbl_propertymedia.propertyID",  "left");
        $builder->where("tbl_property.ownerID", $id);
        $query=$builder->get();

        return $query->getResult();
    }

}