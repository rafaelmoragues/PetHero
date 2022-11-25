<?php
namespace Service;

use Models\Keeper;
use Models\Owner;
use Models\User;
use Models\KeeperViewModel;
use Models\BookingViewModel;

class Mapper{

    public function MapKeeper($keeper, $user){

        // seteo keeperViewModel desde un keeper con su user
        $keeperViewModel = new KeeperViewModel();
        $keeperViewModel->SetIdUser($user->GetId());
        $keeperViewModel->SetIdKeeper($user->GetIdKeeper());
        $keeperViewModel->SetIdOwner($user->GetIdOwner());
        $keeperViewModel->SetName($user->GetName());
        $keeperViewModel->SetLastName($user->GetLastName());
        $keeperViewModel->SetGenre($user->GetGenre());
        $keeperViewModel->SetPrice($keeper->GetPrice());
        $keeperViewModel->SetReputation($keeper->GetReputation());
        $keeperViewModel->SetDateFrom($keeper->GetDateFrom());
        $keeperViewModel->SetDateTo($keeper->GetDateTo());

        return $keeperViewModel;
    }

    public function MapBooking($booking, $user, $pet, $reputation = 0){

        $bookingViewModel = new BookingViewModel();

        // seteo bookingViewModel desde un booking, user y pet
        $bookingViewModel->SetIdBooking($booking->GetId());
        $bookingViewModel->SetIdKeeper($booking->GetIdKeeper());
        $bookingViewModel->SetOwnerName($user->GetName());
        $bookingViewModel->SetAmount($booking->GetAmount());
        $bookingViewModel->SetStartDate($booking->GetStartDate());
        $bookingViewModel->SetEndDate($booking->GetEndDate());
        $bookingViewModel->SetPetImg($pet->GetImg());
        $bookingViewModel->SetReputation($reputation);
        
        return $bookingViewModel;
    }
}
?>