Hotel
===================

Zend Framework 1.12
Released on 2014.

IMPORTANT FIXES FOR 1.12.17
---------------------------

See http://framework.zend.com/changelog for full details.

NEW FEATURES
============

Removed features
================

Zend_Http_UserAgent_Features_Adapter_WurflApi
---------------------------------------------

Due to the changes in licensing of WURFL, we have removed the WurflApi
adapter. We will be providing the WurflApi adapter to ScientiaMobile so
that users of WURFL will still have that option.

Bug Fixes
=========

In addition,  over 200 reported issues in the tracker have been fixed.
We’d like to particularly thank Adam Lundrigan, Frank Brückner and
Martin Hujer for their efforts in making this happen. Thanks also to the
many people who ran the ZF1 unit tests and reported their results!

For a complete list of closed issues beginning with 1.12.3, visit:

 * https://github.com/zendframework/zf1/issues?labels=&milestone=&page=1&state=closed
 * http://framework.zend.com/changelog/

MIGRATION NOTES
===============

A detailed list of migration notes may be found at:

http://framework.zend.com/manual/en/migration.html

SYSTEM REQUIREMENTS
===================

Zend Framework requires PHP 5.2.11 or later. Please see our reference
guide for more detailed system requirements:

http://framework.zend.com/manual/en/requirements.html

INSTALLATION
============

Please see [INSTALL.md](INSTALL.md).

REPOSITORY HISTORY
==================

This repository was created based on the release-1.12 branch of a Subversion
repository, http://framework.zend.com/svn/framework/standard/. It contains a
subset of the project history, dating from between the 1.5.0 and 1.6.0 releases,
and only contains the tags for the 1.12 series. If you would like an older
version, you may access the subversion repository linked above, or download an
older version from http://framework.zend.com/downloads/archives.

CONTRIBUTING
============

Please see [README-GIT.md](README-GIT.md) and
[DEVELOPMENT_README.md](DEVELOPMENT_README.md).

1.UVOD


WebGL je relativno nova tehnologija koja nam omogućava 3D prikaz i 2D objekata u web pretrazivačima. Ona je nastala 2011 godine i njen tvorac je Mozilla. Ova tehnologija je zasnivana na JavaScript kontrolnom kodu i upravljačkom kodu koji se izvršava na grafickim jedinicama. Njeni elementi se mogu kombinovati sa HTML elementima.  WebGL je potpuno integrisan u web standardima pretražicača omogućavajući ubrzano korišćenje i obradu slika, objekata, efekta kao dela web stranice. 
Izrada WebGL elemenata se sastoji iz 5 koraka:
•	Stvaranje scene 
•	Postavljane kamere
•	Izradi i pozicijoniranju objekata
•	Dodavanje objekata
•	Renderovanje I animiranje objekata

U primeru koji ćemo da obradimo kroz WebGL je 3D prikaz hotelske sobe, time omogućavamo svakom korisniku sajta realan prikaz hotelskih soba u tri dimenzije i nesmetano kretanje kroz njih. WebGL ne zahteva dodatno instaliranje pluginova.
Pored WebGL 3D prikaza soba sajt sadrži sledeće funkcionalnosti. Pretragu soba po spratovima, pogledu soba i tipu pomoču Ajax-a. Po završetku pretrage korisnik može da odabere željenu sobu i dobije pravo rezervacije te iste sobe pomoću jquery biblioteke datetimepicker. 
Korisnik mora biti ulogovan samim tim i registrovan da bi izvršio rezervaciju sobe. Rezervacije se mogu izvršiti za sve slobodne termine sobe od današnjeg dana pa u narednih trista šezdeset i pet dana.
Admin panelu može pristupiti samo administrator sajta. Tu se nalazi tabelarni prikaz mogućnost administratora, kao što su izmena,dodavanje i brisanje korisnika, izmena,dodavanje i brisanje rezervacija, izmena,dodavanje i brisanje soba hotela . 
Radno okruženje u kome je radjen sajt je “Notepad++”;


