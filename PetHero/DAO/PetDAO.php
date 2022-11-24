<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IPetDAO;
    use Models\Pet as Pet;    
    use DAO\Connection as Connection;
use Models\PetType;

    class PetDAO implements IPetDAO
    {
        private $connection;
        private $tableName = "pet";

        public function Add(Pet $pet){

            $query = "INSERT INTO ".$this->tableName." ( active, idOwner, img, birthDate, race, idType, size, vacPlan, observation) 
            VALUES (:active, :idOwner, :img, :birthDate, :race, :idType, :size, :vacPlan, :observation);";

            $parameters["active"]=$pet->GetActive();
            $parameters["img"]=$pet->GetImg();
            $parameters["birthDate"]=$pet->GetBirthDate();
            $parameters["race"]=$pet->GetRace();
            $parameters["size"]=$pet->GetSize();
            $parameters["observation"]=$pet->GetObservation();
            $parameters["idType"]=$pet->GetType()->GetId();
            $parameters["idOwner"] = $pet->GetOwnerId();
            $parameters["vacPlan"] = $pet->GetVacPlan();

            $this->connection = Connection::GetInstance();

            $lastId = $this->connection->ExecuteNonQuery($query, $parameters,true,false);

            return $lastId;
            
        }

        public function GetAll(){
            $petList = array();

            $query = "SELECT * FROM ".$this->tableName;

            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row)
                {                
                    $petType = new PetType();
                    $petType->SetId($row["idType"]);
                    $pet = new Pet();
                    $pet->SetId($row["id"]);
                    $pet->SetActive($row["active"]);
                    $pet->SetImg($row["img"]);
                    $pet->SetBirthDate($row["birthDate"]);
                    $pet->SetRace($row["race"]);
                    $pet->SetSize($row["size"]);
                    $pet->SetVacPlan($row["vacPlan"]);
                    $pet->SetVideo($row["video"]);
                    $pet->SetObservation($row["observation"]);
                    $pet->SetType($petType);

                    array_push($petList, $pet);
                }

                return $petList;
        }
        public function GetById($id){

            $query = "SELECT * FROM ".$this->tableName." WHERE ID = :id AND active = true";

            $parameters["id"] = $id;

            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query, $parameters);

            foreach ($resultSet as $row){
                $petType = new PetType();
                    $petType->SetId($row["idType"]);
                $pet = new Pet();
                    $pet->SetId($row["id"]);
                    $pet->SetActive($row["active"]);
                    $pet->SetImg($row["img"]);
                    $pet->SetBirthDate($row["birthDate"]);
                    $pet->SetRace($row["race"]);
                    $pet->SetSize($row["size"]);
                    $pet->SetVacPlan($row["vacPlan"]);
                    // $pet->SetVideo($row["video"]);
                    $pet->SetObservation($row["observation"]);
                    $pet->SetType($petType);
            }
                    return $pet;
        }

        public function GetByOwnerId($oId){

            $petList = array();
            $query = "SELECT * FROM ".$this->tableName." WHERE idOwner = :id AND active = true";

            $parameters["id"] = $oId;

            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query, $parameters);

            foreach ($resultSet as $row)
                {                
                    $petType = new PetType();
                    $petType->SetId($row["idType"]);
                    $pet = new Pet();
                    $pet->SetId($row["id"]);
                    $pet->SetActive($row["active"]);
                    $pet->SetImg($row["img"]);
                    $pet->SetBirthDate($row["birthDate"]);
                    $pet->SetType($petType);
                    $pet->SetRace($row["race"]);
                    $pet->SetSize($row["size"]);
                    $pet->SetVacPlan($row["vacPlan"]);
                    $pet->SetVideo($row["idType"]);
                    $pet->SetObservation($row["observation"]);

                    array_push($petList, $pet);
                }

                return $petList;
        }
        public function Delete($id){
            $query = "UPDATE ".$this->tableName." SET active = 0 WHERE id = :id";

            $parameters["id"] = $id;

            $response = $this->connection->ExecuteNonQuery($query, $parameters, false);
            if($response >0)
                return true;
            else
                return false;
        }
        public function Update(Pet $pet){

            $oldPet = $this->GetById($pet->GetId());
            
            $query = "UPDATE ".$this->tableName." SET img=:img, birthDate=:birth, race=:race, size=:size,
            vacPlan=:vacPlan, video=:video, observation=:observation, typeId=:typeId, active=:active, WHERE id = :id";

            $parameters["img"]=$pet->GetImg();
            $parameters["birth"]=$pet->GetBirthDate();
            $parameters["race"]=$pet->GetRace();
            $parameters["size"]=$pet->GetSize();
            $parameters["vacPlan"]=$pet->GetVacPlan();
            $parameters["video"]=$pet->GetVideo();
            $parameters["observation"]=$pet->GetObservation();
            $parameters["typeId"]=$pet->GetType()->GetId();
            $parameters["active"]=$pet->GetActive();
            $parameters["id"]=$oldPet->GetId();

            $response = $this->connection->ExecuteNonQuery($query, $parameters, false);
        }
    }
?>