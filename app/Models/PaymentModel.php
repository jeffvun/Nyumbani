<?php 

namespace App\Models;


use CodeIgniter\Database\ConnectionInterface;

class PaymentModel
{
    protected $db;

		function __construct(ConnectionInterface &$db)
		{
	
			$this->db = & $db;
		}
// Function to wuery database to get details required for page 14 of the wireframes provided
        public function extract($propertyID)
        {
            return $this->db->table('tbl_payments')
                            ->where('tbl_payments.propertyID', $propertyID)
                            ->join('tbl_property', 'tbl_property.propertyID = tbl_payments.propertyID')
                            ->join('tbl_users', 'tbl_users.userID = tbl_property.tenantId')
                            ->get()
                            ->getResultArray();
        }

/*        public function rentDue($propertyID)
        {
            return $this->db->table('tbl_property')
                    ->select('tbl_property.propertyID, tbl_property.ownerID,
                        tbl_property.propertyRent,tbl_property.rentDueDate, tbl_property.dateRented, tbl_payments.paymentDate')
                    ->join('tbl_payments','tbl_property.propertyID = tbl_payments.propertyID','left')
                    ->where(['tbl_payments.propertyID'=>$propertyID])
                    ->get()
                    ->getResult();
        }
*/

//Get 
        public function rentCalcs($propertyID)
        {
            return $this->db->table('tbl_property')
                           ->select('tbl_property.propertyID, tbl_property.ownerID,tbl_property.propertyRent,tbl_property.rentDueDate, tbl_property.dateRented')
                            ->where(['propertyID'=> $propertyID])
                            ->get()
                            ->getResult();
        }



//Function to get the earliest occupied property by an owner
        public function getOldestRented($ownerID)
        {

            return $this->db->table('tbl_property')
                            ->selectMin('dateRented')
                            ->where(['ownerID'=>$ownerID, 'tenantID !='=> NULL])
                            ->get()
                            ->getResult()[0]
                            ;
        }   


        public function getallRentedProperties($ownerID)
        {
           return $this->db->table('tbl_property')
                    ->select('propertyID, ownerID,propertyRent ')
                    ->where(['ownerID'=>$ownerID, 'tenantID !='=> NULL])
                    ->get()
                    ->getResult();
        }




//Get Rent Received for all Properties owned by one owner all time
        public function getPropertyIDs($ownerID)
        {
            $array= $this->db->table('tbl_property')
                            ->select('propertyID')
                            ->where(['ownerID'=> $ownerID])
                            ->get()
                            ->getResultArray();
            $ids = array();

            for ($i=0; $i <count($array) ; $i++) { 
                $ids[$i] = $array[$i]['propertyID']; 
            }

            

            $builder = $this->db->table('tbl_payments')
                                ->select('paymentID,propertyID,paymentAmount')
                                ->where('paymentMethod','Rent')
                                ->whereIn('propertyID',$ids)
                                ->get()
                                ->getResultArray();

            $totalRentPaid = 0;

            foreach ($builder as $property)
            {
                //print_r($property);
                $totalRentPaid += $property['paymentAmount'];
            }

            return $totalRentPaid;
        }



        public function getTotalRentPaid($propertyID)
        {
            return $this->db->table('tbl_payments')
                            ->select('propertyID, paymentAmount,paymentMethod,paymentDate')
                            ->where(['propertyID'=>$propertyID, 'paymentMethod' => 'Rent'])
                            ->get()
                            ->getResult();
        }



        public function rentPaidInMonth($ownerID)
        {
            $array= $this->db->table('tbl_property')
                            ->select('propertyID')
                            ->where(['ownerID'=> $ownerID])
                            ->get()
                            ->getResultArray();
            $ids = array();

            for ($i=0; $i <count($array) ; $i++) { 
                $ids[$i] = $array[$i]['propertyID']; 
            }

            $date = date('Y-m-d', strtotime('last day of last month'));

            $builder = $this->db->table('tbl_payments')
                                ->select('paymentID,propertyID,paymentAmount')
                                ->where(['paymentMethod'=>'Rent', 'paymentDate >'=>$date])
                                ->whereIn('propertyID',$ids)
                                ->get()
                                ->getResultArray();

            $totalRentPaid = 0;

            foreach ($builder as $property)
            {
                //print_r($property);
                $totalRentPaid += $property['paymentAmount'];
            }

            return $totalRentPaid;
        }
	
	
	//Fetching All Payments
        function fetch_data($ownerID)
        {
            $query = $this->db->table("tbl_payments")->where(["senderID"=>$ownerID,])->orWhere("recipientID",$ownerID)->get()->getResult();
            return $query;
        }





}

