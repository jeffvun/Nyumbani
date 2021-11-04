<?php namespace APP\Models;

use CodeIgniter\Model;

class Property extends Model{

    protected $table = "tbl_property";
    protected $primaryKey = "propertyID";
    /*Spell check these.. Left out some tables as well, confirm with db */
    //This nigga really wrote prOpeRtYpRice and asked us to spell check :')
    protected $allowedFields = ["tenantID","propertyCounty","propertyPhysicalAddress","propertyType", "isDeleted", "ownerID", "propertyDescription", "propertyRent", "thumbnailPhoto"];
}
