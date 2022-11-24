<?php
namespace Controllers;

use DAO\UserDAO;
use Models\User;
use Exception;

class UserController{
private $Dao;

public function __construct()
{
    $this->Dao = new UserDAO();
}

public function ShowAddView()
{
    require_once(VIEWS_PATH."user-add.php");
}
public function Add($Name, $LastName, $Address, $City, $Genre,$Dni,$Email,$Phone,$UserName,$Password)
    {
        try{
            // seteo user
        $user = new User();
        $user->SetName($Name);
        $user->SetLastName($LastName);
        $user->SetAddress($Address);
        $user->SetCity($City);
        $user->SetGenre($Genre);
        $user->SetDni($Dni);
        $user->SetEmail($Email);
        $user->SetPhone($Phone);
        $user->SetUserName($UserName);
        $user->SetPassWord($Password);
        $user->SetActive(true);

        
            // guardo user en BD
        $lastId = $this->Dao->Add($user);

        $homeController = new HomeController();
        // logeo el usuario que se registro
        $homeController->Login($UserName, $Password);
        }
        catch(Exception $e){
            $_SESSION["message"] = "Ops! A ocurrido un error.";
            require_once(VIEWS_PATH."index.php");
        }
    }

    public function ShowIndexView(){
        require_once(VIEWS_PATH."index.php");
    }
    public function UpdatePassword(){}
    
    public function ValidateUser($userName, $pass){

        try{
            // Valido login con datos de la base
        $response = $this->Dao->ValidateUser($userName, $pass);

        if($response != null){
            return $response;
        }
    }
    catch(Exception $e){
        $_SESSION["message"] = "Ops! A ocurrido un error.";
        require_once(VIEWS_PATH."index.php");
    }
    }

    public function SetKeeperOwnerId(){
        try{
            // traigo user por id
        $user = $this->Dao->GetById(intval($_SESSION["idUser"]));

        // seteo en user el idOwner si no tiene
        if(isset($_SESSION["idOwner"]) && is_null($user->GetIdOwner())){
            $user->SetIdOwner(intval($_SESSION["idOwner"]));
        }
        //seteo en user el idkeeper si no tiene
        if(isset($_SESSION["idKeeper"]) && is_null($user->GetIdKeeper())){
            $user->SetIdKeeper(intval($_SESSION["idKeeper"]));
        }
        // actualizo owner
        $this->Dao->Update($user);
        $_SESSION["message"]= "Actualizado correctamente";
        $this->ShowIndexView();
    }
    catch(Exception $e){
        $_SESSION["message"] = "Ops! A ocurrido un error.";
        require_once(VIEWS_PATH."index.php");
    }
    }

    public function GetByKeeperid($id){
        try{
            // traigo user por idkeeper
        $user = $this->Dao->GetByKeeperId($id);

        return $user;
        }
        catch(Exception $e){
            $_SESSION["message"] = "Ops! A ocurrido un error.";
            require_once(VIEWS_PATH."index.php");
        }
    }

    public function GetByOwnerId($id){
        // traigo user por idOwner
        $user = $this->Dao->GetByOwnerId($id);

        return $user;
    }
}
?>