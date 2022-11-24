<?php

    if(!isset($_SESSION["loggedUser"])) {
        var_dump($_SESSION["loggedUser"]);
        header("location:../index.php");
    }
?>