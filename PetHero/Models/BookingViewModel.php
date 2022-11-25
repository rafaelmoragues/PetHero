<?php 
namespace Models;

class BookingViewModel{
    private $idBooking;
    private $idKeeper;
    private $ownerName;
    private $amount;
    private $startDate;
    private $endDate;
    private $petImg;
    private $reputation;

    public function SetIdBooking($id){
        $this->idBooking = $id;
    }
    public function SetIdKeeper($idKeeper){
        $this->idKeeper = $idKeeper;
    }
    public function SetOwnerName($ownerName){
        $this->ownerName = $ownerName;
    } 
    public function SetAmount($amount){
        $this->amount = $amount;
    }
    public function SetStartDate ($date){
        $this->startDate = $date;
    }
    public function SetEndDate($date){
        $this->endDate = $date;
    }
    public function SetPetImg($img){
        $this->petImg = $img;
    }
    public function SetReputation($reputation){
        $this->reputation = $reputation;
    }

    public function GetIdBooking(){return $this->idBooking;}
    public function GetIdKeeper(){return $this->idKeeper;}
    public function GetOwnerName(){return $this->ownerName;}
    public function GetAmount(){return $this->amount;}
    public function GetStartDate(){return $this->startDate;}
    public function GetEndDate(){return $this->endDate;}
    public function GetPetImg(){return $this->petImg;}
    public function GetReputation(){return $this->reputation;}
}
?>