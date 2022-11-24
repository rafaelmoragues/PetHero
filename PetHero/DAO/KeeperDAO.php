<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IKeeperDAO;
    use Models\Keeper as Keeper;    
    use DAO\Connection as Connection;

    class KeeperDAO implements IKeeperDAO
    {
        private $connection;
        private $tableName = "keeper";

        public function Add(Keeper $keeper){

            $query = "INSERT INTO ".$this->tableName." ( idPetType, petSize, price,dateFrom,dateTo) 
            VALUES (:idPetType,:petSize,:price,:dateFrom,:dateTo);";

            $parameters["idPetType"] = $keeper->GetPetType();
            $parameters["petSize"] = $keeper->GetPetSize();
            $parameters["price"] = $keeper->GetPrice();
            $parameters["dateFrom"] = $keeper->GetDateFrom();
            $parameters["dateTo"] = $keeper->GetDateTo();

            $this->connection = Connection::GetInstance();

            $lastId = $this->connection->ExecuteNonQuery($query, $parameters,true,false);

            return $lastId;
        }

        public function GetAll(){
            $keeperList = array();

            $query = "SELECT * FROM ".$this->tableName;

            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row)
                {                
                    $keeper = new Keeper();
                    $keeper->SetId($row["id"]);
                    $keeper->SetPetType($row["idPetType"]);
                    $keeper->SetPetSize($row["petSize"]);
                    $keeper->SetPrice($row["price"]);
                    $keeper->SetDateFrom($row["dateFrom"]);
                    $keeper->SetDateTo($row["dateTo"]);

                    array_push($keeperList, $keeper);
                }

                return $keeperList;
        }

        public function GetById($id){

            $query = "SELECT * FROM ".$this->tableName." WHERE id = :id";

            $parameters["id"] = $id;

            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query, $parameters);

            foreach ($resultSet as $row)
                {
                    $keeper = new Keeper();
                    $keeper->SetId($row["id"]);
                    $keeper->SetPetType($row["idPetType"]);
                    $keeper->SetPetSize($row["petSize"]);
                    $keeper->SetPrice($row["price"]);
                    $keeper->SetDateFrom($row["dateFrom"]);
                    $keeper->SetDateTo($row["dateTo"]);
                }

            return $keeper;
        }

        public function Update(Keeper $keeper){

            $oldKeeper = $this->GetById($keeper->GetId());
            
            $query = "UPDATE ".$this->tableName." SET idPetType=:idPetType, petSize=:petSize, price=:price, 
            dateFrom=:dateFrom, dateTo=:dateTo WHERE id = :id";

            $parameters["idPetType"]=$keeper->GetPetType()->GetId();
            $parameters["petSize"]=$keeper->GetPetSize();
            $parameters["price"]=$keeper->GetPrice();
            $parameters["id"]=$oldKeeper->GetId();
            $parameters["dateFrom"] = $keeper->GetDateFrom();
            $parameters["dateTo"] = $keeper->GetDateTo();

            $this->connection = Connection::GetInstance();
            $response = $this->connection->ExecuteNonQuery($query, $parameters, true, false);

            return $response;
        }
    }
?>