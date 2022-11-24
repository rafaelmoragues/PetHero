<?php
namespace Controllers;

use DAO\KeeperDAO;
use Models\Keeper;
use Models\KeeperViewModel;
use Service\KeeperService;
use Service\Mapper;
use Service\UserService;
use Exception;

class KeeperController{
    private $Dao;

    public function __construct()
        {
            $this->Dao = new KeeperDAO();
        }
    
    public function AddEmpty(){
        try{
        $keeper = new Keeper();
        // agrego keeper vacio
        $lastId = $this->Dao->Add($keeper);

        // devuelvo el id del keeper agregado
        return $lastId;
        }
        catch(Exception $e){
            $_SESSION["message"] = "Ops! A ocurrido un error.";
            require_once(VIEWS_PATH."index.php");
        }
    }

    public function Add($petType, $petSize, $Price,$dateFrom,$dateTo){
        try{
            // Seteo keeper
        $keeper = new Keeper();
        $keeper->SetPetType($petType);
        $keeper->SetDateFrom($dateFrom);
        $keeper->SetPetSize($petSize);
        $keeper->SetPrice($Price);
        $keeper->SetDateTo($dateTo);

        // guardo keeper
        $idKeeper = $this->Dao->Add($keeper);

        // guardo variable en session
        $_SESSION["idKeeper"] = $idKeeper;

        $userController = new UserController ();
        // seteo id al user
        $userController->SetKeeperOwnerId();
        }
        catch(Exception $e){
            $_SESSION["message"] = "Ops! A ocurrido un error.";
            require_once(VIEWS_PATH."index.php");
        }
    }

    public function ShowAddView(){
        try{
        $petTypeController = new PetTypeController();
        // traigo lista de tipos de animales
        $petTypeList = $petTypeController->GetPetType();

        require_once(VIEWS_PATH."keeper-add.php");
        }
        catch(Exception $e){
            $_SESSION["message"] = "Ops! A ocurrido un error.";
            require_once(VIEWS_PATH."index.php");
        }
    }

    public function ShowFilterList(){
try{
    // traigo lista de tipos de animales
        $petTypeController = new PetTypeController();
        $petTypeList = $petTypeController->GetPetType();

        require_once(VIEWS_PATH."keeper-select-filter.php");
}
catch(Exception $e){
    $_SESSION["message"] = "Ops! A ocurrido un error.";
    require_once(VIEWS_PATH."index.php");
}
    }

    public function ShowFilteredList($type, $size,$dateFrom, $dateTo){

        try{
        // instancio servicio
        $keeperService = new KeeperService();
        $keeperlist = array();
        // recupero lista filtrada
        $keeperlist = $keeperService->GetKeeperByDate($dateFrom,$dateTo);
        
        $keeperlist1 = $keeperService->GetKeeperByType($type, $keeperlist);
        
        $keeperlist2 = $keeperService->GetKeeperBySize($size, $keeperlist1);
        
        $userService = new UserService();
        $mapper = new Mapper();
        $keeperVMList = array();
        // mapeo lista
        foreach($keeperlist2 as $keeper){
            $user = $userService->GetByKeeperId($keeper->GetId());
            $keeperViewModel = $mapper->MapKeeper($keeper, $user);
            array_push($keeperVMList, $keeperViewModel);
        }

        require_once(VIEWS_PATH."keeper-list.php");
    }
    catch(Exception $e){
        $_SESSION["message"] = "Ops! A ocurrido un error.";
        require_once(VIEWS_PATH."index.php");
    }
    }

    public function GetKeeperById($idKeeper){

        try{
            // traigo keeper por id
        $keeper = $this->Dao->GetById($idKeeper);

        return $keeper;
        }
        catch(Exception $e){
            $_SESSION["message"] = "Ops! A ocurrido un error.";
            require_once(VIEWS_PATH."index.php");
        }
    }

    
}
?>