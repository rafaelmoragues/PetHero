<?php
namespace Controllers;

use DAO\OwnerDAO;
use Models\Owner;

class OwnerController{
    private $Dao;

    public function __construct()
    {
        $this->Dao = new OwnerDAO();
    }
    
    public function ShowAddView()
    {
        require_once(VIEWS_PATH."student-add.php");
    }
    
    public function Add($Name, $LastName, $Address, $City, $Genre,$Dni,$Email,$Phone,$UserName,$Password)
    {
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

        $this->Dao->Add($Owner);

        //mostrar alguna vista
    }
}
?>