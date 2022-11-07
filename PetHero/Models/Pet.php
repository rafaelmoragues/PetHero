<?php
namespace Models;

//use Models\Type;

class Pet{
    private $intId;
    private $strImg;
    //private Type $strType;
    private $strRace;
    private $strSize;
    private $imgVacPlan;
    private $strObservation;
    private $strVideo;
    private $strBirthDate;
    private $bitActive;

    public function SetId($id){
        $this->intId = $id;
    }
    public function SetImg($img){
        $this->strImg = $img;
    }
    public function SetRace($race){
        $this->strRace = $race;
    }
    public function SetSize($size){
        $this->strSize = $size;
    }
    public function SetVacPlan($vac){
        $this->imgVacPlan = $vac;
    }
    public function SetObservation($ob){
        $this->strObservation = $ob;
    }
    public function SetVideo($video){
        $this->strVideo = $video;
    }
    public function SetBirthDate($date){
        $this->strBirthDate = $date;
    }

    public function SetActive($active){
        $this->bitActive = $active;
    }
    // public function SetType(Type $type){
    //     $this->strType = $type;
    // }
    public function GetId(){return $this->strId;}
    public function GetImg(){return $this->strImg;}
    public function GetRace(){return $this->strRace;}
    public function GetSize(){return $this->strSize;}
    public function GetVacPlan(){return $this->imgVacPlan;}
    public function GetObservation(){return $this->strObservation;}
    public function GetVideo(){return $this->strVideo;}
    public function GetBirthDate(){return $this->strBirthDate;}
    public function GetActive(){return $this->bitActive;}
    public function GetType(){return $this->type;}
}
?>