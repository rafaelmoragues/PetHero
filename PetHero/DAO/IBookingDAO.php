<?php
    namespace DAO;

    use Models\Booking as Booking;
    use DAO\Connection as Connection;

    interface IBookingDAO
    {
        function Add(Booking $Booking);
        function GetAll();
    }
?>