<?php

namespace Controllers;

use Models\Booking;
use DAO\BookingDAO;
use DateTime;
use Exception;
use Models\BookingViewModel;
use Service\Mapper;
use Service\SendMail;

class BookingController
{

    private $Dao;

    public function __construct()
    {
        $this->Dao = new BookingDAO();
    }

    public function NewBooking($idKeeper, $dateFrom, $dateTo)
    {
        try {
            // instancio booking y keeperController
            $booking = new Booking();
            $KeeperController = new KeeperController();
            $day1 = new DateTime($dateFrom);
            $day2 = new DateTime($dateTo);
            $diff = $day1->diff($day2);
            $days = $diff->days;
            // traigo keeper por id
            $keeper = $KeeperController->GetKeeperById(intval($idKeeper));
            // Guardo keeper en session
            $_SESSION["keeper"] = $keeper;
            $amount = $days * $keeper->GetPrice();
            //seteo booking
            $booking->SetKeeper($idKeeper);
            $booking->SetOwner($_SESSION["idOwner"]);
            $booking->SetAmount($amount);
            $booking->SetStartDate($dateFrom);
            $booking->SetEndDate($dateTo);
            $booking->SetIdReview(0);

            // guardo booking en session
            $_SESSION["booking"] = $booking;
            $this->ShowSelectPet();
        } catch (Exception $e) {
            $_SESSION["message"] = "Ops! A ocurrido un error.";
            require_once(VIEWS_PATH . "index.php");
        }
    }

    public function ShowSelectPet()
    {
        try {
            $petController = new PetController();
            // traigo lista de mascotas por idOwner
            $petList = $petController->GetPetByOwner();
            require_once(VIEWS_PATH . "pet-to-booking.php");
        } catch (Exception $e) {
            $_SESSION["message"] = "Ops! A ocurrido un error.";
            require_once(VIEWS_PATH . "index.php");
        }
    }

    public function BookingPreliminar($idPet)
    {
        try {
            $petController = new PetController();
            // Traigo mascota por id
            $pet = $petController->GetPetById($idPet);

            //traigo booking desde session
            $booking = $_SESSION["booking"];

            //seteo booking y vuelvo a guardar en session
            $booking->SetConfirmed(0);
            $booking->SetIdPet($idPet);
            $_SESSION["booking"] = $booking;
            // Traigo keeper desde session
            $keeper = $_SESSION["keeper"];
            $userController = new UserController();
            // traigo la info del keeper
            $user = $userController->GetByKeeperid($keeper->GetId());
            require_once(VIEWS_PATH . "booking-preliminar.php");
        } catch (Exception $e) {
            $_SESSION["message"] = "Ops! A ocurrido un error.";
            require_once(VIEWS_PATH . "index.php");
        }
    }

    public function ConfirmedBooking()
    {

        try {
            // traigo booking desde session
            $booking = $_SESSION["booking"];
            // agrego booking a la bd
            $this->Dao->Add($booking);

            $_SESSION["message"] = "Su reserva fue realizada con exito. Cuando el cuidador la acepte sera notificado por email. Muchas gracias.";
            // borro booking y keeper de session
            unset($_SESSION["booking"]);
            unset($_SESSION["keeper"]);
            require_once(VIEWS_PATH . "index.php");
        } catch (Exception $e) {
            $_SESSION["message"] = "Ops! A ocurrido un error.";
            require_once(VIEWS_PATH . "index.php");
        }
    }

    public function CancelBooking()
    {

        try {
            // borro booking y keeper de session
            unset($_SESSION["booking"]);
            unset($_SESSION["keeper"]);

            $_SESSION["message"] = "Reserva cancelada.";
            require_once(VIEWS_PATH . "index.php");
        } catch (Exception $e) {
            $_SESSION["message"] = "Ops! A ocurrido un error.";
            require_once(VIEWS_PATH . "index.php");
        }
    }

    public function ConfirmedKeeperBooking($id)
    {
        try {
            // traigo booking por id
            $booking = $this->Dao->GetById($id);
            $booking->SetConfirmed(1);
            // actualizo booking en bd
            $this->Dao->Update($booking);

            $_SESSION["message"] = "Reserva confirmada.";


            $sendmail = new SendMail();
            $userController = new UserController();
            $user = $userController->GetByOwnerId($booking->GetIdOwner());
            // envio mail al owner
            $sendmail->Send($user->GetEmail(), $booking);
            require_once(VIEWS_PATH . "index.php");
        } catch (Exception $e) {
            $_SESSION["message"] = "Ops! A ocurrido un error.";
            require_once(VIEWS_PATH . "index.php");
        }
    }

