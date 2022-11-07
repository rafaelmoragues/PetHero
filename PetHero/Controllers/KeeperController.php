<?php
namespace Controllers;

use DAO\KeeperDAO;
use Models\Keeper;

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
    public function ShowList(){}

    // filtrar por fecha
    public function ShowListByDate(){}
}
?>