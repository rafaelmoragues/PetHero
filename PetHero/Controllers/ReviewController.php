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

        public function Add($idBooking, $idKeeper, $description, $reputation){
            // try
            {
            $ownerController = new OwnerController();
            $keeperController = new KeeperController();
            $bookingController = new BookingController();

            $review = new Review();

            // Traigo owner, keeper y booking
            $owner = $ownerController->GetOwnerById($_SESSION["idOwner"]);
            $keeper = $keeperController->GetKeeperById($idKeeper);
            $booking = $bookingController->GetById($idBooking);

            // seteo review
            $review->SetKeeper($keeper);
            $review->SetOwner($owner);
            $review->SetDescription($description);
            $review->SetReputation($reputation);
            
            // Guardo Review en BD
            $lastid = $this->Dao->Add($review);
            // Seteo el idReview al booking
            $booking->SetIdReview($lastid);
            // Actualizo el booking
            $bookingController->UpdateBooking($booking);

            $_SESSION["message"] = "Review agregada correctamente.";

            require_once(VIEWS_PATH."index.php");

            }
            // catch(Exception $e)
            {
                $_SESSION["message"] = "Ops! A ocurrido un error.";
                require_once(VIEWS_PATH."index.php");
            }
        }

        public function ShowReviewForm($idBooking, $idKeeper){
            require_once(VIEWS_PATH . "review-add.php");
        }
}
?>