<?php
@session_start();
if (isset($_SESSION['fail'])){

	unset($_SESSION['fail']);
}
if(isset($_POST['bt1'])) {
	$email = trim($_POST['email-log']);
	$w = $_POST['pass-log'];
	$a = md5($w);

	include('konekcija.php');

	$upit = "SELECT * FROM korisnici WHERE email='$email' and password='$a'";
	$rez = mysql_query($upit, $konekcija) or die(mysql_error());

	if($niz = mysql_fetch_array($rez)) {
		$_SESSION['email'] = $niz['email'];
		$nik=array();
		$nik=explode("@",$_SESSION['email']);
		$_SESSION['nik']=$nik[0];
		$_SESSION['uloga'] = $niz['uloga'];
		$_SESSION['id_korisnik'] = $niz['id_korisnik'];
		$_SESSION['status'] = $niz['zakljucan_otkljucan'];
		unset($_SESSION['fail']);
	}
	else{
		$_SESSION['fail']="f";
	}

}


?>
<!DOCTYPE html>
<html lang="eng">

<head>
	<meta charset="utf-8">
	<title>HellaSerb</title>
	<meta name="description" content="HellaSerb">
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<link rel="stylesheet" id="font-awesome-css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" type="text/css" media="screen">
	<script src="js/back_to_top.js"></script>
	<script src="js/showMore.js"></script>
	<script src="js/enter.js"></script>
	<script src="js/adds.js"></script>
</head>

<body data-spy="scroll" data-target="#my-navbar">
<!-- jumbotron-->
	
	<div class="jumbotron">
		<div class="container">
			<div class="row">
				<div class="col-sm-11">
					<a href="index.php"><img src="rs/images/logo.png" class="img-responsive"></a>	
				</div>
				<div class="col-sm-1" id="language_header">
					<a href="rs/uslovi_koriscenja.php"><img width="50" height="50" src="rs/images/sr.png" class="img-responsive"></a>
					
					<a href="terms_of_use.php"><img width="50" height="50" src="rs/images/el.png" class="img-responsive"></a>
				</div>		
			</div><!-- End row-->	
		</div><!-- End container-->
	</div><!-- End jumbotron-->

		<!-- Navbar -->
	<nav class="navbar navbar-inverse navbar-static-top" id="my-navbar">
	

		<div class="container">
			<div class="navbar-header">
				<ul id="language_menu">
					<li>
						<a href="rs/uslovi_koriscenja.php"><img width="50" height="50" src="rs/images/sr.png" class="img-responsive"></a>
					</li>
					<li>
						<a href="terms_of_use.php"><img width="50" height="50" src="rs/images/el.png" class="img-responsive"></a>
					</li>
				</ul>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

			</div><!-- Navbar header-->
			<div class="collapse navbar-collapse" id="navbar-collapse" >
				
				

				
				<ul class="nav navbar-nav">
					<li><a href="index.php">ΑΡΧΙΚΗ</a></li>
					<li><a href="about_us.php">ΣΧΕΤΙΚΑ </a></li>
					<li><a href="our_services.php">ΥΠΗΡΕΣΙΕΣ</a></li>
					<li><a href="info.php">ΠΛΗΡΟΦΟΡΙΕΣ</a></li>
					<li><a href="ad.php">ΑΓΓΕΛΙΕΣ</a></li>
					<li><a href="place_your_ad.php">ΚΑΤΑΧΩΡΗΣΗ ΑΓΓΕΛΙΑΣ</a></li>
					<li><a href="contact.php">ΕΠΙΚΟΙΝΩΝΙΑ</a></li>
					<li><?php if(isset($_SESSION['email'])){echo "<a href='function/log.php' >".$_SESSION['nik']." / Αποσύνδεση</a>";}else{echo "<a href='#'>ΣΥΝΔΕΣΗ</a>";} ?></li>
					<li><?php if(isset($_SESSION['email'])){if($_SESSION['uloga']=='administrator'){echo '<a href="rs/admin/index.php">admin</a>';}} ?></li>
			</ul>
			<div id="validation-logfail" class="navbar-nav" style="margin-left: 10%;">
				<?php if(isset($_SESSION['fail'])){?><h4 style="color: red; ">Δώσατε λάθος e-mail ή κωδικό σας. Παρακαλούμε προσπαθήστε ξανά!</h4><?php } ?>
			</div>
			<div id="log_navbar" class="navbar-nav">
				<?php if(!isset($_SESSION['email'])){?>

					<form id="logform"  method="post" enctype="multipart/form-data" name="log-forma" action="">


						<input type="text" name="email-log" placeholder="Το e-mail σας" class="margin-left" id="emaill-log" data-rule="maxlen:4" data-msg="Η διεύθυνση e-mail σας " />
						<input type="password" name="pass-log" style="margin: 0px 7px;" placeholder="Κωδικός" class="margin-left" id="passw-log" data-rule="maxlen:4" data-msg="Λάθος κωδικού πρόσβασης, δοκιμάστε ξανά." />
						<input class="btn" type="submit" id="bt1" name="bt1" value="Σύνδεση"/>
						<h5 align="center" style="margin-right:220px;"><a style="color:red;" href="password_change.php">Ξεχάσατε τον κωδικό σας?</a></h5>
					</form>
				<?php }?>
			</div>

			</div>
		</div><!-- End Container-->
	</nav><!-- End navbar-->


	<!-- Content-->

		<div class="container" style="margin-top:20px;">

		<div class="row">

		<div class="col-sm-2">
				<!-- Baneri left-->

			<style type="text/css">
				#cycler2{position:relative;}
				#cycler2 div{position:absolute;z-index:1}
				#cycler2 div.active{z-index:3}
			</style>


			

			<script type="text/javascript">
				function cycleImages2(){
					      var $active = $('#cycler2 .active');
					      var $next = ($active.next().length > 0) ? $active.next() : $('#cycler2 div:first');
					      $next.css('z-index',2);//move the next image up the pile
					      $active.fadeOut(1500,function(){//fade out the top image
						  $active.css('z-index',1).show().removeClass('active');//reset the z-index and unhide the image
					          $next.css('z-index',3).addClass('active');//make the next image the top one
					      });
					    }

					$(document).ready(function(){
					// run every 7s
					setInterval('cycleImages2()', 6000);
					})
			</script>

		
			<div id="cycler2">
			<?php
						include('konekcija.php');

						$query = mysql_query('SELECT * FROM baneri WHERE aktivnost = 1');
						$brojac = 0;
						while($row = mysql_fetch_array($query)){
						if($brojac == 0){
						echo '<div class="active"><a target="_blank" href="'.$row['link'].'"><img style="margin:0 auto; padding:20px;" src="rs/images/'.$row['putanja'].'" /></a></div>';
						$brojac++;
					}else{
						echo '<div><a target="_blank" href="'.$row['link'].'"><img style="margin:0 auto; padding:20px;" src="rs/images/'.$row['putanja'].'" /></a></div>';
						}
					}

					
					?>						
			</div>
			<!-- End baneri left-->	
		</div>

		<div class="col-sm-8" style="margin-top:20px;">	

			<p>
			<h3 align="center">USLOVI KORIŠĆENJA</h3>
