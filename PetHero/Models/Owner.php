<?php
namespace Models;

use Models\Pet as Pet;

class Owner extends User{
    private $pet;

    public function SetPet(Pet $pet){
        $this->pet = $pet;
    }

    public function GetPet(){
        return $this->pet;
    }


}

?>