<?php
namespace Controllers;

use DAO\PetTypeDAO;
use Models\PetType;
use Exception;

class PetTypeController{

    
        private $Dao;

    public function __construct()
        {
            $this->Dao = new PetTypeDAO();
        }

    public function GetPetType(){
        try{
            //traigo lista de mascotas
        $typeList = $this->Dao->GetAll();
        return $typeList;
        }
        catch(Exception $e){
            $_SESSION["message"] = "Ops! A ocurrido un error.";
            require_once(VIEWS_PATH."index.php");
        }
    }
    public function GetPetTypeById($id){
        try{
            // traigo tipo por id
        $type = $this->Dao->GetById($id);
        return $type;
        }
        catch(Exception $e){
            $_SESSION["message"] = "Ops! A ocurrido un error.";
            require_once(VIEWS_PATH."index.php");
        }
    }
}
?>