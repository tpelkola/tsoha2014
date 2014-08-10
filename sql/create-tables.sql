CREATE TABLE asiakas (
	asiakas_id serial primary key,
	email varchar(40),
	salasana varchar(40),
	nimi varchar(40),
	katuosoite varchar(40),
	postinumero integer,
	postitoimipaikka varchar(40),
	puhelinnumero integer,
	bannattu boolean	
);
CREATE TABLE tilauslista (
	tilaus serial primary key,
	tilaaja integer,
	tilausaika timestamp,
	toimitettu boolean
);
CREATE TABLE tilaus (
	tilaus integer,
	tuote integer,
	kpl integer,
	lisäketilaus integer
);
CREATE TABLE lisäketilaus (
	lisäketilaus integer,
	lisäke integer 
);
CREATE TABLE lisäke(
	lisäke integer,
	nimi varchar(40),
	hinta float
);
CREATE TABLE tuote (
	tuote serial primary key,
	nimi varchar(40),
	kuvaus varchar(40),
	hinta float
);
