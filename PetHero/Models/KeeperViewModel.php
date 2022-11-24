<?php
namespace Models;

class KeeperViewModel{

    private $idUser;
    private $idOwner;
    private $idKeeper;
    private $name;
    private $lastName;
    private $city;
    private $genre;
    private $price;
    private $reputation;
    private $dateFrom;
    private $dateTo;

    public function SetIdUser($idUser){$this->idUser = $idUser;}
    public function SetIdOwner($idOwner){$this->idOwner = $idOwner;}
    public function SetIdKeeper($idKeeper){$this->idKeeper = $idKeeper;}
    public function SetName($name){$this->name = $name;}
    public function SetLastName($lastName){$this->lastName = $lastName;}
    public function SetCity($city){$this->city = $city;}
    public function SetGenre($genre){$this->genre = $genre;}
    public function SetPrice($price){$this->price = $price;}
    public function SetReputation($reputation){$this->reputation = $reputation;}
    public function SetDateFrom($dateFrom){$this->dateFrom = $dateFrom;}
    public function SetDateTo($dateTo){$this->dateTo = $dateTo;}

    public function GetIdUser(){return $this->idUser;}
    public function GetIdOwner(){return $this->idOwner;}
    public function GetIdKeeper(){return $this->idKeeper;}
    public function GetName(){return $this->name;}
    public function GetLastName(){return $this->lastName;}
    public function GetCity(){return $this->city;}
    public function GetGenre(){return $this->genre;}
    public function GetPrice(){return $this->price;}
    public function GetReputation(){return $this->reputation;}
    public function GetDateFrom(){return $this->dateFrom;}
    public function GetDateTo(){return $this->dateTo;}

}

?>