<h4>1. Pružanje usluga</h4>
Hellaserb.rs je dvojezični( srpsko - grčki) internet portal, na kome  se prenose  poslovne oglasne poruke korisnika portala (pravnih lica) iz Srbije i Grčke. Samo registrovani korisnici portala,  mogu postavljati internet oglasne poruke,  a  u skladu sa Zakonom o oglašavanju Republike Srbije. Oglasna poruka sa sadržajem  u izvornom obliku, dostavljena od strane korisnika – autora oglasa, biće objavljena nakon prevoda na grčki jezik od strane administratora , ali  bez promene osnovnog smisla i u skladu sa pravilima. Oglasne poruke, kao i tekstovi objavljeni na portalu, su dostupni korisnicima na srpskom i grčkom jeziku.
Korisnici portala mogu izabrati sledeće korisničke naloge:
Besplatan korisnički nalog 
         internet poslovno  oglašavanje
Plaćeni korisnički nalog
         internet poslovno oglašavanje
         internet  (baner)  reklamiranje
Svim registrovanim korisnicima  portala, iz Srbije i Grčke, je omogućeno da postave samo jedan besplatan oglas, pri čemu nemaju  mogućnost:
-pristupa informacijama  koje su postavljene na portal,
-slanja upita za informacija koje se odnose na Grčko tržište,
-korišćenja naših usluga.
Korisnicima  portala iz Srbije i Grčke,  koji su izabrali plaćeni korisnički nalog,  omogućeno je:
-pristupanje informacijama koje su postavljene na portal, a odnose se na tržište Grčke,
-slanje upita za informacije vezane za delatnost/usluge ili proizvod kojim se bave, a odnose se na tržište Grčke,
-korišćenje naših usluga.
Prilikom slanja upita za tražene informacije, korisnik mora voditi računa o sledećem:
-informacije, koje vam prosleđujemo, su vezane za tržište Grčke,
-upit se mora odnositi na delatnost ili uslugu kojom se bavite, ili na proizvod koji se nalazi u sferi vašeg poslovanja i na oglasnu kategoriju gde je oglasna poruka postavljena.

Informacije obuhvataju ( u skladu sa gore navedenim):
-pravne    uslove poslovanja,
-poreske  uslove poslovanja,
-carinske uslove poslovanja,
-stanje na tržištu grčke.

