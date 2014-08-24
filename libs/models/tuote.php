<?php

require_once "../libs/tietokantayhteys.php";

class Tuote {

    private $id;
    private $nimi;
    private $kuvaus;
    private $hinta;

    public function __construct($id, $nimi, $kuvaus, $hinta) {
        $this->id = $id;
        $this->nimi = $nimi;
        $this->kuvaus = $kuvaus;
        $this->hinta = $hinta;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNimi() {
        return $this->nimi;
    }

    public function setNimi($nimi) {
        $this->nimi = $nimi;
    }

    public function getKuvaus() {
        return $this->kuvaus;
    }

    public function setKuvaus($kuvaus) {
        $this->kuvaus = $kuvaus;
    }

    public function getHinta() {
        return $this->hinta;
    }

    public function setHinta($hinta) {
        $this->hinta = $hinta;
    }

    public static function etsiKaikkiTuotteet() {
        $sql = "SELECT tuote, nimi, kuvaus, hinta FROM tuote";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();

        $tulokset = array();
        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $tuote = new Tuote($tulos->tuote, $tulos->nimi, $tulos->kuvaus, $tulos->hinta);
            $tulokset[] = $tuote;
        }
        return $tulokset;
    }

    public static function findProductById($id) {
        $sql = "SELECT tuote, nimi, kuvaus, hinta FROM tuote WHERE tuote = ? LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($id));

        $tulos = $kysely->fetch(PDO::FETCH_OBJ);
        $tuote = new Tuote($tulos->tuote, $tulos->nimi, $tulos->kuvaus, $tulos->hinta);

        return $tuote;
    }

    public function save() {
        if (empty($this->id)) {
            $sql = "INSERT INTO tuote (nimi,kuvaus,hinta) VALUES (?, ?, ?);"; // create
            $kysely = getTietokantayhteys()->prepare($sql);
            $kysely->execute(array($this->getNimi(), $this->getKuvaus(), $this->getHinta()));
        } else {
            $sql = "UPDATE tuote SET nimi = ?, kuvaus = ?, hinta = ? WHERE tuote = ?"; // update
            $kysely = getTietokantayhteys()->prepare($sql);
            $kysely->execute(array($this->getNimi(), $this->getKuvaus(), $this->getHinta(), $this->getId()));
        }
    }

    public function delete() {

        $sql = "DELETE from tuote where tuote = ?"; // delete
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($this->id));
    }

}
