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

            $query = "INSERT INTO ".$this->tableName." ( petType, petSize, price) 
            VALUES (:petType,:petSize,:price);";

            $parameters["petType"] = $keeper->GetPetType();
            $parameters["petSize"] = $keeper->GetPetSize();
            $parameters["price"] = $keeper->GetPrice();

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters,false);
        }

        public function GetAll(){
            $keeperList = array();

            $query = "SELECT * FROM ".$this->tableName;

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row)
                {                
                    $keeper = new Keeper();
                    $keeper->SetId($row["id"]);
                    $keeper->SetPetType($row["petTypeId"]);
                    $keeper->SetPetSize($row["size"]);
                    $keeper->SetPrice($row["price"]);

                    array_push($keeperList, $keeper);
                }

                return $keeperList;
        }

        public function GetById($id){

            $query = "SELECT * FROM".$this->tableName."WHERE ID = :id";

            $parameters["id"] = $id;
            $row = $this->connection->Execute($query, $parameters);

            $keeper = new Keeper();
            $keeper->SetId($row["id"]);
            $keeper->SetPetType($row["petTypeId"]);
            $keeper->SetPetSize($row["size"]);
            $keeper->SetPrice($row["price"]);

            return $keeper;
        }

        public function Update(Keeper $keeper){

            $oldKeeper = $this->GetById($keeper->GetId());
            
            $query = "UPDATE ".$this->tableName." petTypeId=:petTypeId, petSize=:petSize, price=:price WHERE id = :id";

            $parameters["petTypeId"]=$keeper->GetPetType()->GetId();
            $parameters["petSize"]=$keeper->GetPetSize();
            $parameters["price"]=$keeper->GetPrice();
            $parameters["id"]=$oldKeeper->GetId();

            $response = $this->connection->ExecuteNonQuery($query, $parameters, false);
        }
    }
?>