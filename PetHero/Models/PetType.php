<?php
namespace Models;

class PetType{
    private $id;
    private $type;

    public function SetId($id){
        $this->id = $id;
    }
    public function SetType($type){
        $this->type = $type;
    }

    public function GetId(){return $this->id;}
    public function GetType(){return $this->type;}
}
?>