# Hotel
===================



## UVOD


Kroz WebGL je 3D prikaz hotelske sobe, time omogućavamo svakom korisniku sajta realan prikaz hotelskih soba u tri dimenzije i nesmetano kretanje kroz njih. WebGL ne zahteva dodatno instaliranje pluginova.
Pored WebGL 3D prikaza soba sajt sadrži sledeće funkcionalnosti. Pretragu soba po spratovima, pogledu soba i tipu pomoču Ajax-a. Po završetku pretrage korisnik može da odabere željenu sobu i dobije pravo rezervacije te iste sobe pomoću jquery biblioteke datetimepicker. 
Korisnik mora biti ulogovan samim tim i registrovan da bi izvršio rezervaciju sobe. Rezervacije se mogu izvršiti za sve slobodne termine sobe od današnjeg dana pa u narednih trista šezdeset i pet dana.
Admin panelu može pristupiti samo administrator sajta. Tu se nalazi tabelarni prikaz mogućnost administratora, kao što su izmena,dodavanje i brisanje korisnika, izmena,dodavanje i brisanje rezervacija, izmena,dodavanje i brisanje soba hotela . 
Radno okruženje u kome je radjen sajt je “Notepad++”;

## ORGANIZACIJA
Web strane sa pratećim script stranicama
Aplikacija se sastoji od web stranica pisanih u HTML-u i stranica za obradu njihovog sadržaja u PHP-u. Stranici  za administratora (admin.php) je ograničen pristup. Nakon prijave, administratoru je omogućen upis, brisanje i izmena sadržaja na dinamičkim stranicama. Navigacija je urađena putem menija koji se nalazi iznad centralnog dela aplikacije. 


* Globalno dostupne strane
Ova strana je početna strana ovog servisa. Registrovanim korisnicima je omogućeno lako logovanje pomoću forme za logovanje koja se nalazi sa desne strane klikom na ulaz. U slučaju da korisnik nije registrovan, može se registrovati popunjavanjem formulara za registraciju kliktajem na link Registracija, koja se nalazi podmeniju ulaz.
 Pri dnu stranice nalazi se i anketa sa pitanjima I odgovorima izvučenim iz baze, u kojoj odgovara na ponudjeno pitanje čiji se odgovori upisuju u bazu. Rezultat se prikazuju na istom mestu nakon glasnja.
Posetiocima aplikacije sa početne strane je dostupan pregled svih kategorija koje se dinamički ispunjavaju.

* Stranica za registraciju  - registracija.php
 

Ova strana nudi mogućnost registracije korisnika, i predstavlja takođe jednu klasičnu formu koja prikuplja neophodne podatke.

 Za svako od datih polja postoji kontrola koja proverava njegovu validnost, i samo u slučaju validnosti svih polja proces  se uspešno završava tj. podaci se ubacuju u  bazu, a budući korisnik dobija informaciju o uspešnosti postupka.

Od korisnika se traži da unese ime i prezime, lozinku (koju mora uneti dva puta) i e-mail.


* Kontakt - kontakt.php
Stranica kontakt sadrži informacije pomoću kojih možete da kontaktirate hotel. Tu se nalaze mapa na kojoj je jasno obeležena lokacija poslovnice hotela(iframe- izvučeno sa google maps-a) i kontakt forma ukoliko korisnik zeli direktno da kontaktira administraciju hotela, u kojoj se nalaze polje za unos e-maila sa kog šalje pitanje ili komentar, ime, i polje za unos teksta. 
Pritiskom na dugme ”Pošalji” celokupan tekst se šalje na mail hotela, koji kao i kontakt telefone imate na istoj stranici.


* Prikaz soba - soba.php
Stranica soba ima prikaz odredjene kategorija sobe sa svojim opisom, slikama sobe I dugmetom za rezervisanje sobe. Korisnik mora biti ulogovan da bi izvrsio registraciju sobe.


* Galerija 
Stranica galerija vrši prikaz slika iz baze. Slike su postavljene u slajder radi lakse kretnje kroz veci broj slika. Klikom na svaku sliku dobija se slika  u punoj velicini prikazana pomoću LIGHTBOX plugina.



* Prikaz sobe u 3D-u - 3dlux.php
Strana lux.html vrsi prikaz sobe u 3D izdanju pomoću WebGL pozadinskog koda. Korsniku je dozvoljeno manipulisanje objektom koršćenjem miša. Korišćenem skrola na mišu korisnik može da zumira objekat I pogleda iz drugog ugla, na taj način korisnik stiče punu sliku o ponudjenoj sobu.


 
* Stranice dostupne ulogovanim korisnicima
Strana rezervacija omogućava ulogovanim korisnicima da pronadju željenu sobu I izvrse rezervaciju. Odabir sobe se vrši kroz padajuće menije sa mogućnostima pretrage po tipu sobe, pogledu, spratu. Nakod pronalaženja odgovarajuće sobe korisnik klikom na dugme “Pogledaj slobodne termine”, dobija trazenu sobu sa opisom,slikama I poljem za biranje datuma.



* Stranice dostupne administratoru
Stranica adnim.php je stranica na kojoj se odvija sva logika vezana za administraciju sajta. Administrator na ovoj strani obavlja sve funkcije brisanja,dodavanje i izmena rezervacija, sve funkcije brisanja,dodavanje i izmena korisnika, sve funkcije brisanja,dodavanje i izmena soba hotela.