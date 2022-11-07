<?php
    namespace DAO;

    use Models\Pet as Pet;
    use DAO\Connection as Connection;

    interface IPetDAO
    {
        function Add(Pet $Pet);
        function GetAll();
    }
?>