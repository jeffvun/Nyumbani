<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\RequestsModel;

class Requests extends BaseController{

    use ResponseTrait;


    public function index($id){
        $request = new RequestsModel(); 
        $results = $request->getRequests($id); 

        return $this->respond($results);
        
        #For Testing Purporse
        // echo "<pre>";
        // print_r($results);
        // echo "</pre>"; 

        // $data = ['ViewRequests'=>json_encode($results)];

        // return view('ViewRequests', $data);
    }

    public function addRequest() {
        return view('addrequest');
    }

    public function store () {
        $request = new RequestsModel();

        $data = [
            'propertyID' => $this->request->getPost('propertyID'),

            'requestMessage' => $this->request->getPost('requestMessage'),

          //  'requestStatus' => $this->request->getPost('requestStatus'),

            'dateCompleted' => $this->request->getPost('dateCompleted')
        ];

        $request->save($data);
    }

    public function viewRequests() {

        $request = new RequestsModel();
        
        $data['request'] = $request->findAll();

        return view('tenantviewrequest',$data);
    }

    public function edit($id) {
        $request = new RequestsModel();

        $data['request'] = $role->find($id);
        return view('editrequest',$data);
    }

}
