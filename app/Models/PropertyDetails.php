<?php namespace APP\Models;

use CodeIgniter\Model;

class PropertyDetails extends Model{

    protected $table = "tbl_propertydetails";
    protected $primaryKey = "propertyID";
    protected $allowedFields = ["propertyID","landSize", "propertySize", "dateBuilt", "bedrooms","bathrooms"];
    
    // Added more allowed fields after I solved db problem


}
