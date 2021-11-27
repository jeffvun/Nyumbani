<?php namespace APP\Models;

use CodeIgniter\Model;

class PropertyDetails extends Model{

    protected $table = "tbl_propertydetails";
    protected $primaryKey = "propertyID";
    protected $allowedFields = ["propertyID","landSize", "propertySize", "dateBuilt", "bedrooms","bathrooms", "propertyFeatures", "availability"];
    
    // Added more allowed fields after I solved db problem





    //Gets data needed for properties charts
    public function getPropertyStatistics($id){

        $data = [];
        $values = [];

        //Filtering by availability of properties
        if ($id == 1){
            $data = ["labels" => ['Rented', 'Vacant'] ];
            $query = $this->db->query('SELECT COUNT(*) AS total, availability FROM `tbl_propertydetails` GROUP BY (availability)');
            
            foreach($query->getResult() as $entry){
                array_push($values, $entry->total);
            }
            $data["numbers"] = $values;

        }

        //Filtering by verification status of properties
        else if ($id == 2){
            $data = ["labels" => ['Verified', 'Unverified'] ];
            $query = $this->db->query('SELECT COUNT(*) AS total, isVerified FROM `tbl_property` WHERE isDeleted=0 GROUP BY (isVerified) ORDER BY isVerified DESC');
            foreach($query->getResult() as $entry){
                array_push($values, $entry->total);
            }
            $data["numbers"] = $values;
        }

        else if ($id == 3){
            $labels= [];
            $query = $this->db->query('SELECT COUNT(*)as total, propertyType FROM `tbl_property` WHERE isDeleted = 0 GROUP BY propertyType');
            foreach($query->getResult() as $entry){
                array_push($values, $entry->total);
                array_push($labels, $entry->propertyType);

            }
            $data["numbers"] = $values;
            $data["labels"] = $labels;

        }
        
        return $data;

    } 

}