<?php

require_once 'libs/tietokantayhteys.php';

class Asiakas {

    private $id;
    private $email;
    private $salasana;
    private $nimi;
    private $katuosoite;
    private $postinumero;
    private $postitoimipaikka;
    private $puhelinnumero;
    private $bannattu;

    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSalasana() {
        return $this->salasana;
    }

    public function getNimi() {
        return $this->nimi;
    }

    public function getKatuosoite() {
        return $this->katuosoite;
    }

    public function getPostinumero() {
        return $this->postinumero;
    }

    public function getPostitoimipaikka() {
        return $this->postitoimipaikka;
    }

    public function getPuhelinnumero() {
        return $this->puhelinnumero;
    }

    public function getBannattu() {
        return $this->bannattu;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSalasana($salasana) {
        $this->salasana = $salasana;
    }

    public function setNimi($nimi) {
        $this->nimi = $nimi;
    }

    public function setKatuosoite($katuosoite) {
        $this->katuosoite = $katuosoite;
    }

    public function setPostinumero($postinumero) {
        $this->postinumero = $postinumero;
    }

    public function setPostitoimipaikka($postitoimipaikka) {
        $this->postitoimipaikka = $postitoimipaikka;
    }

    public function setPuhelinnumero($puhelinnumero) {
        $this->puhelinnumero = $puhelinnumero;
    }

    public function setBannattu($bannattu) {
        $this->bannattu = $bannattu;
    }

    public static function etsiKayttajaTunnuksilla($kayttaja, $salasana) {
        $sql = "SELECT * from asiakas where email = ? AND salasana = ? LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($kayttaja, $salasana));
        $tulos = $kysely->fetchObject();
        if ($tulos == null) {
            return null;
        } else {
            $asiakas = new Asiakas($tulos->asiakas_id, $tulos->email,
                    $tulos->salasana, $tulos->katuosoite, $tulos->postinumero,
                    $tulos->postitoimipaikka, $tulos->puhelinnumero, $tulos->bannattu);
//            $asiakas->setId($tulos->asiakas_id);
//            $asiakas->setEmail($tulos->email);
//            $asiakas->setSalasana($tulos->salasana);
            return $asiakas;
        }
    }

}
