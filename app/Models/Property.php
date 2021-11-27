<?php namespace APP\Models;

use CodeIgniter\Model;

class Property extends Model{

    protected $table = "tbl_property";
    protected $primaryKey = "propertyID";
    protected $allowedFields = ["tenantID","propertyCounty","propertyPhysicalAddress","propertyType", "isDeleted", "ownerID", "propertyDescription", "propertyRent", "thumbnailPhoto"];

    public function getLocationStatistics(){
        $query = $this->db->query('SELECT COUNT(*) AS total, propertyCounty FROM `tbl_property` GROUP BY propertyCounty');
        
        $counties=[];
        $totals=[];
        $data=[];
        foreach($query->getResult() as $entry){
            array_push($counties, $entry->propertyCounty);
            array_push($totals, $entry->total);

        }

        $data['counties'] = $counties;
        $data['totals'] = $totals;


        return $data;
    }
}