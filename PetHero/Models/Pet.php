<?php
namespace Models;

//use Models\Type;

class Pet{
    private $Id;
    private $OwnerId;
    private $Img;
    private $Type;
    private $Race;
    private $Size;
    private $VacPlan;
    private $Observation;
    private $Video;
    private $BirthDate;
    private $Active;

    public function SetId($id){
        $this->Id = $id;
    }
    public function SetOwnerId($id){
        $this->OwnerId = $id;
    }
    public function SetImg($img){
        $this->Img = $img;
    }
    public function SetRace($race){
        $this->Race = $race;
    }
    public function SetSize($size){
        $this->Size = $size;
    }
    public function SetVacPlan($vac){
        $this->VacPlan = $vac;
    }
    public function SetObservation($ob){
        $this->Observation = $ob;
    }
    public function SetVideo($video){
        $this->Video = $video;
    }
    public function SetBirthDate($date){
        $this->BirthDate = $date;
    }

    public function SetActive($active){
        $this->Active = $active;
    }
    public function SetType(PetType $type){
        $this->Type = $type;
    }
    public function GetId(){return $this->Id;}
    public function GetOwnerId(){return $this->OwnerId;}
    public function GetImg(){return $this->Img;}
    public function GetRace(){return $this->Race;}
    public function GetSize(){return $this->Size;}
    public function GetVacPlan(){return $this->VacPlan;}
    public function GetObservation(){return $this->Observation;}
    public function GetVideo(){return $this->Video;}
    public function GetBirthDate(){return $this->BirthDate;}
    public function GetActive(){return $this->Active;}
    public function GetType(){return $this->Type;}
}
?>