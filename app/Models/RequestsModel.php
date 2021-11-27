<?php 

namespace App\Models;
use CodeIgniter\Model;

class RequestsModel extends Model{

    protected $table = "tbl_requests";
    protected $primaryKey = "requestID";

    protected $allowedFields = [
        'propertyID',
        'requestMessage',
       // 'requestStatus',
        //'dateCompleted'
    ];

    protected $db;

    public function __construct() {
        $this->db = db_connect(); // Loading database
    }

    # get all requests from all the properties of the propertyowner
    # Provided the propertyOwner is logged into the system with ownerid=$id
    public function getRequests($id){

        $builder = $this->db->table('tbl_requests');

        $builder->select
        ('tbl_users.firstName, tbl_requests.dateRequested, tbl_requests.dateCompleted, tbl_property.propertyPhysicalAddress, tbl_requests.requestMessage');
        $builder->join('tbl_property', 'tbl_requests.propertyID = tbl_property.propertyID');
        $builder->join('tbl_users', 'tbl_property.TenantID = tbl_users.userID');
        $builder->where('tbl_property.ownerID', $id);
    
        $data = $builder->get()->getResult();

        return $data;
    }

}