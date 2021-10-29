<?php namespace APP\Models;

use CodeIgniter\Model;

class Property extends Model{

    protected $table = "tbl_property";
    protected $primaryKey = "propertyID";
    /*Spell check these.. Left out some tables as well, confirm with db */
    protected $allowedFields = ["tenantID","propertyCounty","propertyPhysicalAddress","propertyType", "propertyPrice", "isDeleted"];
    

}