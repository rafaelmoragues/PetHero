<?php
    namespace DAO;

    use Models\PetType as PetType;
    use DAO\Connection as Connection;

    interface IPetTypeDAO
    {
        function Add(PetType $PetType);
        function GetAll();
    }
?>