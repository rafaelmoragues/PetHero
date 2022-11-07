<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IReviewDAO;
    use Models\Review as Review;    
    use DAO\Connection as Connection;
use Models\Keeper;
use Models\Owner;

    class ReviewDAO implements IReviewDAO
    {
        private $connection;
        private $tableName = "review";

        public function Add(Review $review){

            $query = "INSERT INTO ".$this->tableName." ( idOwner, idKeeper, description,reputation) 
            VALUES (:idOwner,:idKeeper,:description,reputation);";

            $parameters["idOwner"] = $review->GetOwner()->GetId();
            $parameters["idKeeper"] = $review->GetKeeper()->GetId();
            $parameters["description"] = $review->GetDescription();
            $parameters["reputation"] = $review->GetReputation();

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters,false);
        }

        public function GetByIdKeeper($id){
            $query = "SELECT * FROM".$this->tableName."WHERE ID = :id";

            $parameters["id"] = $id;
            $row = $this->connection->Execute($query, $parameters);

            $owner = new Owner();
            $owner->SetId($row["idOwner"]);
            $keeper = new Keeper();
            $keeper->SetId($row["idKeeper"]);

            $review = new Review();
            $review->SetId($row["id"]);
            $review->SetOwner($owner);
            $review->SetKeeper($keeper);
            $review->SetDescription($row["description"]);
            $review->SetReputation($row["reputation"]);

            return $review;
        }
    }
?>