Usluge koje pružamo, a u dogovoru sa vama, obuhvataju sledeće:
-da  informišemo izlagače na sajmovima u Atini i Solunu, o vašoj firmi i proizvodima,
-da pravnim licima iz naše baze podataka, elektronskim putem predložimo da vas kontaktiraju,
-da izvršimo pripremu sastanaka sa zainteresovanim firmama iz Grčke.
Informacije kao i usluge, koje pružamo registrovanim korisnicima sa plaćenim korisničkim nalogom i pod kojim uslovima,  su jasno navedene na portalu  hellaserb.rs
Cenovnik oglašavanja, banerske pozicije i oglasnie pozije, na vaš zahtev poslaćemo vam na e-mail adresu
Svi tekstovi koji su na portalu hellaserb objavljeni, kao i sva obaveštenja koja ste dobili od strane hellaserb-a, bilo  uz Vašu saglasnost ili  na vaš poslati upit za traženu informaciju, su čisto obaveštavajućeg  karatktera.  Samim tim, svrha je da se obezbedi osnovno razumevanje tematike. Ne treba ih koristiti kao zamenu za profesionalne savete ili osnov u procesu odlučivanja po bilo kom pitanju. Ne preuzimamo odgovornost za izjave, slobodna tumačenja, greške ili izostavljanje podataka. 
Hellaserb.rs može postavljati  linkove prema drugim stranicama. Za vreme poseta drugim stranicama, Vi ste predmet privatnih pravila i regulacije stranice na kojoj se nalazite. Prihvatate na znanje da portal  hellaserb.rs nije razvio  tu stranicu, nema uticaja na nju, i ne snosi odgovornost za sadržaj koji je tamo objavljen.
Programi održavanja sajmova, objavljeni su na portalu u dobroj nameri, za eventualne promene datuma održavanja ne snosimo nikakvu odgovornost. Program održavanja sajmova je isključivo u nadležnosti organizatora sajamskih manifestacija.
Korisnik se na sajtu može opredeliti i za korišćenje drugih usluga koje nudi vlasnik sajta, a koje su opisane na samom sajtu i podložne su posebnom načinu plaćanja.Mi zadržavamo  pravo da shodno svojoj poslovnoj politici menjamo  cene svojih usluga. Ostalim korisnicima omogućena je besplatna pretraga i kontaktiranje oglašivača.
Hellaserb.rs je Drugi prenosilac oglasne poruke i u tom smislu ne oglašava niti oglašava za račun drugih već prenosi, odnosno izlaže oglasne poruke oglašivača na svojim Internet stranicama. 
<h4>2.Registracija korisnika</h4>
Da bi korisnik postavio oglas i koristio usluge sajta www.hellaserb.rs  potrebno je prethodno izvršiti registraciju, koja je besplatna i obavlja se popunjavanjem e-mail adrese i lozinke, u toku samog popunjavanja forme za postavljanje oglasa.Tom prilikom obavezno unesite ispravnu email adresu radi verifikacije, samo u tom slučaju vaš oglas će biti objavljen.
Na  email adresu korisnika, stići će poruka sa linkom za aktiviranje naloga. Klikom na link korisnik  potvrđuje svoju  email adresu i time je postupak registracje okončan.
Pre postavljanja  oglasne poruke,  a prilikom registracije, obavezno proćitajte opšte uslove korišćenja portala.
Korisnik koji se registrovao i  koji je postavio oglas, bez obzira koji je korisnički  nalog izabrao, ima sva prava i obaveze koje su proistekle iz Zakona o oglašavanju Republike Srbije. Pravno lice može imati i koristiti samo jedan registrovan nalog.
Svaki registrovani korisnik prihvata mogućnost kontakta na e-mail, ili na broj telefona u cilju uspostavljanja poslovnih kontakata iz oglasa, kao i kontakta od strane Hellaserb.rs  tima u vezi sa pomoći ili promocijom naših usluga. Oglašivač prihvata da će sadržaj oglasa - uneti tekst sa slikama i njegov kontakt telefon, e-mail adresa biti objavljeni na portal Hellaserb.rs  te da će kao takav biti javno dostupan svima na Internetu.
<h4>3. Deklaracija</h4>
Oglašivač je i proizvođač oglasne poruke  dužan je, da Deklaraciju sa tačnim podacima, dostavi licu koje objavljuje ili emituje oglasne poruke, što je propisano Zakonom o oglašavanju (član 11.). Ovim dokumentom oglašivač garantuje za tačnost unetih podataka i sadržinu oglasne poruke.Svrha prikupljanja podataka je takođe i sprečavanje zloupotreba u oglašavanju.
Tokom registracije (korisnika) pravnog lica, podaci uneti tom prilikom činiće Deklaraciju o oglašavanju, i obavezna je za sva pravna lica – preduzeća ili preduzetnike.
Popunjavanjem forme deklaracije i njenim slanjem administratoru, elektronskim putem, korisnik  potvrđuje svoju registraciju, da je  prihvatio opšte uslove korišćenja  i da garantuje za tačnost unetih podataka.
Takođe ovim putem korisnik garantuje i za verodostojnost svih oglasnih poruka koje je prosledio.U slučaju bilo kakve promene nad unetim podacima dužan sam dostaviti novu Deklaraciju o oglašavanju.U slučaju da uneti podaci nisu tačni ili nisu na vreme ažurirani vlasnik sajta i prenosilac oglasne poruke Worth Biomin ne snose nikakvu odgovornost.
Prilikom popunjavanja deklaracije, korisnik bira vrstu korisničkog naloga pod kojim će portal koristiti. Internet poslovni oglas neće biti postavljen, ukoliko korisnik ne izabere vrstu naloga.
Za svaku oglasnu poruku, pravno lice je u obavezi da deklaraciju, uredno i tačno  popuni sa  svim obaveznim podacima koji se odnose na deklaraciju.
Podaci uneti u deklaraciju, neće biti javno dostupni i biće tretirani  kao poverljivi u skladu sa Zakonom o zaštiti podataka o ličnosti
Ukoliko  korisnik  ne želi da unese svoje podatke ili ne dostavi deklaraciju to i ne mora, ali u tom slučaju oglasna poruka neće biti objavljena. Neobjavljene oglase objavićemo po prijemu deklaracije.
Period trajanja deklaracije je  sve do promene podataka o oglašivaču. U slučaju promene podataka, oglašivač je dužan da  novu deklaraciju, sa unetim promenama, pošalje emiteru oglasne poruke.
Krivični zakon Republike Srbije – Računarska prevara (čl. 301)
Ko unese netačan podatak, propusti unošenje tačnog podatka ili na drugi način prikrije ili lažno prikaže podatak i time utiče na rezultat elektronske obrade i prenosa podataka u nameri da sebi ili drugom pribavi protivpravnu imovinsku korist i time drugom prouzrokuje imovinsku štetu, kazniće se novčanom kaznom ili zatvorom do 3 godine
<h4>4. Sadržaj oglasa</h4>
Prema Zakonu o oglašavanju zabranjen je svaki vid neistinitog, upoređujućeg, lažnog i oglašavanja koje za cilj ima prevaru, a kojim se dovode u zabludu primaoci oglasne poruke. Internet poslovni oglas, treba da sadrži isključivo podatke o firmi, opis delatnosti, proizvoda ili usluga.
Specijalni grafički karakteri, Web adrese, e-mail adrese i facebook,  u naslovu teksta oglasa radi isticanja oglasa, nije dopušteno koristiti, kao ni prikazivanje kontakt telefona. Naslov oglasa treba da se odnosi samo na naziv firme, predmet prodaje ili uslugu.
Internet poslovni oglas svojim sadržajem mora da pripada kategoriji u koju je i postavljen.
Objavljivanje oglasa  je dostupno isključivo registrovanim korisnicima.Vreme trajanja oglasne poruke određuje registrovani korisnik-autor oglasne poruke, prilikom popunjavnja Deklaracije o oglašavanju.
Registrovanom korisniku je omogućeno jedno besplatno postavljanje oglasa. Sem slučajeva kada se može naplaćivati, ali sa cenovnikom koji je prethodno definisan. 
Fotografije sa drugih sajtova, kao i oglasi drugih oglašivača, nije dozvoljeno upotrebljavati prilikom oglašavanja na našem sajtu.
Hellaserb.rs  zadržava pravo, da izvrši korekturu sadržaja oglasne poruke, koje su dostavljene  od strane korisnika, kao i prevod teksta sa srpskpog na grčki jezik i obrnuto, ali da se ne promeni osnovna smisao oglasne poruke, i sve to u skladu sa  Zakonom o oglašavanju i usvojenim uslovima  korišćenja.
<h4>5. Pravila oglašavanja i ponašanja korisnika – autora oglasa</h4>
Sve oglasne poruke moraju biti usklađene sa Zakonom o oglašavanju Republike Srbije i Zakonom o autorskim i srodnim pravima. Biće obrisan svaki oglas,  koji nije u skladu sa napred navedenim, iz baze oglasa na portalu.
Koirisnik, prilikom postavljanja oglasa, se  mora  pridržavati i poštovati sledeća pravila oglašavanja:

