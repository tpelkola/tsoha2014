<?php
require_once '../libs/models/tuote.php';
$data = array();

if ($_GET["action"] == "delete") {
    Tuote::findProductById($_GET["id"])->delete();
    $data["lista"] = Tuote::etsiKaikkiTuotteet();
    require "../views/header.php";
    require "../views/admin/tuote.php";
    require "../views/footer.php";
    exit();
}

if ($_POST["action"] == "update") {
    $tuote = new Tuote($_POST["tuote"], $_POST["nimi"], $_POST["kuvaus"], $_POST["hinta"]);
    $tuote->save();
    $data["lista"] = Tuote::etsiKaikkiTuotteet();
    require "../views/header.php";
    require "../views/admin/tuote.php";
    require "../views/footer.php";
    exit();
}

if ($_POST["action"] == "create") {
    $tuote = new Tuote();
    $tuote->setHinta($_POST["hinta"]);
    $tuote->setKuvaus($_POST["kuvaus"]);
    $tuote->setNimi($_POST["nimi"]);
    $tuote->save();
    $data["lista"] = Tuote::etsiKaikkiTuotteet();
    require "../views/header.php";
    require "../views/admin/tuote.php";
    require "../views/footer.php";
    exit();
}

if ($_GET["view"] == "update") {
    $data["tuote"] = Tuote::findProductById($_GET["id"]);
    require "../views/header.php";
    require "../views/admin/update.php";
    require "../views/footer.php";
    exit();
}

$data["lista"] = Tuote::etsiKaikkiTuotteet();
require "../views/header.php";
require "../views/admin/tuote.php";
require "../views/footer.php";
exit();
