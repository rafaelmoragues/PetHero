<?php
    namespace Controllers;
    use Exception;
    use Models\User;
    class HomeController
    {
        public function Index()
        {
            require_once(VIEWS_PATH."index.php");
        }     
        
        public function Login($userName, $password) {

            try{
            $userController = new UserController();

            // Valido user
            $response = $userController->ValidateUser($userName, $password);

            // si el usuario es valido guardo variables en session
            if($response != null){
                $_SESSION["loggedUser"] = $response->GetUserName();
                $_SESSION["idUser"] = $response->GetId();
                if($response->GetIdOwner() != null){
                    $_SESSION["idOwner"] = $response->GetIdOwner();
                }
                if($response->GetIdKeeper() != null){
                    $_SESSION["idKeeper"] = $response->GetIdKeeper();
                    $bookingController = new BookingController();
                    $bookingController->CheckBookings();
                }

                require_once(VIEWS_PATH . "index.php");
            }
        }
        catch(Exception $e){
            $_SESSION["message"] = "Ops! A ocurrido un error.";
            require_once(VIEWS_PATH."index.php");
        }
            
        }

        public function Logout(){
            try{
                // borro variables de session
            unset($_SESSION["loggedUser"]);
            unset($_SESSION["idUser"]);
            unset($_SESSION["idOwner"]);
            unset($_SESSION["idKeeper"]);
            $_SESSION["message"] = "Sesion Cerrada";
            session_destroy();
            require_once(VIEWS_PATH . "index.php");
            }
            catch(Exception $e){
                $_SESSION["message"] = "Ops! A ocurrido un error.";
                require_once(VIEWS_PATH."index.php");
            }
        }

        public function LoginView(){
            require_once(VIEWS_PATH . "login.php");
        }
    }
?>