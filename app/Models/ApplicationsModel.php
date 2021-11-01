<?php 

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class ApplicationsModel extends Model{

    private $db;

    public function __construct(ConnectionInterface &$db) {
        // $this->db = db_connect();  Loading database
        $this->db = & $db;
    }
    
    protected $App = 'tbl_applications'; 
    protected $Users = 'tbl_users';
    protected $Lists ='tbl_listings';
    protected $Prop ='tbl_property';

    # get all applications from all the properties of propertyowner
    # Provided the propertyOwner is logged into the system with ownerid=$id
    public function getApplications($id){

        $builder = $this->db->table($App);
        $builder->select($Users.'firstName', $Users.'email', $Prop.'propertyDescription', $App.'application_date');
        $builder->join($Users, $App.'applicantID' = $Users.'userID');
        $builder->join($Lists, $App.'listingID' = $Lists.'listingID');
        $builder->join($Prop, $Lists.'propertyID' = $Prop.'propertyID');
        $builder->where($Prop.'ownerID', $id);
    
        $data = $builder->get()->getResult();

        return $data;
    }
}