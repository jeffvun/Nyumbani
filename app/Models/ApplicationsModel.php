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

        $App = 'tbl_applications'; 
        $Users = 'tbl_users';
        $Lists ='tbl_listings';
        $Prop ='tbl_property';

        $builder = $this->db->table($App);
        $builder->select($Users.'firstName', $Users.'email', $Prop.'propertyDescription', $App.'application_date');
        $builder->join($Users,"tbl_applications.applicantID = tbl_users.userID");
        $builder->join($Lists,"tbl_applications.listingID = tbl_listings.listingID");
        $builder->join($Prop, $Lists."propertyID = tbl_property.propertyID");
        $builder->where($Prop.'ownerID', $id);
    
        $data = $builder->get()->getResult();

        return $data;
    }
}