-oglas postaviti u odgovarajuću kategoriju, podkategoriju,  državu i grad kome pripada vaš oglas,
-odaberete  korisnički nalog,
-pre slanja oglasa, proverite  sve upisane podatke i sadržaj oglasa
-sadržaj oglasa mora biti istinit,  potpun i određen,
-u oglasnu poruku ne unosite sadržaj koji je zaštićen autorskim pravima i zakonom, a da prethodno nemate dozvolu vlasnika, autora,
-ne unosite lažne podatke i dezinformacije,
-ne unosite tuđe podatke , kontakt telefone, email adrese i dr. U suprotnom putem nadležnih organa, zakonskim putem biće rešena zloupotreba ličnih podataka,
-ne unosite uvredljive poruke, niti  poruke koje izazivaju netrpeljivost i diskriminaciju po bilo kom osnovu, i bilo koji drugi uvredljiv sadržaj,
-ne unosite tekstove koji nisu u vezi sa predmetom oglašavanja,
-ne upisujte u oglasnu poruku  link  drugog sajta odnosno portala.
-ne  kopirajte  tekst i grafiku  sa našeg sajta, iz bilo kog razloga,  bez naše dozvole.
-ne ubacujte  URL link firme, webshopa ili drugog sajta (pogotovu konkurentskog ili sajta koji promoviše "zaradu preko Interneta"), u svrhu reklame. 
-ne postavljajte slike drugih internet portala kao i fotografije osoba,
-zabranjeno je koristiti portal Hellaserb  za prenos poruka drugim članovima,
-zabranjeno je slanje spam poruka članovima portala Hellaserb. Spam poruka je više puta ponovljena  poruka koja nije u vezi sa oglasom oglašivača,
-zabranjeno je je slanje  poruka u kojima se direktno ili indirektno promovišu drugi portali.
Za sav sadržaj koji postavi na portal, korisnik – autor je sam odgovoran. Korišćenjem portala ste se saglasili da usluge portala nećete koristiti za:
-prenošenje  bilo kog sadržaja na portal hellaserb.rs čija bi reprodukcija značila kršenje autorskih prava ili drugih prava trećih osoba, kao i bilo kog zakona,
-korišćenje bilo koje ponuđene onlajn usluge portala u nemoralne, nepoštene ili ilegalne svrhe,
-zabranjeno je da se koriste usluge portala radi objave ili bilo koje druge cirkulacije matrijala sa kažnjivim,  nepoštenim i ilegalnim sadržajem,  kao i onim  sadržajem koji  se može smatrati klevetom. 
-zabranjena je cirkulacija protivustavnih i ekstremističkih materijala grupa čiji rad nije dozvoljen zakonom. U slučaju da se ne poštuju ovi opšti uslovi sa vaše strane ili treće strane koja koristi ili je koristila  usluge portala preko vašeg naloga bićete momentalno suspendovani i neće vam se omogućiti  pristup web-stranicama
-prenos i slanje cirkularnih mejlova ili pisama
-prenos sadržaja koji imaju softver, aplikacije, programe ili „viruse”  čime se narušavaju ili ograničavaju funkcionalnost hardvera ili softvera portala ili pak drugih korisnika
-davanje neistinitih ili nejasnih podataka, kao ni za upisivanje pod lažnim identitetom prilikom registracije 
-uznemiravanje drugih korisnika kao ni za nanošenje štete maloletnicima na bilo koji način 
-pokušaje dobijanja neovlašćenog pristupa bilo kojoj usluzi portala, kao ni bilo kojim podacima, mreži ili sistemu uopšte 
-vršenje  aktivnosti koje narušavaju privatnost ili imovinska prava drugih 
-aploudovanje elektronske pošte, prenošenje ili  postavljanje sadržaja koji je nezakonit, štetan, preteći, uvredljiv, uznemirujući, kriminalan, klevetnički, vulgaran, narušava tuđu privatnost, propagira mržnju ili je rasno, etnički i na svaki drugi način nepoželjan

Sadržajem  oglasa  se ne  sme ni na koji način  vređati  čitaoci, autori drugih oglasa ili bilo koja druga osobu. Poslovni jezik je jezik korišćenja oglasa, i stoga Vas molimo da ga se pridržavate.
Ne preuzimamo nikakvu odgovornost, za sadržaje koji poseduju eksterne linkove.
Administratori sajta zadržavaju pravo da oglas ne objave ukoliko smatraju da je neprimeran ili krši neke od navedenih stavki.
Kao registrovani korisnik, stekli ste pravo postavljanja oglasne poruke,  samim tim 
snosite odgovornost za sadržaj oglasne poruke, i u obavezi ste da date tačne informacije i podatke za kontakt,  a u vezi sa svakim Vašim oglasom.
U slučaju reklamiranja, sa Vaše strane,  proizvoda , brenda  i sve što je zaštićeno zakonom i autorskim pravima, a ne posedujete odgovarajuće dozvole ili licence, sami  snosite potpunu odgovornost. Mi kao portal se apsolutno ograđujemo od toga i ne snosimo nikakvu odgovornost.
U slučaju žalbe oštećene strane,  uklonićemo svaki sadržaj koji krši autorska prava I to na osnovu povrede bilo kog autorskog ili drugog srodnog prava.

Pravila oglašavanja putem Hellaserb.rs su saglasna sa važežim zakonima republike Srbije. Pravila navedena na ovom sajtu  su  samo skraćena verzija važećih zakona za članove zakona koji su najčešće u upotrebi.

 Hellaserb.rs  zadržava pravo ne objavljivanja oglasa  koji sadrže  bilo koji material za koji samostalno proceni da nije u skladu sa dobrom poslovnom praksom (uključujući i oglase koji sadrže URL linkove ka drugim sajtovima koji se bave prodajom ili oglašavanjem). 

Sankcije se mogu primeniti i u cilju sprečavanja nastajanja štete ili kada usled određenog činjenja ili nečinjenja od strane korisnika usluga dolazi do otežavanja poslovne aktivnosti  ili otežavanja rada portala Hellaserb.rs

