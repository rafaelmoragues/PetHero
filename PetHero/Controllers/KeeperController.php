<?php
namespace Controllers;

use DAO\KeeperDAO;
use Models\Keeper;
use Service\KeeperService;

class KeeperController{
    private $Dao;

    public function __construct()
        {
            $this->Dao = new KeeperDAO();
        }
    
    public function AddEmpty(){

        $keeper = new Keeper();
        $lastId = $this->Dao->Add($keeper);

        return $lastId;
    }

    // filtrar por type de pet
    public function ShowList($typeId){

        // instancio servicio
        $keeperService = new KeeperService();

        // recupero lista filtrada
        $keeperlist = $keeperService->GetKeeperByType($typeId);

        require_once(VIEWS_PATH."keeper-list.php");        
    }

    // filtrar por fecha
    public function ShowListByDate($initDate, $endDate){

        // instancio servicio
        $keeperService = new KeeperService();

        // recupero lista filtrada
        $keeperlist = $keeperService->GetKeeperByDate($initDate,$endDate);

        require_once(VIEWS_PATH."keeperDate-list.php");
    }
}
?>