<?php
namespace Controllers;

use DAO\PetDAO;
use Models\Pet;

class PetController{
    private $Dao;

    public function __construct()
        {
            $this->Dao = new PetDAO();
        }
    
    public function Add(){

    }
    public function Update(){}
    public function Delete(){}
}
?>