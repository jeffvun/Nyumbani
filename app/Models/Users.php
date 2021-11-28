<?php namespace APP\Models;

use CodeIgniter\Model;

class Users extends Model{

    protected $table = "tbl_users";
    protected $primaryKey = "userID";
    protected $allowedFields = ["userID","firstName","lastName","email","role","password"];
    protected $validationRules    = [
        'firstName'     => 'required|min_length[3]',
        'lastName'     => 'required|min_length[3]',
        'email'        => 'required|valid_email|is_unique[tbl_users.email]',
        'role'     => 'required',
        'password'     => 'required|min_length[3]',
    ];
    protected $validationMessages = [
        'email'        => [
            'is_unique' => 'Sorry. That email has already been taken. Please choose another.',
        ],
        'firstName'        => [
            'min_length' => 'Name too short.',
        ],
        'lastName'        => [
            'min_length' => 'Name too short.',
        ],

    ];

    public function verifyLoginDetails($userID,$userPassword) {
      $builder = $this->db->table('tbl_users')->select('userID, password');
      $builder->where("userID", $userID);
      $query = $builder->get();
      $array = $query->getResultArray();

      foreach ($query->getResultArray() as $row) {
          $password = $row['password'];
      }

      if ($password == $userPassword) {
        return true;
      }

      else {
        return false;
      }
    }
}
