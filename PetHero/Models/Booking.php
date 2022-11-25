<?php
namespace Models;

class Booking {
    private $Id;
    private $IdOwner;
    private $IdKeeper;
    private $Amount;
    private $StartDate;
    private $EndDate;
    private $IdPet;
    private $Confirmed;
    private $idReview;

    public function SetId($id){
        $this->Id = $id;
    }
    public function SetOwner ($idOwner){
        $this->IdOwner = $idOwner;
    }
    public function SetKeeper($idKeeper){
        $this->IdKeeper = $idKeeper;
    }
    public function SetAmount ($amount){
        $this->Amount = $amount;
    }

    public function SetStartDate ($startDate){
        $this->StartDate = $startDate;
    }

    public function SetEndDate ($endDate){
        $this->EndDate = $endDate;
    }

    public function SetIdPet ($idPet){
        $this->IdPet = $idPet;
    }

    public function SetConfirmed($confirmed){
        $this->Confirmed = $confirmed;
    }
    public function SetIdReview($idReview){
        $this->idReview = $idReview;
    }
    public function GetId(){return $this->Id;}
    public function GetIdOwner(){return $this->IdOwner;}
    public function GetIdKeeper(){return $this->IdKeeper;}
    public function GetPetSize (){return $this->PetSize;}
    public function GetAmount(){return $this->Amount;}
    public function GetStartDate(){return $this->StartDate;}
    public function GetEndDate(){return $this->EndDate;}
    public function GetIdPet(){return $this->IdPet;}
    public function GetConfirmed(){return $this->Confirmed;}
    public function GetIdReview(){return $this->idReview;}

}
?>