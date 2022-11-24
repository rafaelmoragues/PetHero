<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IPetTypeDAO;
    use Models\PetType as PetType;    
    use DAO\Connection as Connection;

    class PetTypeDAO implements IPetTypeDAO
    {
        private $connection;
        private $tableName = "pettype";

        public function Add(PetType $petType){

            $query = "INSERT INTO ".$this->tableName." ( type) 
            VALUES (:type);";

            $parameters["Type"]=$petType->GetType();

            $this->connection = Connection::GetInstance();

            $lastId = $this->connection->ExecuteNonQuery($query, $parameters,true,false);

            return $lastId;
            
        }

        public function GetAll(){
            $petTypeList = array();

            $query = "SELECT * FROM ".$this->tableName;

            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row)
                {                
                    $petType = new PetType();
                    $petType->SetId($row["id"]);
                    $petType->SetType($row["type"]);

                    array_push($petTypeList, $petType);
                }

                return $petTypeList;
        }
        public function GetById($id){

            $query = "SELECT * FROM ".$this->tableName." WHERE id = :id";

            $parameters["id"] = $id;

            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query, $parameters);

            foreach ($resultSet as $row)
                {
                $petType = new PetType();
                $petType->SetId($row["id"]);
                $petType->SetType($row["type"]);
                }
            return $petType;
        }

        
    }
?>