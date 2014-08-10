<?php

/** Funktio joka palauttaa yhteyden tietokantaan PDO-oliona. */
function getTietokantayhteys() {
  //Muuttuja, jonka sis�lt� s�ilyy getTietokantayhteys-kutsujen v�lill�.
  static $yhteys = null; 
  
  //Jos $yhteys on null, pit�� se muodostaa.
  if ($yhteys == null) { 
    //T�m� koodi suoritetaan vain kerran, sill� seuraavilla 
    //funktion suorituskerroilla $yhteys-muuttujassa on sis�lt��.
    $yhteys = new PDO('pgsql:');
    $yhteys->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }

  return $yhteys;
}
?>