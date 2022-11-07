<?php
namespace Controllers;

use DAO\KeeperDAO;
use Models\Keeper;

class KeeperController{
    private $Dao;

    public function __construct()
        {
            $this->Dao = new KeeperDAO();
        }
}
?>