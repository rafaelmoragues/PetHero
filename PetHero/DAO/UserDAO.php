<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IUserDAO;
    use Models\User as User;    
    use DAO\Connection as Connection;

    class UserDAO implements IUserDAO
    {
        private $connection;
        private $tableName = "user";

        public function Add(User $user){

            $query = "INSERT INTO ".$this->tableName." ( name, lastName, address,city,genre,dni,email,phone,userName,password,active) 
            VALUES (:name,:lastName,:address,city,genre,dni,email,phone,userName,password,active);";

            $parameters["name"] = $user->GetName();
            $parameters["lastName"] = $user->GetLastName();
            $parameters["address"] = $user->GetAddress();
            $parameters["city"] = $user->GetCity();
            $parameters["genre"] = $user->GetGenre();
            $parameters["dni"] = $user->GetDni();
            $parameters["email"] = $user->GetEmail();
            $parameters["phone"] = $user->GetPhone();
            $parameters["userName"] = $user->GetUserName();
            $parameters["password"] = $user->GetPassword();
            $parameters["active"] = $user->GetActive();

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters,false);
        }

        public function GetAll(){
            $userList = array();

            $query = "SELECT * FROM ".$this->tableName;

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row)
                {                
                    $user = new User();
                    $user->SetId($row["id"]);
                    $user->SetName($row["name"]);
                    $user->SetLastName($row["lastName"]);
                    $user->SetAddress($row["address"]);
                    $user->SetDni($row["dni"]);
                    $user->SetCity($row["city"]);
                    $user->SetGenre($row["genre"]);
                    $user->SetEmail($row["email"]);
                    $user->SetPhone($row["phone"]);
                    $user->SetActive($row["active"]);
                    $user->SetIdOwner($row["idOwner"]);
                    $user->SetIdKeeper($row["idKeeper"]);

                    array_push($userList, $user);
                }

                return $userList;
        }
        public function ValidateUser($userName, $password){

            $query = "SELECT * FROM".$this->tableName."WHERE userName = :userName & password = :password & active = true";

            $parameters["userName"] = $userName;
            $parameters["password"] = $password;

            $row = $this->connection->Execute($query, $parameters);

            $user = new User();
            $user->SetId($row["id"]);
            $user->SetName($row["name"]);
            $user->SetLastName($row["lastName"]);
            $user->SetIdOwner($row["idOwner"]);
            $user->SetIdKeeper($row["idKeeper"]);

            return $user;
        }
        public function GetById($id){
            $query = "SELECT * FROM".$this->tableName."WHERE ID = :id";

            $parameters["id"] = $id;
            $row = $this->connection->Execute($query, $parameters);

            $user = new User();
            $user->SetId($row["id"]);
            $user->SetName($row["name"]);
            $user->SetLastName($row["lastName"]);
            $user->SetAddress($row["address"]);
            $user->SetDni($row["dni"]);
            $user->SetCity($row["city"]);
            $user->SetGenre($row["genre"]);
            $user->SetEmail($row["email"]);
            $user->SetPhone($row["phone"]);
            $user->SetActive($row["active"]);
            $user->SetIdOwner($row["idOwner"]);
            $user->SetIdKeeper($row["idKeeper"]);

            return $user;
        }

        public function Update(User $user){
            $oldUser = $this->GetById($user->GetId());

            $query = "UPDATE ".$this->tableName." SET name=:name, lastName=:lastName, address=:address, city=:city,
            genre=:genre, dni=:dni, email=:email, phone=:phone, userName=:userName, active=:active WHERE id = :id";

            $parameters["name"] = $user->GetName();
            $parameters["lastName"] = $user->GetLastName();
            $parameters["address"] = $user->GetAddress();
            $parameters["city"] = $user->GetCity();
            $parameters["genre"] = $user->GetGenre();
            $parameters["dni"] = $user->GetDni();
            $parameters["email"] = $user->GetEmail();
            $parameters["phone"] = $user->GetPhone();
            $parameters["userName"] = $user->GetUserName();
            $parameters["password"] = $user->GetPassword();
            $parameters["active"] = $user->GetActive();
            $parameters["id"]=$oldUser->GetId();
        }
        public function UpdatePassword($id, $password){
            
            $query = "UPDATE ".$this->tableName." SET password=:password WHERE id = :id";

            $parameters["id"] = $id;
            $parameters["password"] = $password;

            $response = $this->connection->ExecuteNonQuery($query, $parameters, false);
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
    }
?>