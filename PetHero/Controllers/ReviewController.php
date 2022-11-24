<?php
namespace Controllers;

use DAO\ReviewDAO;
use Models\Review;
use Exception;

class ReviewController{
    private $Dao;

    public function __construct()
        {
            $this->Dao = new ReviewDAO();
        }

        public function Add($idKeeper, $description, $reputation){
            try{
            $ownerController = new OwnerController();
            $keeperController = new KeeperController();
            $review = new Review();

            // Traigo owner y keeper
            $owner = $ownerController->GetOwnerById($_SESSION["idOwner"]);
            $keeper = $keeperController->GetKeeperById($idKeeper);

            // seteo review
            $review->SetKeeper($keeper);
            $review->SetOwner($owner);
            $review->SetDescription($description);
            $review->SetReputation($reputation);

            // Guardo Review en BD
            $this->Dao->Add($review);

            $_SESSION["message"] = "Review agregada correctamente.";
            }
            catch(Exception $e){
                $_SESSION["message"] = "Ops! A ocurrido un error.";
                require_once(VIEWS_PATH."index.php");
            }
        }
}
?>