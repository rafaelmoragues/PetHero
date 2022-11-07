<?php
namespace Controllers;

use DAO\UserDAO;
use Models\User;

class UserController{
private $Dao;

public function __construct()
{
    $this->Dao = new UserDAO();
}

public function ShowAddView()
{
    require_once(VIEWS_PATH."student-add.php");
}
public function Add($Name, $LastName, $Address, $City, $Genre,$Dni,$Email,$Phone,$UserName,$Password, $userType)
    {
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

        if($userType == "owner"){
            $ownerController = new OwnerController();
            $ownerId = $ownerController->AddEmpty();

            $user->SetIdOwner($ownerId);
        }
        else{
            $keeperController = new KeeperController();
            $keeperId = $keeperController->AddEmpty();

            $user->SetIdKeeper($keeperId);

        }

        $lastId = $this->Dao->Add($user);

        $_SESSION["UserId"] = $lastId;
        $_SESSION["OwnerId"] = $user->GetIdOwner();
        $_SESSION["KeeperId"] = $user->GetIdKeeper();

        //mostrar alguna vista
    }

    public function UpdatePassword(){}
    
}
?>