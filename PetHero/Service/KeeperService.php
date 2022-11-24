<?php
namespace Service;

use Models\Keeper;
use DAO\KeeperDAO;

class KeeperService{
    private $Dao;

    public function __construct()
    {
        $this->Dao = new KeeperDAO();
    }

    public function GetKeeperByDate($initDate, $endDate){

        // Traigo todos los keepers
        $keeperList = $this->Dao->GetAll();

        // arreglo de respuesta vacio
        $response = array();

        // recorro los keepers y comparo las fechas
        foreach($keeperList as $keeper){
            if($keeper->GetDateFrom() <= $initDate && $keeper->GetDateTo() >= $endDate){
                array_push($response, $keeper);
            }
        }

        return $response;
    }

    public function GetKeeperByType($typeId, $list){

        // arreglo de respuesta vacio
        $response = array();

        // recorro los keepers y busco por tipo
        foreach($list as $keeper){
            if($keeper->GetPetType() == $typeId){
                array_push($response, $keeper);
            }
        }
        
        return $response;
    }

    public function GetKeeperBySize($size, $list){
        // arreglo de respuesta vacio
        $response = array();

        // recorro los keepers y busco por tipo
        foreach($list as $keeper){
            if($keeper->GetPetSize() == $size){
                array_push($response, $keeper);
            }
        }

        return $response;
    }
}
?>