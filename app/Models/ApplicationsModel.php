<?php 

namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class ApplicationsModel extends Model{

    protected $db;

    public function __construct(ConnectionInterface &$db) {
        // $this->db = db_connect();  Loading database
        $this->db = & $db;
    }
    

    # get all applications from all the properties of propertyowner
    # Provided the propertyOwner is logged into the system with ownerid=$id
    public function getApplications($id){

        $builder = $this->db->table('tbl_applications');
        $builder->select("tbl_users.firstName, tbl_users.lastName, tbl_users.email, tbl_property.propertyDescription, tbl_applications.application_date");
        $builder->join("tbl_users","tbl_applications.applicantID = tbl_users.userID");
        $builder->join("tbl_listings","tbl_applications.listingID = tbl_listings.listingID");
        $builder->join("tbl_property", "tbl_listings.propertyID = tbl_property.propertyID");
        $builder->where("tbl_property.ownerID", $id);
    
        $data = $builder->get()->getResult();

        return $data;
    }

    public function getApplicationsByMonth($year){
        
        $builder = $this->db->table('tbl_applications');
        $builder->select("COUNT(*) as total, MONTH(application_date) as month");
        $builder->where("YEAR(application_date)", $year);
        $builder->groupBy("MONTH(application_date)");
    
        $data = $builder->get();

        return $data->getResult();

    }

    public function getApplicationsByYear(){
        $builder = $this->db->table('tbl_applications');
        $builder->select("COUNT(*) as total, YEAR(application_date) as year");
        $builder->groupBy("YEAR(application_date)");
    
        $data = $builder->get();

        return $data->getResult();
    }

    
}