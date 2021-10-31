<?php 

namespace App\Models;
use CodeIgniter\Model;

class RequestsModel extends Model{
    private $db;

    public function __construct() {
        $this->db = db_connect(); // Loading database
    }

    protected $table = 'tbl_requets'; 
    protected $Users = 'tbl_users';
    protected $Prop ='tbl_property';

    # get all requests from all the properties of the propertyowner
    # Provided the propertyOwner is logged into the system with ownerid=$id
    public function getRequests($id){

        $builder = $this->db->table($table);
        $builder->select($Users.'firstName', $table.'requestMessage', $Prop.'propertyPhysicalAddress', $table.'dateRequested', $table.'dateCompleted');
        $builder->join($Prop, $table.'propertyID' = $Prop.'propertyID');
        $builder->join($Users, $Prop.'TenantID' = $Users.'userID');
        $builder->where($Prop.'ownerID', $id);
    
        $data = $builder->get()->getResult();

        return $data;
    }

}