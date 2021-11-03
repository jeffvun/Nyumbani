<?php namespace APP\Models;

use CodeIgniter\Model;

class Property2 extends Model{

    protected $table = "tbl_listings";
    protected $primaryKey = "listingID";
    /*Spell check these.. Left out some tables as well, confirm with db */
    protected $allowedFields = ["listingID","propertyID", "isDeleted"];
    

}