Korisnik kome  je nalog privremeno ili trajno blokiran nema prava ni na kakvu nadokandu štete zbog toga što za vreme trajanja blokade naloga nisu mogli da koriste usluge Hellaserb.rs 
<h4>6. Zabrana oglašavanja</h4>
Zabranjeno je oglašavati:
Advokate i advokatske usluge; Alkoholna pića ( osim vina i piva); Duvan i duvanske proizvode; Lekove,medicinska sredstva, metode tradicionalne i alternativne medicine; Nelegalnu kopiju proizvoda; Oruđje, delove oruđa i municiju; Opojne droge; Pornografski sadržaj,
Zabranjeno je i postavljanje  :
-slika opasnog sadržaja, 
-sadržaja koji podstiče na terorizam, 
-sadržaja za koji ne posedujete  autorska prava, bez dozvole autora, 
-bilo kakvih vulgarnih ili uvredljivih sadržaja ili bilo kakvih aktivnosti koje su u suprotnosti sa važećim zakonima i moralnim načelima.
-ne istinito i lažno oglašavanje, dovođenje nekoga u zabludu, i na uvredljiv način ili se nanosi nekome šteta ili koristi nečija lakovernost,
-oglasa  u formi proglasa ili javnog obraćanja,
-oglasa za  anaboličke stereoide  i sredstava za potenciju,
-oglasa za  sprejeva za samoodbranu i paralisanje,
-oglasa za  sve ostalo što zabranjuju odredbe Zakona o oglašavanju Republike Srbije.
-oglasne poruke, kojom se može zloupotrebiti  poverenje, odnos zavisnosti ili privrženosti, lakovernost, nedostatak iskustva ili znanja i sujeverje primalaca oglasne poruke. 
Zabrana se odnosi i na:
1) oglašavanje kojim se neistinito označava identitet oglašivača, njegova aktivnost, proizvod ili usluga;
2) izostavljanje važnih podataka, upotreba neodređenih ili višeznačnih izraza, zastarelih ili neažurnih navoda ili drugih podataka koji izazivaju zabludu o identitetu oglašivača, njegovoj aktivnosti, proizvodu ili usluzi (vrsti, svojstvima, kvalitetu, poreklu ili drugim podacima o proizvodu ili usluzi) i drugim porukama upućenim primaocu oglasne poruke;
3) oglašavanje koje predstavlja podražavanje ili kopiju drugog lica, njegove aktivnosti, proizvoda ili usluga;
4) oglašavanje kojim se omalovažava, sumnjiči ili na drugi nedostojan način prikazuje identitet drugog lica, njegove aktivnosti, proizvoda ili usluge;
5) poređenje oglašivača, njegove aktivnosti, proizvoda ili usluge sa drugim oglašivačem, njegovom aktivnošću, proizvodom ili uslugom na štetu drugog, odnosno radi sticanja materijalne koristi;
6) oglašavanje kojim se aludirajući na drugoga, njegovo poslovno ime, naziv, zaštićeni žig, aktivnost, proizvod ili uslugu, iskorišćava ugled tog drugog lica na način kojim se dovode u zabludu primaoci oglasne poruke.
7) oglašavanje  prodaje nelegalno stečenih dobara
8) oglašavanjem kojim se  mogu prikrivati bitni nedostaci, opasna ili štetna svojstva proizvoda, usluga ili drugih sadržaja koji se preporučuju primaocu oglasne poruke.
9) oglašavanje kojim se oglašivač, njegova aktivnost, proizvod ili usluga neistinito upoređuje sa aktivnostima, proizvodima ili uslugama konkurenta na štetu konkurenta ili kojim se stvara zabluda na tržištu između oglašivača i konkurenta.
10) oglašavanje kojim se oglašivač, njegova aktivnost, proizvod, usluga ili cena upoređuje sa drugim oglašivačem, njegovom aktivnošću proizvodom, uslugom ili cenom, ako su te aktivnosti, proizvodi ili usluge različite vrste ili imaju različit cilj ili namenu.
11) oglašavanje  proizvoda  ili usluge kao imitacije ili verne kopije proizvoda i usluga koje nose zaštićeni trgovački znak ili trgovačko ime, kao i koristiti prednost zaštićenog znaka ili druge oznake po kojoj se prepoznaje konkurenti.
12) oglašavanje korišćenjem ugleda ili oglasne poruke drugog lica, bez njegovog odobrenja.
13) neovlašćena upotreba zaštićenog znaka, žiga, poslovnog imena, trgovačkog naziva, oznake porekla proizvoda ili drugog znaka, po kojima se prepoznaje konkurent.
14) prikrivanje  bitnih  nedostataka, opasnih ili štetnih  svojstva proizvoda, usluga ili drugih sadržaja koji se preporučuju primaocu oglasne poruke.
15) oglašavanje kojim se neopravdano iskorišćava zabrinutost ljudi za očuvanje zdravlja ili zdrave životne sredine, kao i nedostatak njihovog znanja o načinima i sredstvima zaštite životne sredine.
16) oglasne poruke koje mogu da sadrže neistinite tvrdnje da proizvod ili usluga imaju pozitivan ili negativan uticaj na zaštitu zdravlja ili životne sredine, naročito isticanjem reči "ekološki siguran", "ekološki neškodljiv", "eko hrana", "zdrava hrana" i sličnih reči ili simbola koji imaju isto značenje.
17) lično dobro javnih ličnosti, kao što su muzičari, glumci, sportisti, političari i drugi, ne može da se upotrebi u oglašavanju proizvoda namenjenih maloletnicima, kao i proizvoda čija je prodaja maloletnicima zabranjena.
18) oglašavanje kojim se primalac oglasne poruke dovodi u zabludu u pogledu cene proizvoda oglašavanjem rasprodaje, prividnog sniženja cene proizvoda ili usluga, kao i oglašavanje netačnog iznosa sniženja cena ili drugih pogodnosti.
19) oglašavanje stručno-medicinskih postupaka i metoda zdravstvene zaštite, uključujući i metode i postupke tradicionalne i alternativne medicine u sredstvima javnog informisanja, u skladu sa zakonom kojim se uređuje zdravstvena zaštita.
20) zloupotrebu neiskustva, neznanja i lakovernost maloletnih lica 
O važećim zakonskim normama u Republici Srbiji, za sve dodatne informacije, informišite se na linku  http://www.parlament.gov.rs/akti/doneti-zakoni/doneti-zakoni.1033.html 
<h4>7. Stopiranje oglasa i fotografija u oglasu</h4>
Oglas će biti  stopiran  ukoliko:
•	Tekst oglasa nije u skladu sa Zakonom o oglašavanju i uređivačkom politikom Hellaserb.rs
•	Je više puta ponovljen identičan oglas. 
•	Je oglas postavljen  u kategoriju koja ne odgovara tekstu oglasa. 
•	Ste postavili oglas, sa korisničkim nalogom plaćeni internet oglas, a nije evidentirana uplata, u dogovorenom roku od 7 dana, od dana postavljanja oglasa.
•	Ste postavili  oglas a niste dostavili deklaraciju ili je deklaracija nepotpuna (nedostaju obavezni podaci). Neobjavljene oglase objavićemo po prijemu propisane Deklaracije.
Hellaserb.rs  zadržava  pravo da trajno ili privremeno  suspenduju korisnike koji krše zakone, pravila pristojnog ponašanja i opšte uslove, ili iz nekih drugih razloga portal hellaserb.rs  smatra ozbiljnom zloupotrebom internet usluga portala, a i da ukloni neprihvatljiv sadržaj sa svojih web-stranica.Tom prilikom ukoliko je korisnik izabrao plaćeni korisnički nalog, tom korisniku  novac neće biti vraćen.
Suspedovanje  korisničkog naloga, od strane administratora, biće izvršeno u slučaju višestrukog ponavljanja oglasa, od strane istog autora, kao i svih  njegovih oglasa na sajtu.Takođe i u slučaju registrovanja više korisničkih naloga, a u cilju  postavljanja istih ili sličnih oglasa, od strane jednog lica, podleže suspendovanju naloga. U oba ova slučaja neće doći do suspendovanja besplatnog oglasa i korisničkog  naloga ukoliko je, za svaki ponovljeni oglas od istog autora,  ili više različitih  ili sličnih  oglas postavljenih  od jednog lica,evidentirana uplata po prethodno utvrđenom cenovniku za svaki naredni postavljeni oglas.
Hellaserb.rs  zadržava pravo brisanja tekstova oglasnih poruka, postavljenih od strane registrovanih korisnika kao i fotografije, u slučaju da nisu podobni, i to bez prethodne najave.
Zabranjeno je da se portal koristi za iskazivanje rasne, nacionalne, verske mržnje, u terorističke svrhe, seksualne diskriminacije i dr. Uz oglas možete postaviti 5 fotografija, koje mogu prikazivati vašu firmu, logo  ili proizvode.
Ne dozvoljavaju se fotografije sa neprimernim sadržajem, koje se ne uklapaju u tekst oglasa,  Takođe nije dozvoljeno postavljanje fotografija sa drugih sajtova,  koje sadrže e-mail ili web adresu oglašivača, kao i fotogtafije koje su iz  drugih štampanih medija.
<h4>8. Obaveštavanje na mail korisnika</h4>
Nakon izvršene registracije, korisnik je pristao na periodično primanje promotivnih mejlova od strane Hellaserb.rs portala, kao i na obaveštavanje vezano za usluge i o statusu oglasa/reklame,  nevedene u tački 1. ovog dokumeta. Ukoliko korisnik želi da otkaže primanje jednih i/ili drugih, potrebno je obavestiti nas putem mejla koji se nalazi u formi za kontakt na sajtu.
Hellaserb.rs  može slati  elektronsku poštu pojedinim firmama, sa ili van teritorije Srbije i Grčke, koje nisu korisnici ovog portala, a u cilju da se obaveste da Vašu oglasnu poruku mogu pogledati na ovom sajtu.Takođe Hellaserb.rs  može slati informacije koje su navedene na sajtu, na zahtev registrovanih korisnika sa plaćenim korisničkim nalogom, kao i informacije o ostvarenim kontaktima sa pravnim licima iz naše baze podataka i sa izlagačima na sajmovima u Beogradu i Novom Sadu.
U slučaju bilo kakvog pitanja, molimo Vas da nas kontaktirate putem e-maila.
<h4>9. Upotreba i zaštita podataka</h4>
Vaša je dužnost da obezbedite tačnost,  istinitost i  potpunost podataka koje prilažete. Prilikom postavljanja oglasa, Vaše lične podatke koje ste tom prilikom naveli u Deklaraciji o oglašavanju, Hellaserb.rs  je dužan da ih zaštiti u skladu  sa zakonom o autorskim i srodnim pravima, i  čuvaće ih   u svojoj bazi podataka. I u skladu sa Zakonom o zaštiti podataka ličnosti Republike Srbije, Hellaserb, ne može garantovati da u slučaju  hakerskih upada u bazu podataka, bez znanja ili odobrenja sa naše strane, ili na neki drugi način a na koji hellaserb ne može uticati, treća lica neće doći u posed tih informacija
Vaši lični podaci  neće biti dostupni trećim licima. U slučaju kada postoji sumnja o nezakonitim radnjama, ti podaci biće podeljeni sa policijom Republike Srbije.
Hellaserb.rs zadržava pravo, da izvrši korekturu sadržaja oglasne poruke, koje su dostavljene od strane korisnika, kao i prevod teksta sa srpskog na grčki i obrnuto, ali da se ne promeni osnovna smisao oglasne poruke, i sve to u skladu sa Zakonom o oglašavanju i usvojenim pravilima korišćenja.
Ukoliko koristite portal hellaserb.rs, saglasni ste s time da sve informacije ili podaci o Vašoj firmi i proizvodima / uslugama  i ostale vrste podataka koje ste predali u oglasnoj poruci budu dostupni svima koji su za njih zainteresovani, a sve to u skladu s uslovima korišćenja. 
Ovo se odnosi i na korišćenje vaših ličnih podataka (telefona,emaila i dr.) od strane portala hellaserb.rs u svrhu slanja obaveštenja u vezi oglasa koji ste vi kao korisnik – autor predali na portal. Korisnik-autor oglasa je saglasan da se podaci koje je dao mogu koristiti u marketinške svrhe (slanje e-mailova i SMS poruka).
Hellaserb.rs  može postavljati linkove prema drugim stranicama. Za vreme poseta drugim stranicama, Vi ste predmet privatnih pravila i regulacije stranice na kojoj se nalazite. Prihvatate na znanje da portal hellaserb.rs nije razvio tu stranicu, nema uticaja na nju, i ne snosi odgovornost za sadržaj koji je tamo objavljen.
Hellaserb.rs prikuplja samo nužne i osnovne podatke o oglašivačima-korisnicima, kao i one propisane Zakonom o oglašavanju, informiše korisnike o načinu njihovog korišćenja i redovno daje korisnicima mogućnost izbora o upotrebi njihovih podataka.
<h4>10. Odricanje odgovornosti</h4>
Svi tekstovi i članci koji su ovde objavljeni,  su samo neobavezne informacije i čisto obaveštavajućeg  karaktera. Samim tim, svrha je da obezbede osnovno razumevanje tematike. Ne treba ih  koristiti kao zamenu za profesionalni savet ili osnov u procesu odlučivanja ili dejstvovanja bez prethodnih konsultacija, koristite ih na svoju ličnu odgovornost i rizik. Hellaserb  ne preuzima nikakvu  odgovornost za predlog dan u članku, izjave, slobodna tumačenja, greške ili izostavljanje podataka. Izražena mišljenja su lična mišljenja autora.  U slučaju da se ne slažete sa navedenim uslovima korišćenja,  molimo Vas da naš portal ne koristite, u suprotnom, davanjem Vašeg pristanka dali ste saglasnost da se slažete sa svim delovima nevedenih uslova korišćenja.
Hellaserb.rs  ne preuzima odgovornost  za išta bilo da je u pitanju članak i tekstovi bilo da se odnosi na oglase.
Hellaserb.rs i njegov vlasnik, isključuje sopstvenu odgovornost i ne daje nikakvu garanciju:
-za sadržaj poruka koje korisnici razmenjuju koristeći sistem privatnih i E-mail poruka 
-za sadržaj podataka skladištenih u bazi podataka ili objavljenih na portalu, i nije dužan da pregleda podatke koje je skladištio, preneo ili učinio dostupnim 
-za sadržaj na drugim portalima, kada korisnici u oglas umeću linkove ka drugim portalima 
-za tačnost i informacije koje unose korisnici u svojim oglasima. i  nije odgovoran za materijalnu, finansijsku, duševnu, ili bilo kakvu drugu vrstu štete koja može nastati kao rezultat korištenja ovog portala
-za sadržaj, tačnost, kompletnost, pouzdanost, zakonitost , dostupnost informacija i  sadržaja, koje unose registrovani korisnici, a prikazani su na sajtu
-za pogrešno ili neblagovremeno dostavljanje, bilo kakvih informacija i sadržaja I njihovo brisanje
-za kontinuirano funkcionisanje sajta, i  za greške na stranicama,
-za ponašanje i izjave bilo koje treće strane korišćenjem  usluga sajta
-za prekid rada servisa ili nepravilno funkcionisanje, a što je prouzrokovano direktno ili indirektno, prirodnima silama kao i drugim uzrocima koje su izvan moći naše kontrole; kao što su štrajkovi, nemiri, problemi u radu  telekomunikacione opreme i uređaja,  prekid i nestanak struje, teškoće u radu sa internetom, kvarovi na kompjuterskoj opremi naredbe državnih i drugih organa.
-za pravilno ili nepravilno korišćenje ovog sajta, i za eventualnu štetu koja po tom osnovu nastane, kao i od drugih informacija, servisa, usluga, saveta i proizvoda do kojih se došlo pomoću linkova i reklama na sajtu ili onih koji su na bilo koji način povezani s njim,
-za štetu koja je nastala skidanjem fajlova ili pristupom bilo kom sadržaju  na internetu do koga se došlo uz pomoć ovog sajta.
Hellaserb.rs  zadržava pravo da isključi,  iz dalje upotrebe stranica,  korisnika koji zloupotrebljava ili na bilo koji našin neovlašćeno koristi sajt,
U slučaju eventualnih sporova koji su nastali iz odnosa oglašivača i korisnika rešavaju se isključivo između oglašivača i korisnika. Za štetu bilo koje vrste nastale kao posledica takvih odnosa Hellaserb.rs  nije odgovoran.
Stavovi koji su izneti u okviru sajta nisu stavovi Hellaserb-a, već ih samo prenosimo „onakve kakvi jesu” te za njihovu sadržinu nismo odgovorni u bilo kom smislu. Ukoliko se oglašivač ipak odlučio da učini javnim bilo koje podatke koji omogućuju ličnu identifikaciju, čini to na sopstvenu odgovornost.
Korišćenjem  sajta prihvatili ste  punu odgovornost za bilo kakvu štetu nastalu zbog informacija do kojih ste došli pomoću ovog sajta, za štetu nastalu učitavanjem fajlova i dokumenata na vaš računar kao i za bilo koji drugi vid štete nastao zbog bilo kakvih sadržaja do kojih ste došli pomoću ovog sajta. Takođe, svesni ste i slažete se da Hellaserb.rs  neće biti odgovoran vama za bilo kakvu direktnu, indirektnu, slučajnu, posebnu, posledičnu ili primarnu štetu, uključujući, ali ne ograničavajući se na štetu za gubitak profita, dobre volje, korišćenja, gubitak podataka ili drugih nematerijalnih gubitaka koji proizilaze iz korišćenja ili nemogućnosti korišćenja usluge koju nudi portal.
Hellaserb.rs  je prenosilac oglasnih poruka i ne  snosi odgovornost u vezi verodostojnosti oglašivača niti sadržaja oglasnih poruka. Takođe, hellaserb.rs  ne snosi nikakvu odgovornost u vezi bilo kakvih karakteristika kupljenih – prodatih predmeta-usluga.
Svi oglasi i informacije vezane za oglašavanje dolaze od treće strane (različitih oglašivača). Treća strana je odgovorna za tačnost i kvalitet informacija. Portal www.hellaserb.rs nije odgovoran za sadržaj postavljenih oglasa. Prevod postavlja administrator za odgovarajuću zemlju.
Sva prava, uključujući i pravo na prevod na bilo koji jezik, zadržava Hellaserb.rs, ali ne odgovara za eventualne greške ili netačnosti.
U slučaju da zbog više sile ili tehničkih problema  Hellaserb.rs nije dostupan svima ili nekom delu svojih korisnika u toku određenih vremenskih perioda, Hellaserb.rs  ne odgovara za eventualnu štetu nastalu zbog neemitovanja oglasnih poruka. Hellaserb.rs  zadržava pravo da iz bilo kog razloga odbije objavljivanje oglasne poruke, i u tom slučaju ne odgovara za eventulanu štetu nastalu ovim nečinjenjem.
Hellaserb.rs  ne prihvata odgovornost da kontroliše trademarks, copyright ili prava trećih lica. Hellaserb.rs  može u nekim momentima diskretno isključiti, suspendovati ili zabraniti prezentovanje proizvoda ili usluga članovima koji prekorače pravilo o autorskom ili bilo kom drugom pravu drugih članova na sajtu.
Hellaserb.rs  dobija informacije iz raličitih izvora, te nema potpunu kontrolu nad tačnosti informacija u vreme kada se one koriste. Samim tim ne može u potpunosti garantovati tačnost i ograđuje se od odgovornosti za tačnost sadržaja.
Hellaserb.rs  ne garantuje za proizvode ili usluge koji se oglašavaju na web sajtu ili u publikaciji, niti  snosi odgovornost za razultat ili bilo koji gubitak nastao pri kontaktu sa kompanijama pronađenim na sajtu www.hellaserb.rs, bilo to direktno, indirektno ili linkom sa nekim drugim sajtom na Internetu.
Hellaserb.rs  zadržava pravo izmene cena oglašavanja bez prethodne najave, kao i izgleda i funkcionalnosti sajta, ponuda proizvoda, servisa i izdavanja publikacija.
Sve informacije koje su date na sajtu su obaveštavajućeg  karaktera i vlasnik sajta ne odgovara  za bilo kakvu štetu  korisnika ,koju bi isti potraživao od vlasnika sajta.
<h4>11. Pristanak na pravila i uslove korišćenja portala</h4>
Od momenta korišćenja portala Hellaserb.rs i svih njegovih delova teksta, automatski prihvatate sve trenutne uslove koriscenja portala Hellaserb.rs, i nikakav poseban pristanak od strane korisnika nije potreban da bi ga ovi uslovi obavezivali. U svakom trenutku,  je obaveza korisnika sajta poznavanje ovih pravila i Uslova korišćenja sajta.
Hellaserb.rs  zadržava pravo izmene i dopune ovih opštih pravila i uslova korišćenja u bilo kom trenutku i bez prethodne najave, tako da oni stupaju na snagu danom njihove objave. O promenama uslova korišćenja možete se obavestiti isključivo na stranicama –  uslovi korišćenja. 
Ovom portalu i svim  njegovim sadržajima dozvoljen je pristup osobama bilo kog uzrasta, pola, rase ili seksualne orjentacije.
Korisnici portala i posetioci  su dužni da redovno čitaju uslove korišćenja i smatra se da su u svakom trenutku upoznati sa aktuelnim uslovima korišćenja i da ih razumeju u potpunosti. 
Registracijom, postavljanjem oglasa i popunjavanjem  teksta Deklaracije o oglašavanju korisnik automatski prihvata sva pravila sajta i uslove korišćenja.Na ovaj način se smatra da je zaključen ugovor između korisnika i vlasnika sajta te se neće sačinjavati drugi pisani ugovor.Na osnovu ovako sačinjenog ugovora vlasnik sajta za određene kategorije usluga koje nisu besplatne  ispostavlja račun registrovanom korisniku  usluga. Isti se dostavlja  korisniku mejlom i putem pošte.Ukoliko se radi o plaćenom korisničkom nalogu , oglas koji je postavio korisnik će se  objaviti odmah nakon prevoda na grčki jezik, u slučaju da u narednih 7 dana od dana objavljivanja oglasa ne bude evidentirana uplata od strane korisnika, oglas če biti obrisan kao i njegov korisnički nalog.U periodu od objavljivanja  oglasa pa do evidentiranja uplate, korisnik nema prava da koristi naše usluge i prima informacije, koje su navedene  na stranicama sajta.
Zadržavamo pravo da uslove i pravila korišćenja periodično menjamo i dopunjavamo.
O svim izmenama i dopunama Vi kao korisnik naših usluga bićete obavešteni putem našeg portala. 
Mi ne kontrolišemo i nismo odgovorni za sadržaj (oglasi, slike, komentari, linkovi) koji su postavili naši korisnici u svojim oglasima koji se prikazuju na našem portalu. Takodje mi ne garantujemo  tačnost podataka na drugim web sajtovima, i takve sajtove koristite na sopstveni rizik i odgovornost.

