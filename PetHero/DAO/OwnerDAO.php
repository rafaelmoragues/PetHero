<?php

namespace DAO;

use \Exception as Exception;
use DAO\IOwnerDAO;
use Models\Owner as Owner;
use DAO\Connection as Connection;
use Models\Pet;

class OwnerDAO implements IOwnerDAO
{
    private $connection;
    private $tableName = "owner";

    public function Add(Owner $owner)
    {
        $query = "INSERT INTO " . $this->tableName . " (idPet ) 
            VALUES (:idPet)";

        $parameters["idPet"] = $owner->GetPet()->GetId();

        $this->connection = Connection::GetInstance();

        $lastId = $this->connection->ExecuteNonQuery($query, $parameters, true, false);

        return $lastId;
    }

    public function GetAll()
    {
        $ownerList = array();

        $query = "SELECT * FROM " . $this->tableName;

        $this->connection = Connection::GetInstance();
        $resultSet = $this->connection->Execute($query);

        foreach ($resultSet as $row) {
            $pet = new Pet();
            $pet->SetId($row["petId"]);
            $owner = new Owner();
            $owner->SetId($row["id"]);
            $owner->SetPet($pet);

            array_push($ownerList, $owner);
        }

        return $ownerList;
    }
    public function GetById($id)
    {

        $query = "SELECT * FROM " . $this->tableName . " WHERE id = :id";

        $parameters["id"] = $id;
        $this->connection = Connection::GetInstance();
        $resultSet = $this->connection->Execute($query, $parameters);

        foreach ($resultSet as $row) {
            $pet = new Pet();
            $pet->SetId($row["idPet"]);
            $owner = new Owner();
            $owner->SetId($row["id"]);
            $owner->SetPet($pet);
        }
        return $owner;
    }
    public function Update(Owner $owner)
    {

        $oldOwner = $this->GetById($owner->GetId());

        $query = "UPDATE " . $this->tableName . " SET petId=:petId WHERE id = :id";


        $parameters["petId"] = $owner->GetPet()->GetId();
        $parameters["id"] = $oldOwner->GetId();

        $this->connection = Connection::GetInstance();
        $response = $this->connection->ExecuteNonQuery($query, $parameters, false);
    }
}
