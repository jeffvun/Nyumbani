<?php namespace APP\Models;

use CodeIgniter\Model;

class User extends Model{

    protected $table = "tbl_property";
    protected $primaryKey = "propertyID";
    protected $allowedFields = ["userID","firstName","lastName","email", "role", "password", "joinDate", "isDeleted"];


    public function getUserChartData($id){
        

        $roles=[];
        $totals=[];
        $data=[];

        if($id == 1){
            $query = $this->db->query('SELECT COUNT(*) as total, roleName as role FROM `tbl_users` INNER JOIN `tbl_roles` ON `tbl_users`.`role`= `tbl_roles`.`roleID` WHERE `tbl_users`.`isDeleted`=0 GROUP BY role');
        
        
        foreach($query->getResult() as $entry){
            array_push($roles, $entry->role);
            array_push($totals, $entry->total);

        }

        $data['labels'] = $roles;
        $data['totals'] = $totals;

        }
        else if ($id == 2){
            $query = $this->db->query('SELECT COUNT(*) as blocked FROM `tbl_blockedusers`');
            $blocked_users = (int)$query->getResultArray()[0]['blocked'];

            $query = $this->db->query('SELECT COUNT(*) as total FROM `tbl_users` WHERE isDeleted=0');
            $total_users = (int)$query->getResultArray()[0]['total'];

            $unblocked_users = $total_users - $blocked_users;
            $roles = ["Unblocked", "Blocked"];
            $totals = [$unblocked_users, $blocked_users ];
            
            $data['labels'] = $roles;
            $data['totals'] = $totals;

        }
        


        return $data;
    }
}