    public function BookingToConfirm()
    {
        try {
            // Traigo lista de bookings no confirmados de un keeper
            $bookingList = $this->Dao->GetNotConfirmed($_SESSION["idKeeper"]);

            $userController = new UserController();
            $petController = new PetController();

            $mapper = new Mapper;

            if (count($bookingList) > 0) {

                $bookingViewModelList = array();
                // recorro la lista y mapeo a bookingviewmodel
                foreach ($bookingList as $booking) {
                    $bookingViewModel = new BookingViewModel();

                    $user = $userController->GetByOwnerId($booking->GetIdOwner());
                    $pet = $petController->GetPetById($booking->GetIdPet());
                    $bookingViewModel = $mapper->MapBooking($booking, $user, $pet);
                    array_push($bookingViewModelList, $bookingViewModel);
                }
                require_once(VIEWS_PATH . "booking-to-confirm.php");
            } else {
                $_SESSION["message"] = "No hay reservas para confirmar.";
                require_once(VIEWS_PATH . "index.php");
            }
        } catch (Exception $e) {
            $_SESSION["message"] = "Ops! A ocurrido un error.";
            require_once(VIEWS_PATH . "index.php");
        }
    }

    public function CheckBookings()
    {
        try {
            // consulto si tiene bookings sin confirmar
            $booking = $this->Dao->GetNotConfirmed($_SESSION["idKeeper"]);

            if (!is_null($booking)) {
                $_SESSION["message"] = "Tiene Reservas sin confirmar. Vaya a la sección de Reservas.";
            }

            require_once(VIEWS_PATH . "index.php");
        } catch (Exception $e) {
            $_SESSION["message"] = "Ops! A ocurrido un error.";
            require_once(VIEWS_PATH . "index.php");
        }
    }

    public function HistoryKeeper()
    {
        try {
            // traigo el historial de bookings del keeper
            $bookingList = $this->Dao->GetAllByKeeperId($_SESSION["idKeeper"]);

            $userController = new UserController();
            $petController = new PetController();
            $mapper = new Mapper;
            $bookingViewModelList = array();

            // recorro la lista y mapeo a bookingviewModel
            foreach ($bookingList as $booking) {
                $bookingViewModel = new BookingViewModel();

                $user = $userController->GetByOwnerId($booking->GetIdOwner());
                $pet = $petController->GetPetById($booking->GetIdPet());
                $bookingViewModel = $mapper->MapBooking($booking, $user, $pet);
                array_push($bookingViewModelList, $bookingViewModel);
            }

            require_once(VIEWS_PATH . "booking-history-list.php");
        } catch (Exception $e) {
            $_SESSION["message"] = "Ops! A ocurrido un error.";
            require_once(VIEWS_PATH . "index.php");
        }
    }

    public function HistoryOwner()
    {
        try {
            // traigo el historial de bookings del keeper
            $bookingList = $this->Dao->GetAllByOwnerId($_SESSION["idOwner"]);

            $userController = new UserController();
            $petController = new PetController();
            $mapper = new Mapper;
            $bookingViewModelList = array();

            // recorro la lista y mapeo a bookingviewModel
            foreach ($bookingList as $booking) {
                $bookingViewModel = new BookingViewModel();

                $user = $userController->GetByOwnerId($booking->GetIdOwner());
                $pet = $petController->GetPetById($booking->GetIdPet());
                $bookingViewModel = $mapper->MapBooking($booking, $user, $pet);
                array_push($bookingViewModelList, $bookingViewModel);
            }

            require_once(VIEWS_PATH . "booking-history-list.php");
        } catch (Exception $e) {
            $_SESSION["message"] = "Ops! A ocurrido un error.";
            require_once(VIEWS_PATH . "index.php");
        }
    }

    public function GetNotReviewed()
    {
        try {
            $bookingList = $this->Dao->GetNotReviewed($_SESSION["idOwner"]);

            $userController = new UserController();
            $petController = new PetController();

            $mapper = new Mapper;

            if (count($bookingList) > 0) {

                $bookingViewModelList = array();
                // recorro la lista y mapeo a bookingviewmodel
                foreach ($bookingList as $booking) {
                    $bookingViewModel = new BookingViewModel();

                    $user = $userController->GetByOwnerId($booking->GetIdOwner());
                    $pet = $petController->GetPetById($booking->GetIdPet());
                    $bookingViewModel = $mapper->MapBooking($booking, $user, $pet);
                    array_push($bookingViewModelList, $bookingViewModel);
                }
                require_once(VIEWS_PATH . "booking-not-reviewed.php");
            }
            else{
                $_SESSION["message"] = "No hay servicios para calificar";
                require_once(VIEWS_PATH . "index.php");
            }
        } catch (Exception $e) {
            $_SESSION["message"] = "Ops! A ocurrido un error.";
            require_once(VIEWS_PATH . "index.php");
        }
    }

    
    public function GetById($idBooking)
    {
        try {
            $booking = $this->Dao->GetById($idBooking);
            return $booking;
        } catch (Exception $e) {
            $_SESSION["message"] = "Ops! A ocurrido un error.";
            require_once(VIEWS_PATH . "index.php");
        }
    }
    public function UpdateBooking($booking)
    {
        try {
            $this->Dao->Update($booking);
        } catch (Exception $e) {
            $_SESSION["message"] = "Ops! A ocurrido un error.";
            require_once(VIEWS_PATH . "index.php");
        }
    }
}
