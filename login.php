<?php
require_once 'libs/models/asiakas.php';
require_once 'libs/functions.php';
session_start();
$data->title = "Kirjaudu sisään";
$data->virhe = "";
if(empty($_POST["login-redirect"])){
    $data->login_redirect = "login.php";
} else {
    $data->login_redirect = $_POST["login-redirect"];
}

if(isLogged()){
    $data->asiakas = $_SESSION['asiakas'];
    require 'views/header.php';
    require 'views/logout.php';
    require 'views/footer.php';
    exit();
}

if (empty($_POST["referer"])) { // tarkistetaan, ettei sivulle palattu lomakkeesta
    require 'views/header.php';
    require 'views/login.php';
    require 'views/footer.php';
    exit();
} else if (empty($_POST["email"]) && empty($_POST["password"])) {
    $data->virhe = "Sähköposti- ja salasanakenttä tyhjä";
    require 'views/header.php';
    require 'views/login.php';
    require 'views/footer.php';
    exit();
} else if (empty($_POST["password"])) {
    $data->virhe = "Salasanakenttä tyhjä";
    require 'views/header.php';
    require 'views/login.php';
    require 'views/footer.php';
    exit();
} else if (empty($_POST["email"])) {
    $data->virhe = "Sähköpostikenttä tyhjä";
    require 'views/header.php';
    require 'views/login.php';
    require 'views/footer.php';
    exit();
}


$email = $_POST["email"];
$salasana = $_POST["password"];
$asiakas = Asiakas::etsiKayttajaTunnuksilla($email, $salasana);
if ($asiakas != null) {
    $_SESSION['asiakas'] = $asiakas;
    header('Location: ' . $data->login_redirect);
} else {
    $data->virhe = "Tarkista sähköposti ja salasana";
    require 'views/header.php';
    require 'views/login.php';
    require 'views/footer.php';
    exit();
}