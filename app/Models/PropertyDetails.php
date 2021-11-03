<?php namespace APP\Models;

use CodeIgniter\Model;

class PropertyDetails extends Model{

    protected $table = "tbl_propertydetails";
    protected $primaryKey = "propertyID";
    protected $allowedFields = ["propertyID","landSize","bedrooms","bathrooms"];
    // Will add other allowed fields later, these are the ones needed so far

}
