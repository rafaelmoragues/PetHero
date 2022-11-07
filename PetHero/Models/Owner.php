<?php
namespace Models;

use Models\Pet as Pet;

class Owner extends User{
    private $id;
    private $pet;

    public function SetId($id){
        $this->id = $id;
    }
    public function SetPet(Pet $pet){
        $this->pet = $pet;
    }

    public function GetPet(){return $this->pet;}
    public function GetId(){return $this->id;}


}

?>