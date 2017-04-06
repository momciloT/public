<!-- tab panes -->
  <div id="prod_wrapper">
    <div id="panes">
      <div> <img src="images/p.jpg" height="300px"  alt="">
        <h2>Dobrodošli u hotel Planinarski dom</h2>
        <p>Hotel Planinarski dom se nalazi na Staroj planini u sklopu turističkog centra u Pirotu na idealnih 1500 m nadmorske visine. Tradicionalna gostoljubivost ugostiteljskih radnika, ambijent i usluge čine Hotel Planinarski dom centralnim objektom turističke ponude Pirota i okoline. Naš hotel je idealno mesto za održavanje značajnijih poslovnih, svečanih i sportsko - rekreativnih skupova ali i za opuštanje i uživanje u miru i autentičnoj prirodi.  </p>
        <p style="text-align:right; margin-right: 16px"><a href="index.php?kontakt" class="button">Kontakt</a></p>
      </div>
      <div> <img src="images/pc.jpg" height="300px" alt="">
        <h2>Konferencijska sala</h2>
        <p> Imajući u vidu visok nivo zahteva savremenog načina poslovanja, Planinarski dom je poslovnim ljudima stavio na raspolaganje salu za sastanke kapaciteta do 80 sedećih mesta, koja je namenjena organizovanju prezentacija, promocija, pres-konferencija i radnih sastanaka.
		Konferencijska sala je opremljena video bimom, kompjuterom, TV uređajem, video i DVD uređajem i bežičnim internet pristupom.
        Nudimo Vam mogućnost organizacije svih Vaših poslovnih obaveza vezano za štampanje potrebnog materijala, slanje pozivnica poslovnim saradnicima i sl. Ovo je pravo mesto na kome, neometano, možete održavati radne i privatne skupove.  </p>
      </div>
      <div> <img src="images/13.jpg" height="300px" alt="">
        <h2>Dvokrevetne sobe</h2>
        <p>Dvokrevetne sobe od 3300 rsd</p>
        <p style="text-align:right; margin-right: 16px"><a href="index.php?soba=2" class="button">Saznaj više</a></p>
      </div>
      <div> <img src="images/14.jpg" height="300px" alt="">
        <h2>Jednokrevetne sobe</h2>
        <p>Jednokrevetne sobe od 2500 rsd </p>
        <p style="text-align:right; margin-right: 16px"><a href="index.php?soba=1" class="button">Saznaj više</a></p>
      </div>
      <div> <img src="images/penzosi.jpg" height="300px" alt="">
        <h2>Popusti za penzionere</h2>
        <p> U saradnji sa Fondom za penzijsko i invalidsko osiguranje omogućili smo svim penzionerima, da uzivaju u prirodi i apartmanima hotela Planinarski dom Pirot. Posetite nas sa poslednjim penzionim čekom i obezbedite sebi neophodni odmor na planini.  </p>
      </div>
    </div>
    <!-- END tab panes -->
    <br clear="all">
    <!-- navigator -->
    <div id="prod_nav">
      <ul>
        <li><a href="#"><img src="images/p.jpg" width="160" height="96px" alt=""><strong>Dobrodošli</strong></a></li>
        <li><a href="#"><img src="images/pc.jpg" width="160" height="96px" alt=""><strong>Konferencijska sala</strong></a></li>
        <li><a href="#"><img src="images/13.jpg" width="160" height="96px" alt=""><strong>Dvokrevetne sobe</strong></a></li>
        <li><a href="#"><img src="images/14.jpg" width="160" height="96px" alt=""><strong>Jednokrevetne sobe</strong> </a></li>
       <li><a href="#"><img src="images/penzosi.jpg" width="160" height="96px" alt=""><strong>Pogodnosti za penzionere</strong> od   20 %</a></li>
 
      </ul>
    </div>
    <!-- END navigator -->
  </div>
  <!-- END prod wrapper -->
  <div style="clear:both"></div>

  <div style="clear:both; height: 40px"></div>
 <div id="anketa">
 <div style="text-align: center; background: url('img/heading_bg.png') repeat;">
 <span><h2 style="text-align: center;"> <span style="background-color:#FFF;">Anketa - ocenite sajt</span></h2></span></div><form name="sex" style="text-align: center;">
 <?php
 include("konekcija.php");
 $upit="SELECT * FROM anketa";
 $rez=mysql_query($upit,$konekcija)or die("Upit nije izvrsen".mysql_error());
 while($niz=mysql_fetch_array($rez))
 {
 echo '<input type="radio" name="sex" value="'.$niz['Odgovor'].'"/>'.$niz['Odgovor'];
 }
?></br><input type="button"  class="button" value="Galasaj" onclick="anketa()" style="margin-top: 10px;"></form></div>
 <script type="text/javascript">

var xmlHttp=null;
function GetXmlHttpObject()
{

	var xmlHttp=null;
	try{
xmlHttp=new XMLHttpRequest();

	}
	catch(e){
		try{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
				alert("2");
		}
		catch(e){
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlHttp;
}

 function rezultat(){
 if(xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
			document.getElementById("anketa").innerHTML=xmlHttp.responseText;
	}
 }
 function anketa(){
 xmlHttp=GetXmlHttpObject();
 if(xmlHttp!=null){
 var url="obrada.php";

var rates = document.getElementsByName('sex');
var rate_value;
for(var i = 0; i < rates.length; i++){
    if(rates[i].checked){
        rate_value = rates[i].value;
    }
}
if(rate_value==null)
{
alert("Niste odabrali odgovor!");
}else{
	url=url+"?odg="+rate_value;
	
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	xmlHttp.onreadystatechange=rezultat;

    setTimeout( "$('#anketa').hide(2000);",15000);
	
	
 }
 }
 }
  
</script>