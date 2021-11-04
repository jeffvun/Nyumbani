<?php namespace APP\Models;

use CodeIgniter\Model;

class PropertyMedia extends Model{

    protected $table = "tbl_propertymedia";
    protected $primaryKey = "propertyID";
    protected $allowedFields = ["propertyID","videoLink","otherImages"];
    // Pretty conclusive

}
