<?php
namespace Service;

use DAO\UserDAO;
use Models\User;

class UserService{

    public function GetByKeeperId($id){

        $dao = new UserDAO;

        $userList = $dao->GetAll();

        $response = new User();
        foreach($userList as $user){
            if($user->GetIdKeeper() == $id){
                $response = $user;
                return $response;
            }
        }
    }
}
?>