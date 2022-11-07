<?php
namespace Models;

class Booking {
    private $intIdOwner;
    private $intIdKeeper;
    private $doubleAmount;
    private $strStartDate;
    private $strEndDate;
    private $intIdPet;

    public function SetOwner ($idOwner){
        $this->intIdOwner = $idOwner;
    }
    public function SetKeeper($idKeeper){
        $this->intIdKeeper = $idKeeper;
    }
    public function SetAmount ($amount){
        $this->doubleamount = $amount;
    }

    public function SetStartDate ($startDate){
        $this->strStartDate = $startDate;
    }

    public function SetEndDate ($endDate){
        $this->strEndDate = $endDate;
    }

    public function SetIdPet ($idPet){
        $this->intIdPet = $idPet;
    }
    public function GetPetSize (){return $this->strPetSize;}
    public function GetPrice(){return $this->longPrice;}
    public function GetReputation(){return $this->doubleReputation;}

}
?>