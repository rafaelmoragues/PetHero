<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IBookingDAO;
    use Models\Booking as Booking;    
    use DAO\Connection as Connection;

    class BookingDAO implements IBookingDAO
    {
        private $connection;
        private $tableName = "booking";

        public function Add(Booking $booking){

            $query = "INSERT INTO ".$this->tableName." ( IdOwner, IdKeeper, Amount,StartDate,EndDate,IdPet,Confirmed) 
            VALUES (:IdOwner,:IdKeeper,:Amount,:StartDate,:EndDate,:IdPet,:Confirmed);";

            $parameters["IdOwner"] = $booking->GetIdOwner();
            $parameters["IdKeeper"] = $booking->GetIdKeeper();
            $parameters["Amount"] = $booking->GetAmount();
            $parameters["StartDate"] = $booking->GetStartDate();
            $parameters["EndDate"] = $booking->GetEndDate();
            $parameters["IdPet"] = $booking->GetIdPet();
            $parameters["Confirmed"] = $booking->GetConfirmed();

            $this->connection = Connection::GetInstance();

            $lastId = $this->connection->ExecuteNonQuery($query, $parameters,true,false);

            return $lastId;
        }

        public function GetAll(){
            $bookingList = array();

            $query = "SELECT * FROM ".$this->tableName;

            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row)
                {                
                    $booking = new Booking();
                    $booking->SetId($row["id"]);
                    $booking->SetOwner($row["idOwner"]);
                    $booking->SetKeeper($row["idKeeper"]);
                    $booking->SetAmount($row["amount"]);
                    $booking->SetStartDate($row["startDate"]);
                    $booking->SetEndDate($row["endDate"]);
                    $booking->SetIdPet($row["idPet"]);
                    $booking->SetConfirmed($row["confirmed"]);
                    $booking->SetIdReview($row["idReview"]);

                    array_push($bookingList, $booking);
                }

                return $bookingList;
        }

        public function GetById($id){

            $query = "SELECT * FROM ".$this->tableName." WHERE id = :id";

            $parameters["id"] = $id;

            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query, $parameters);
            
            foreach ($resultSet as $row)
                {
                    $booking = new Booking();
                    $booking->SetId($row["id"]);
                    $booking->SetOwner($row["idOwner"]);
                    $booking->SetKeeper($row["idKeeper"]);
                    $booking->SetAmount($row["amount"]);
                    $booking->SetStartDate($row["startDate"]);
                    $booking->SetEndDate($row["endDate"]);
                    $booking->SetIdPet($row["idPet"]);
                    $booking->SetConfirmed($row["confirmed"]);
                    $booking->SetIdReview($row["idReview"]);
                }

            return $booking;
        }

        public function Update(Booking $booking){

            $oldBooking = $this->GetById($booking->GetId());
            
            $query = "UPDATE ".$this->tableName." SET IdOwner=:IdOwner, IdKeeper=:IdKeeper, Amount=:Amount, StartDate=:StartDate, EndDate=:EndDate, IdPet=:IdPet, Confirmed=:Confirmed, idReview=:idReview WHERE id = :id";

            $parameters["IdOwner"] = $booking->GetIdOwner();
            $parameters["IdKeeper"] = $booking->GetIdKeeper();
            $parameters["Amount"] = $booking->GetAmount();
            $parameters["StartDate"] = $booking->GetStartDate();
            $parameters["EndDate"] = $booking->GetEndDate();
            $parameters["IdPet"] = $booking->GetIdPet();
            $parameters["Confirmed"] = $booking->GetConfirmed();
            $parameters["id"] = $oldBooking->GetId();
            $parameters["idReview"] = $booking->GetIdReview();

            $this->connection = Connection::GetInstance();
            $response = $this->connection->ExecuteNonQuery($query, $parameters, true, false);

            return $response;
        }

        public function GetNotConfirmed($idKeeper){
            $query = "SELECT * FROM ".$this->tableName." WHERE idKeeper = :id AND confirmed = 0";

            $parameters["id"] = $idKeeper;

            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query, $parameters);

            $bookingList = array();
            foreach ($resultSet as $row)
                {
                    $booking = new Booking();
                    $booking->SetId($row["id"]);
                    $booking->SetOwner($row["idOwner"]);
                    $booking->SetKeeper($row["idKeeper"]);
                    $booking->SetAmount($row["amount"]);
                    $booking->SetStartDate($row["startDate"]);
                    $booking->SetEndDate($row["endDate"]);
                    $booking->SetIdPet($row["idPet"]);
                    $booking->SetConfirmed($row["confirmed"]);
                    array_push($bookingList, $booking);
                }

            return $bookingList;
        }

        public function GetAllByKeeperId($idKeeper){
            $query = "SELECT * FROM ".$this->tableName." WHERE idKeeper = :id";

            $parameters["id"] = $idKeeper;

            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query, $parameters);

            $bookingList = array();
            foreach ($resultSet as $row)
                {
                    $booking = new Booking();
                    $booking->SetId($row["id"]);
                    $booking->SetOwner($row["idOwner"]);
                    $booking->SetKeeper($row["idKeeper"]);
                    $booking->SetAmount($row["amount"]);
                    $booking->SetStartDate($row["startDate"]);
                    $booking->SetEndDate($row["endDate"]);
                    $booking->SetIdPet($row["idPet"]);
                    $booking->SetConfirmed($row["confirmed"]);
                    $booking->SetIdReview($row["idReview"]);

                    array_push($bookingList, $booking);
                }

            return $bookingList;
        }

        public function GetAllByOwnerId($idOwner){
            $query = "SELECT * FROM ".$this->tableName." WHERE idOwner = :id";

            $parameters["id"] = $idOwner;

            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query, $parameters);

            $bookingList = array();
            foreach ($resultSet as $row)
                {
                    $booking = new Booking();
                    $booking->SetId($row["id"]);
                    $booking->SetOwner($row["idOwner"]);
                    $booking->SetKeeper($row["idKeeper"]);
                    $booking->SetAmount($row["amount"]);
                    $booking->SetStartDate($row["startDate"]);
                    $booking->SetEndDate($row["endDate"]);
                    $booking->SetIdPet($row["idPet"]);
                    $booking->SetConfirmed($row["confirmed"]);
                    $booking->SetIdReview($row["idReview"]);

                    array_push($bookingList, $booking);
                }

            return $bookingList;
        }

        public function GetNotReviewed($idOwner){
            $query = "SELECT * FROM ".$this->tableName." WHERE idOwner = :id AND idReview = 0";

            $parameters["id"] = $idOwner;

            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query, $parameters);

            $bookingList = array();
            foreach ($resultSet as $row)
                {
                    $booking = new Booking();
                    $booking->SetId($row["id"]);
                    $booking->SetOwner($row["idOwner"]);
                    $booking->SetKeeper($row["idKeeper"]);
                    $booking->SetAmount($row["amount"]);
                    $booking->SetStartDate($row["startDate"]);
                    $booking->SetEndDate($row["endDate"]);
                    $booking->SetIdPet($row["idPet"]);
                    $booking->SetConfirmed($row["confirmed"]);
                    $booking->SetIdReview($row["idReview"]);
                    array_push($bookingList, $booking);
                }

            return $bookingList;
        }
    }
?>