<?php

include_once '/database/shared/OpenDbConnection.php';
if(!isset($_SESSION['login'])){
    header('location: ../views/login.php');
}