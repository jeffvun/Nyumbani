<?php namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class PropertyListingModel extends Model{

    protected $db;
    
    //Set the db variable to the reference of connected db
    public function __construct(ConnectionInterface &$db){
        $this->db = & $db;
    }

    public function getPropertyListing($ownerid){
        //Initializing query builder
        $builder = $this->db->table('tbl_listings');
        $builder->join("tbl_property", "tbl_listings.propertyID = tbl_property.propertyID",  "left");
        $builder->join("tbl_users", "tbl_property.ownerID = tbl_users.userID",  "left");
        $builder->join("tbl_propertydetails", "tbl_property.propertyID = tbl_propertydetails.propertyID",  "left");
        $builder->join("tbl_propertymedia", "tbl_propertydetails.propertyID = tbl_propertymedia.propertyID",  "left");
        $builder->where("tbl_property.ownerID", $ownerid);
        $query=$builder->get();

        return $query->getResult();
    }

    public function getAllListings(){
        
        $builder = $this->db->table('tbl_listings');
        $builder->join("tbl_property", "tbl_listings.propertyID = tbl_property.propertyID",  "left");
        $builder->join("tbl_users", "tbl_property.ownerID = tbl_users.userID",  "left");
        $builder->join("tbl_propertydetails", "tbl_property.propertyID = tbl_propertydetails.propertyID",  "left");
        $builder->join("tbl_propertymedia", "tbl_propertydetails.propertyID = tbl_propertymedia.propertyID",  "left");
        $builder->where("tbl_listings.isDeleted", 0);
        $query=$builder->get();

        return $query->getResult();
    }

    public function getSingleListing($propid){
        
        $builder = $this->db->table('tbl_listings');
        $builder->join("tbl_property", "tbl_listings.propertyID = tbl_property.propertyID",  "left");
        $builder->join("tbl_users", "tbl_property.ownerID = tbl_users.userID",  "left");
        $builder->join("tbl_propertydetails", "tbl_property.propertyID = tbl_propertydetails.propertyID",  "left");
        $builder->join("tbl_propertymedia", "tbl_propertydetails.propertyID = tbl_propertymedia.propertyID",  "left");
        $builder->where("tbl_listings.isDeleted", 0)->where("tbl_listings.listingID", $propid);
        $query=$builder->get();

        return $query->getResult();
    }

}