<?php
namespace Controllers;

use DAO\PetDAO;
use Models\Pet;
use Models\PetType;
use Exception;

class PetController{
    private $Dao;

    public function __construct()
        {
            $this->Dao = new PetDAO();
        }
    
    public function Add($race, $size, $birth, $type, $observation){

        try{
            // seteo ruta de la imagen
        $idOwner = $_SESSION["idOwner"];
        $pathImg = "Img/".$idOwner."petImg".date("Y-m-d").".jpg";
        $guardado = $_FILES['img']['tmp_name'];

        // guardo la imagen en el proyecto
        move_uploaded_file($guardado,$pathImg);

        // seteo pet
        $pet = new Pet();
        $pet->SetRace($race);
        $pet->SetSize($size);
        $pet->SetBirthDate($birth);
        $pet->SetActive(true);
        $petType = new PetType();
        $petType->SetId(intval($type));
        $pet->SetType($petType);
        $pet->SetObservation($observation);
        $pet->SetImg($pathImg);
        $pet->SetOwnerId(intval($_SESSION["idOwner"]));

        // agrego pet a la BD
        $this->Dao->Add($pet);

        $this->ShowListView();
        }
        catch(Exception $e){
            $_SESSION["message"] = "Ops! A ocurrido un error.";
            require_once(VIEWS_PATH."index.php");
        }
    }
    public function ShowListView(){
        try{
            // traigo lista de pet por idOwner
        $petList = $this->Dao->GetByOwnerId($_SESSION["idOwner"]);
        $petTypeController = new PetTypeController();
        
        // seteo el tipo de mascota a la mascota
        foreach($petList as $pet){
            $type = $petTypeController->GetPetTypeById(intval($pet->GetType()->GetId()));
            $pet->SetType($type);
        }
        require_once(VIEWS_PATH."pet-list.php");
    }
    catch(Exception $e){
        $_SESSION["message"] = "Ops! A ocurrido un error.";
        require_once(VIEWS_PATH."index.php");
    }
    }

    public function ShowAddView(){
        try{

            // Traigo lista de tipos de mascota
        $petTypeController = new PetTypeController();
        $petTypeList = $petTypeController->GetPetType();
        require_once(VIEWS_PATH."pet-add.php");
        }
        catch(Exception $e){
            $_SESSION["message"] = "Ops! A ocurrido un error.";
            require_once(VIEWS_PATH."index.php");
        }
    }

    public function GetPetByOwner(){
        try{
            // Traigo lista de mascotas por owner
        $petList = $this->Dao->GetByOwnerId($_SESSION["idOwner"]);
        return $petList;
        }
        catch(Exception $e){
            $_SESSION["message"] = "Ops! A ocurrido un error.";
            require_once(VIEWS_PATH."index.php");
        }
    }

    public function GetPetById($idPet){
        try{
            // Traigo mascota por id
        $pet = $this->Dao->GetById($idPet);
        return $pet;
        }
        catch(Exception $e){
            $_SESSION["message"] = "Ops! A ocurrido un error.";
            require_once(VIEWS_PATH."index.php");
        }
    }
}
?>