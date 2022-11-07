<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IPetDAO;
    use Models\Pet as Pet;    
    use DAO\Connection as Connection;

    class PetDAO implements IPetDAO
    {
        private $connection;
        private $tableName = "pet";

        public function Add(Pet $pet){

            $query = "INSERT INTO ".$this->tableName." ( active, img, birthDate, race, size, vacPlan,video,observation) 
            VALUES (:active, :img, :birthDate, :race, :size, :vacPlan, :video, :observation);";

            $parameters["active"]=$pet->GetActive();
            $parameters["img"]=$pet->GetImg();
            $parameters["birthDate"]=$pet->GetBirthDate();
            $parameters["race"]=$pet->GetRace();
            $parameters["size"]=$pet->GetSize();
            $parameters["vacPlan"]=$pet->GetVacPlan();
            $parameters["video"]=$pet->GetVideo();
            $parameters["observation"]=$pet->GetObservation();
            $parameters["petType"]=$pet->GetType();
            
            $this->connection = Connection::GetInstance();

            $lastId = $this->connection->ExecuteNonQuery($query, $parameters,true);

            return $lastId;
            $PetList = array();

            $query = "SELECT * FROM ".$this->tableName;

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row)
                {                
                    $pet = new Pet();
                    $pet->SetId($row["id"]);
                    $pet->SetActive($row["active"]);
                    $pet->SetImg($row["img"]);
                    $pet->SetBirthDate($row["birthDate"]);
                    $pet->SetRace([$row["race"]]);
                    $pet->SetSize(["size"]);
                    $pet->SetVacPlan(["vacPlan"]);
                    $pet->SetVideo(["video"]);
                    $pet->SetObservation(["observation"]);
                    // setear tipo, hacer modelo Type

                    array_push($petList, $pet);
                }

                return $petList;
        }

        public function GetAll(){
            $petList = array();

            $query = "SELECT * FROM ".$this->tableName;

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row)
                {                
                    $pet = new Pet();
                    $pet->SetId($row["petId"]);
                    $pet->SetActive($row["active"]);
                    $pet->SetImg($row["img"]);
                    $pet->SetBirthDate($row["birthDate"]);
                    $pet->SetRace([$row["race"]]);
                    $pet->SetSize(["size"]);
                    $pet->SetVacPlan(["vacPlan"]);
                    $pet->SetVideo(["video"]);
                    $pet->SetObservation(["observation"]);
                    // setear tipo, hacer modelo Type

                    array_push($petList, $pet);
                }

                return $petList;
        }
        public function GetById($id){

            $query = "SELECT * FROM".$this->tableName."WHERE ID = :id";

            $parameters["id"] = $id;
            $row = $this->connection->Execute($query, $parameters);

            $pet = new Pet();
                    $pet->SetId($row["id"]);
                    $pet->SetActive($row["active"]);
                    $pet->SetImg($row["img"]);
                    $pet->SetBirthDate($row["birthDate"]);
                    $pet->SetRace([$row["race"]]);
                    $pet->SetSize(["size"]);
                    $pet->SetVacPlan(["vacPlan"]);
                    $pet->SetVideo(["video"]);
                    $pet->SetObservation(["observation"]);
                    // setear tipo, hacer modelo Type

                    return $pet;
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