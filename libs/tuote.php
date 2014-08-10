<?php
require_once "tietokantayhteys.php";
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
  
  public function getId(){
	return $this->id;
  }
  public function setId($id){
	$this->id = $id;
  }
   public function getNimi(){
	return $this->nimi;
  }
  public function setNimi($nimi){
	$this->nimi = $nimi;
  }
    public function getKuvaus(){
	return $this->kuvaus;
  }
  public function setKuvaus($kuvaus){
	$this->kuvaus = $kuvaus;
  }
    public function getHinta(){
	return $this->hinta;
  }
  public function setHinta($hinta){
	$this->hinta = $hinta;
  }


public static function etsiKaikkiTuotteet() {
  $sql = "SELECT tuote, nimi, kuvaus, hinta FROM tuote";
  $kysely = getTietokantayhteys()->prepare($sql); $kysely->execute();
    
  $tulokset = array();
  foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
    $tuote = new Tuote($tulos->tuote, $tulos->nimi, $tulos->kuvaus, $tulos->hinta);

    //$array[] = $muuttuja; lisää muuttujan arrayn perään. 
    //Se vastaa melko suoraan ArrayList:in add-metodia.
    $tulokset[] = $tuote;
  }
  return $tulokset;
}
}