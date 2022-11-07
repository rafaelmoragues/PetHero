<?php
namespace Models;

use Models\Owner;
use Models\Keeper;
class Review{
    private $id;
    private $owner;
    private $keeper;
    private $strDescription;
    private $intReputation;

    public function SetId($id){
        $this->id = $id;
    }
    public function SetOwner(Owner $owner){
        $this->owner = $owner;
    }
    public function SetKeeper(Keeper $keeper){
        $this->keeper = $keeper;
    }
    public function SetDescription($desc){
        $this->strDescription = $desc;
    }
    public function SetReputation($rep){
        $this->intReputation = $rep;
    }

    public function GetId(){return $this->id;}
    public function GetOwner(){return $this->owner;}
    public function GetKeeper(){return $this->keeper;}
    public function GetDescription(){return $this->strDescription;}
    public function GetReputation(){return $this->intReputation;}
}
?>