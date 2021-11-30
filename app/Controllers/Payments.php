<?php

namespace App\Controllers;

use App\Models\PaymentModel;
use CodeIgniter\API\ResponseTrait;



class Payments extends BaseController
{
    use ResponseTrait;


/*HELPER FUNCTIONS START HERE*/





//Function that gets total expected Rent In a Month for all properties owned by a particular person page 15
    public function getallProperties($id)
    {

        $db = db_connect();
        $model = new PaymentModel($db);
        $result = $model->getallRentedProperties($id);


        $totalRent =0;

       foreach ($result as $property) {
            $totalRent += $property->propertyRent;
            
        }



       return $totalRent;
        /*echo "<pre>";
        print_r($result);
        echo "</pre>";*/

    }


//For a particular property
    public function getTotalRentPaid($propertyID)
    {
        
        $db = db_connect();
        $model = new PaymentModel($db);

        $result = $model->getTotalRentPaid($propertyID);

        $totalRentPaid =0;

        foreach ($result as $property) {
            $totalRentPaid += $property->paymentAmount;
        }


        return $totalRentPaid;

    }


    //Function for calculating whether or not rent is OverDue for a particular property since tenant took occupancy... to be used as a method within another method
    public function rentStatus($propertyID)
    {
        $db = db_connect();
        $model = new PaymentModel($db);
        $result = ($model->rentCalcs($propertyID));
        if (count($result) > 0) 
        {
            $result = $result[0];
        
            //Date manipulation to get months rented by a particular tenant
            $dateRented = $result->dateRented;

            $date1 = date_create_from_format('Y-m-d', $dateRented);
            $date2 = date_create_from_format('Y-m-d', date('Y-m-d'));


            $diff = date_diff($date1,$date2);
            $months= ($diff->y)*12+ $diff->m;
           //Ends here 
        

            $result->monthsRented = $months;
            $result->expectedRent = $result->monthsRented * $result->propertyRent;


            $result->rentReceived = $this->getTotalRentPaid($propertyID);
            $result->rentArrears = $result->rentReceived - $result->expectedRent;

                if ($result->rentArrears < 0) {
                    $result->rentStatus = "Overdue" ;
                }else
                {
                   $result->rentStatus = "Paid";
                }


            $data = ["rentStatus"=>$result->rentStatus, "rentArrears" => $result->rentArrears, ]; 


            return $data;
        }
        else
        {
            $data =["rentStatus" => NULL, "rentArrears" =>Null];
            return $data;
        }
    }


    public function rentDue($propertyID)
    {
        $db = db_connect();
        $model = new PaymentModel($db);
        $result = ($model->rentCalcs($propertyID));
        if (count($result) > 0) 
        {
            $result = $result[0];
        
            //Date manipulation to get months rented by a particular tenant
            $dateRented = $result->dateRented;

            $date1 = date_create_from_format('Y-m-d', $dateRented);
            $date2 = date_create_from_format('Y-m-d', date('Y-m-d'));


            $diff = date_diff($date1,$date2);
            $months= ($diff->y)*12+ $diff->m;
           //Ends here 
        

            $result->monthsRented = $months;
            $result->expectedRent = $result->monthsRented * $result->propertyRent;

            return $result->expectedRent;

        }

}

    public function getOldestRented($ownerID)
    {
        $db = db_connect();
        $model = new PaymentModel($db);   
        
        return $model->getOldestRented($ownerID)->dateRented;

    }

    // Function to get All rent owed to an owner for his properties
    public function getTotalExpectedRent($ownerID)
    {
        $db = db_connect();
        $model = new PaymentModel($db);
        $result = $model->getallRentedProperties($ownerID);


        
        

        $totalexpRent =0;

        foreach ($result as $property) {
            
            $totalexpRent += $this->rentDue($property->propertyID);
        }

        return $totalexpRent;

    }

/*HELPER FUNCTIONS END HERE */
























/*View Producing functions are here till the end*/
    //Functions to produce the data required on Page 14 of  thie wireframes provided
    public function extract($propertyID)
    {
        $db = db_connect();
        $model = new PaymentModel($db);

        $result = $model->extract($propertyID);
        $rentStatus = $this->rentStatus($propertyID);


        if (!is_string($result)) {
        
            if (!is_null($rentStatus["rentStatus"])) {
                $result->rentStatus = $rentStatus["rentStatus"];
                $result->rentArrears = $rentStatus["rentArrears"];
            }else
            {
                $result->rentStatus = null;
                $result->rentArrears = null;
            }

        }

        $data = ['data' => json_encode($result)];
 
        //If you want to output Stuff in your browser directly
        return $this->respond($result);

    }



//Page 15 of the wireFrames Provided
    public function summary($ownerID){

        $db = db_connect();
        $model = new PaymentModel($db);

        $owner = $model->isOwner($ownerID);

       

        if ($owner == true) {
            // code...


        //Get total rent Paid
        $totalRentPaid = $model->getPropertyIDs($ownerID);

        $totalexpRent = $this->getTotalExpectedRent($ownerID);

        $monthlyExpectedRent = $this->getallProperties($ownerID);

        $monthRentReturn = $model->rentPaidInMonth($ownerID);

        $fromDate = $this->getOldestRented($ownerID);


       

        $result= [
            'totalRentPaid-AllTime'=>$totalRentPaid,
            'totalExpectedRent' =>$totalexpRent,
            'monthlyExpectedRent'=>$monthlyExpectedRent,
            'monthRentReturn'=> $monthRentReturn,
            'fromDate'=>$fromDate
            ];

        }else
        {
            $result = "Not Properties to show";
        }

        //return json_encode($result);
/*        echo "<pre>";
        print_r($result);
        echo "</pre>";*/

        $data = ['data' => json_encode($result)];
        return $this->respond($result);

        
    }


//Page 13 of the views Data
    public function getTransactions($ownerID){
            $db = db_connect();
            $model = new paymentModel($db);

            $owner = $model->isOwner($ownerID);

            if ($owner == true) {
                           
            $data2 = $model->fetch_data($ownerID);

            // echo "<pre>";
            // print_r($data2);
            // echo "</pre>"; die();


            $data = ['data' => $data2];

        }
        else{
            $data = ['data' => 'No Property Owner']; 
        }


            

        return $this->respond($data['data']);
        // return json_encode($data['data']);
     

    }


}