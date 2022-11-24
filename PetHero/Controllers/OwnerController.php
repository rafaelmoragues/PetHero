<?php
namespace Controllers;

use DAO\OwnerDAO;
use Models\Owner;
use Models\Pet;
use Exception;

class OwnerController{
    private $Dao;

    public function __construct()
    {
        $this->Dao = new OwnerDAO();
    }
    
    public function ShowAddView()
    {
        require_once(VIEWS_PATH."owner-add.php");
    }
    
    public function AddEmpty(){
        try{
        $owner = new Owner();
        $pet = new Pet();
        $owner->SetPet($pet);

        // Agrego owner
        $lastId = $this->Dao->Add($owner);

        $_SESSION["idOwner"] = $lastId;

        $userController = new UserController();
        $userController->SetKeeperOwnerId();
        $petController = new PetController();
        $_SESSION["message"] = "Listo, ya sos cliente. Agrega tus mascotas!";
        $petController->ShowAddView();
        }
        catch(Exception $e){
            $_SESSION["message"] = "Ops! A ocurrido un error.";
            require_once(VIEWS_PATH."index.php");
        }
    }
    public function Add($Name, $LastName, $Address, $City, $Genre,$Dni,$Email,$Phone,$UserName,$Password)
    {
        try{
            // seteo owner
        $Owner = new Owner();
        $Owner->SetName($Name);
        $Owner->SetLastName($LastName);
        $Owner->SetAddress($Address);
        $Owner->SetCity($City);
        $Owner->SetGenre($Genre);
        $Owner->SetDni($Dni);
        $Owner->SetEmail($Email);
        $Owner->SetPhone($Phone);
        $Owner->SetUserName($UserName);
        $Owner->SetPassWord($Password);

        // agrego owner a BD
        $this->Dao->Add($Owner);

        $_SESSION["message"] = "Agregado correctamente.";
        require_once(VIEWS_PATH."index.php");
        //mostrar alguna vista
        }
        catch(Exception $e){
            $_SESSION["message"] = "Ops! A ocurrido un error.";
            require_once(VIEWS_PATH."index.php");
        }
    }

    public function GetOwnerById($id){
        return $this->Dao->GetById($id);
    }
}
?>