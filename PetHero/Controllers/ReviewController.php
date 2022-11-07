<?php
namespace Controllers;

use DAO\ReviewDAO;
use Models\Review;

class ReviewController{
    private $Dao;

    public function __construct()
        {
            $this->Dao = new ReviewDAO();
        }
}
?>