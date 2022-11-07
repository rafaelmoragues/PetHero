<?php
namespace Models;

class Keeper extends User{
    private $strPetType;
    private $strPetSize;
    private $longPrice;
    private $doubleReputation;

    public function SetPetType ($type){
        $this->strPetType = $type;
    }
    public function SetPetSize ($size){
        $this->strPetSize = $size;
    }
    public function SetPrice($price){
        $this->longPrice = $price;
    }
    public function SetReputation ($reputation){
        $this->doubleReputation = $reputation;
    }

    public function GetPetType(){return $this->strPetType;}
    public function GetPetSize (){return $this->strPetSize;}
    public function GetPrice(){return $this->longPrice;}
    public function GetReputation(){return $this->doubleReputation;}

}
?>