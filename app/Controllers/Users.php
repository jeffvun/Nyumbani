<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\User;

class Users extends BaseController{

    use ResponseTrait;


    public function usersChartData(){

     
        if($this->request->getMethod() == 'post'){
            $data = $this->request->getPost('filter');
            $udetails = new User();
            $props = $udetails->getUserChartData($data);
            return $this->respond($props);

        }
        
    }

}