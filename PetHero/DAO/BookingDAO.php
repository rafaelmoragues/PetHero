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

        public function Add(Booking $Booking){

        }

        public function GetAll(){
            
        }
    }
?>