Portal Hellaserb.rs kao prenosilac oglasne poruke, ne posreduje niti učestvuje u trgovini, dogovoru i sklapanju poslovnih aranžmana između zainteresovanih strana.Svaka kupovina ili sklapanje poslova od korisnika portala  koji se oglašavaju na našem portalu je na sopstveni rizik i portal hellaserb.rs,  niti njegov  vlasnik i osnivač, neće snositi nikakvu odgovornost za eventualnu štetu nastalu prilikom bilo kakvih transakcija između korisnika portala. Korisnici portala se u svakom slučaju pozivaju na oprez prilikom međusobne trgovine.
Hellaserb.rs  zadržava pravo slanja informacija o Vašoj firmi, proizvodima ili uslugama drugim firmama ili pojedincima na Vaš zahtev, i tom prilikom ne objavljuje informacije o firmi za koje ne dobije odobrenje.. 

Postavljanjem informacija i materijala u Hellaserb.rs  bazu i sajt www.hellaserb.rs  putem besplatnog ili plaćenog korisničkog naloga odobravate nam da iste možemo  koristiti neograničeno, objavljivati, prilagođavati, reprodukovati, menjati, prevoditi, prenositi, distribuirati, i na druge načine koristiti sve ili deo informacija, materijala ili sadržaja na bilo koji način putem svih poznatih i budućih tehnologija, a neće biti objavljen materijal koji nije u skladu sa uslovima korišćenja sajta www.hellaserb.rs. Takođe, ovim se odričete i prenosite sva prava na objavljen sadržaj u korist Hellaserb.rs
Zadržavamo pravo da bez upozorenja uklonimo svaki sadržaj koji nije u skladu sa pravilnikom o korišćenju našeg servisa.