2.ORGANIZACIJA
2.1 Web strane sa pratećim script stranicama
Aplikacija se sastoji od web stranica pisanih u HTML-u i stranica za obradu njihovog sadržaja u PHP-u. Stranici  za administratora (admin.php) je ograničen pristup. Nakon prijave, administratoru je omogućen upis, brisanje i izmena sadržaja na dinamičkim stranicama. Navigacija je urađena putem menija koji se nalazi iznad centralnog dela aplikacije. 


2.1.1 Globalno dostupne strane


 
Ova strana je početna strana ovog servisa. Registrovanim korisnicima je omogućeno lako logovanje pomoću forme za logovanje koja se nalazi sa desne strane klikom na ulaz. U slučaju da korisnik nije registrovan, može se registrovati popunjavanjem formulara za registraciju kliktajem na link Registracija, koja se nalazi podmeniju ulaz.
 Pri dnu stranice nalazi se i anketa sa pitanjima I odgovorima izvučenim iz baze, u kojoj odgovara na ponudjeno pitanje čiji se odgovori upisuju u bazu. Rezultat se prikazuju na istom mestu nakon glasnja.
Posetiocima aplikacije sa početne strane je dostupan pregled svih kategorija koje se dinamički ispunjavaju.

2.1.1.2 Stranica za registraciju  - registracija.php
 

Ova strana nudi mogućnost registracije korisnika, i predstavlja takođe jednu klasičnu formu koja prikuplja neophodne podatke.

 Za svako od datih polja postoji kontrola koja proverava njegovu validnost, i samo u slučaju validnosti svih polja proces  se uspešno završava tj. podaci se ubacuju u  bazu, a budući korisnik dobija informaciju o uspešnosti postupka.

Od korisnika se traži da unese ime i prezime, lozinku (koju mora uneti dva puta) i e-mail.


2.1.1.3 Kontakt - kontakt.php
 


Stranica kontakt sadrži informacije pomoću kojih možete da kontaktirate hotel. Tu se nalaze mapa na kojoj je jasno obeležena lokacija poslovnice hotela(iframe- izvučeno sa google maps-a) i kontakt forma ukoliko korisnik zeli direktno da kontaktira administraciju hotela, u kojoj se nalaze polje za unos e-maila sa kog šalje pitanje ili komentar, ime, i polje za unos teksta. 
Pritiskom na dugme ”Pošalji” celokupan tekst se šalje na mail hotela, koji kao i kontakt telefone imate na istoj stranici.


2.1.1.4 Prikaz soba - soba.php
 

Stranica soba ima prikaz odredjene kategorija sobe sa svojim opisom, slikama sobe I dugmetom za rezervisanje sobe. Korisnik mora biti ulogovan da bi izvrsio registraciju sobe.


2.1.1.5 Galerija 
 

Stranica galerija vrši prikaz slika iz baze. Slike su postavljene u slajder radi lakse kretnje kroz veci broj slika. Klikom na svaku sliku dobija se slika  u punoj velicini prikazana pomoću LIGHTBOX plugina.



 2.1.1.6 Prikaz sobe u 3D-u - 3dlux.php
 

Strana lux.html vrsi prikaz sobe u 3D izdanju pomoću WebGL pozadinskog koda. Korsniku je dozvoljeno manipulisanje objektom koršćenjem miša. Korišćenem skrola na mišu korisnik može da zumira objekat I pogleda iz drugog ugla, na taj način korisnik stiče punu sliku o ponudjenoj sobu.


 
2.1.2 Stranice dostupne ulogovanim korisnicima
 

Strana rezervacija omogućava ulogovanim korisnicima da pronadju željenu sobu I izvrse rezervaciju. Odabir sobe se vrši kroz padajuće menije sa mogućnostima pretrage po tipu sobe, pogledu, spratu. Nakod pronalaženja odgovarajuće sobe korisnik klikom na dugme “Pogledaj slobodne termine”, dobija trazenu sobu sa opisom,slikama I poljem za biranje datuma.



2.1.3 Stranice dostupne administratoru
 
	Stranica adnim.php je stranica na kojoj se odvija sva logika vezana za administraciju sajta. Administrator na ovoj strani obavlja sve funkcije brisanja,dodavanje i izmena rezervacija, sve funkcije brisanja,dodavanje i izmena korisnika, sve funkcije brisanja,dodavanje i izmena soba hotela.
