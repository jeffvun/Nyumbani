<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Users;

class UserAuthorization extends BaseController{

    public function login() {
      if($this->request->getMethod() == 'post'){

          $json = $this->request->getJSON();
          $assoc_array = $json;

          $userID = $assoc_array->userID;
          $userPassword = $assoc_array->userPassword;

          $db = db_connect();
          $users = new Users();

          if ($users->verifyLoginDetails($userID,$userPassword)) {
            return true;
          }
          else {
            return false;
          }
      }
    }

    public function register() {
      if($this->request->getMethod() == 'post'){

          $json = $this->request->getJSON();
          $assoc_array = $json;

          $firstName = $assoc_array->firstName;
          $lastName = $assoc_array->lastName;
          $email = $assoc_array->email;
          $role = $assoc_array->role;
          $password = $assoc_array->password;
          $passwordConfirm = $assoc_array->passwordConfirm;

          if ($password == $passwordConfirm)  {
            // For converting role name to role id for insertio
            if ($role == 'Administrator') {
              $role = 1;
            }
            elseif ($role == 'Owner') {
              $role = 2;
            }
            elseif ($role == 'Tenant') {
              $role = 3;
            }
            $data = [
                'firstName'    => $firstName,
                'lastName' => $lastName,
                'email'    => $email,
                'role' => $role,
                'password' => $password,
            ];

            $db = db_connect();
            $users = new Users();
            $result = $users->insert($data);
            if ($result == true) {
              return true;
            }
            else {
              return false;
            }
          }

          else {
            return false;
          }
      }
    }

}