<h4>12. Sudska nadležnost</h4>

U slučaju bilo kakvog spora koji se ne može rešiti mirnim putem,  vlasnik portala Hellaserb.rs  i lice koje objavljuje oglasne poruke Worth Biomin d.o.o i korisnik portala ovim putem saglasno određuju mesnu nadležnost suda u Beogradu.





			</p>

		</div>

		<div class="col-sm-2" class="margin-top:20px; margin:0 auto;">
			<!-- Baneri right-->

			<style type="text/css">
				#cycler{position:relative;}
				#cycler div{position:absolute;z-index:1}
				#cycler div.active{z-index:3}
			</style>


			<script type="text/javascript">
				function cycleImages(){
					      var $active = $('#cycler .active');
					      var $next = ($active.next().length > 0) ? $active.next() : $('#cycler div:first');
					      $next.css('z-index',2);//move the next image up the pile
					      $active.fadeOut(1500,function(){//fade out the top image
						  $active.css('z-index',1).show().removeClass('active');//reset the z-index and unhide the image
					          $next.css('z-index',3).addClass('active');//make the next image the top one
					      });
					    }

					$(document).ready(function(){
					// run every 7s
					setInterval('cycleImages()', 7000);
					})
			</script>

		
			<div id="cycler">
			<?php
						include('konekcija.php');

						$query = mysql_query('SELECT * FROM baneri WHERE aktivnost = 1');
						$brojac = 0;
						while($row = mysql_fetch_array($query)){
						if($brojac == 0){
						echo '<div class="active"><a target="_blank" href="'.$row['link'].'"><img style="margin:0 auto; padding:20px;" src="rs/images/'.$row['putanja'].'" /></a></div>';
						$brojac++;
					}else{
						echo '<div><a target="_blank" href="'.$row['link'].'"><img style="margin:0 auto; padding:20px;" src="rs/images/'.$row['putanja'].'" /></a></div>';
						}
					}

					
					?>	
	
			</div>
			<!-- End baneri right-->
		</div>

		</div><!-- End row-->	
		</div><!-- End container-->
		

		<!-- Footer-->
		
			<footer class="footer"> 
			<hr>
				<div class="container text-center">
				

					<p>HellaSerb 2015. | <a href="declaration.php">Δήλωση</a> | <a href="terms_of_use.php">Όροι χρήσης</a> | <a href="privacy_policy.php">Προστασία Προσωπικών Δεδομένων</a></p>


				</div><!-- End container-->
				
			</footer>

			<!-- Back to top-->

			<a href="#" class="back-to-top" style="display: inline;">
				<i class="fa fa-arrow-circle-up"></i>
			</a>


<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>	
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>	
</body>
</html>