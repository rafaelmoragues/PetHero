<?php
namespace Models;

class User{

    private $Id;
    private $Name;
    private $LastName;
    private $Address;
    private $City;
    private $Genre;
    private $Dni;
    private $Email;
    private $Phone;
    private $UserName;
    private $Password;
    private $Active;
    private $IdOwner;
    private $IdKeeper;

    public function SetId($id){
        $this->Id = $id;
    }
    public function SetName($name){
        $this->Name = $name;
    }
    public function SetLastName($lastName){
        $this->LastName = $lastName;
    }
    public function SetAddress($address){
        $this->Address = $address;
    }
    public function SetCity($city){
        $this->City = $city;
    }
    public function SetGenre($genre){
        $this->Genre = $genre;
    }
    public function SetDni($dni){
        $this->Dni = $dni;
    }
    public function SetEmail($email){
        $this->Email = $email;
    }
    public function SetPhone($phone){
        $this->Phone = $phone;
    }
    public function SetUserName ($user){
        $this->UserName = $user;
    }
    public function SetPassword($pass){
        $this->Password = $pass;
    }
    public function SetActive($active){
        $this->Active = $active;
    }
    public function SetIdOwner($idOwner){
        $this->IdOwner = $idOwner;
    }
    public function SetIdKeeper($idKeeper){
        $this->IdKeeper = $idKeeper;
    }

    public function GetId(){return $this->Id;}
    public function GetName(){return $this->Name;}
    public function GetLastName(){return $this->LastName;}
    public function GetAddress(){return $this->Address;}
    public function GetCity(){return $this->City;}
    public function GetGenre(){return $this->Genre;}
    public function GetDni(){return $this->Dni;}
    public function GetEmail(){return $this->Email;}
    public function GetPhone(){return $this->Phone;}
    public function GetUserName(){return $this->UserName;}
    public function GetPassword(){return $this->Password;}
    public function GetActive(){return $this->Active;}
    public function GetIdOwner(){return $this->IdOwner;}
    public function GetIdKeeper(){return $this->IdKeeper;}
}
?>