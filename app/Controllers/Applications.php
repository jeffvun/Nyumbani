<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\ApplicationsModel;

class Applications extends BaseController{

    use ResponseTrait;

    // Testing the view
    public function index($id){
        $db = db_connect();
        $application = new ApplicationsModel($db);     

        $results = $application->getApplications($id);

        return $this->respond($results);

        #For Testing Purporse
        // echo "<pre>";
        // print_r($results);
        // echo "</pre>"; 
        // $data = ['ViewApplications'=>json_encode($results)];

        // return view('ViewApplications', $data);
    }

    public function applicationData(){

        $db = db_connect();
        $application = new ApplicationsModel($db);
        
        $data=[];
        $totals=[];
        $labels=[];

        if($this->request->getMethod() == 'post'){
            $filter =  $this->request->getPost('filter');


            if ($filter == 2){
                $result = $application->getApplicationsByMonth(date('Y'));
                $labels=['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                $totals=[0,0,0,0,0,0,0,0,0,0,0,0];

                foreach($result as $stat){
                    $index = (int)$stat->month - 1;
                    $totals[$index] = (int)$stat->total;

                }
                $data['labels'] = $labels;
                $data['totals'] = $totals;
                
            }
            if ($filter == 3){
                $result = $application->getApplicationsByYear();
                foreach($result as $stat){
                    array_push($labels, $stat->year);
                    array_push($totals, $stat->total);
                }
                $data['labels'] = $labels;
                $data['totals'] = $totals;
            }

            return $this->respond($data);
        }
    

        
    }
}