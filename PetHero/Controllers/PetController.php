<?php
namespace Controllers;

use DAO\PetDAO;
use Models\Pet;

class PetController{
    private $Dao;

    public function __construct()
        {
            $this->Dao = new PetDAO();
        }
    
    public function Add(){

    }
    public function ShowListView(){
        $petList = $this->Dao->GetByOwnerId($_SESSION["OwnerId"]);

        require_once(VIEWS_PATH."pet-list.php");
    }
    public function Update(){}
    public function Delete(){}
}
?>