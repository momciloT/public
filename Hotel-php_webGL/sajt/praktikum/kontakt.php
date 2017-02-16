
  <div class="one-half">
    <div class="heading_bg">
      <h2>Kontakt</h2>
    </div>
    <p><strong>Hotel Planinarski dom</strong><br>
      Pirot, Srbija<br>
      <br>
      Tel: (+381) 10 31 12 12<br>
      mail:  hotelstara@tigar.com </p>
    <iframe width="465" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m22!1m12!1m3!1d1454.7024278842919!2d22.688897889910766!3d43.18001525251304!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m7!1i0!3e6!4m0!4m3!3m2!1d43.180251899999995!2d22.6891554!5e0!3m2!1ssr!2srs!4v1401296143717"></iframe>
    <br>
    <small><a href="https://www.google.com/maps/embed?pb=!1m22!1m12!1m3!1d1454.7024278842919!2d22.688897889910766!3d43.18001525251304!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m7!1i0!3e6!4m0!4m3!3m2!1d43.180251899999995!2d22.6891554!5e0!3m2!1ssr!2srs!4v1401296143717" style="color:#0000FF;text-align:left">Enlarge Map</a></small> </div>
  <div class="one-half last">
    <div class="heading_bg">
      <h2>Pošaljite nam Email</h2>
    </div>
    <form action="index.php?kontakt" class="TTWForm" method="post">
      <div id="field1-container" class="field f_50">
        <label for="field1" style="font-size: 1.2em;">Ime</label>
        <input name="name" id="field1" type="text"/>
      </div>
      <div id="field2-container" class="field f_50">
        <label for="field2" style="font-size: 1.2em;">Telefon</label>
        <input name="tel" id="field2" type="text" />
      </div>
      <div id="field5-container" class="field f_50">
        <label for="field5" style="font-size: 1.2em;">Email</label>
        <input name="email" id="field5" type="email">
      </div>
      <div id="field4-container" class="field f_100">
        <label for="field4" style="font-size: 1.2em;">Poruka</label>
        <textarea rows="5" cols="20" name="message" id="field4" ></textarea>
      </div>
      <div id="form-submit" class="field f_100 clearfix submit">
        <input value="Pošalji" name="Posalji" type="submit" class="button" style="font-size: 18px"/>
      </div>
    </form>
    <!--END form ID contact_form -->
  </div>
  <div style="clear:both; height: 40px"></div>
  <?php
  if(isset($_POST['Posalji'])){
  $ime=$_POST['name'];
  $telefon=$_POST['tel'];
  $mail=$_POST['email'];
  $poruka=$_POST['message'];
  $greska="";
$regime="/^[A-Z][a-z]{1,}\s[A-Z][a-z]{1,}$/";
$regmail="/^[a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9]+)*(\.[a-z]{2,3})$/";
  
  if(!preg_match($regime,$ime)){
$greska="uneto ime nije dobro!";
echo'uneto ime nije dobro!';
}
if(!preg_match($regmail,$mail)){
$greska="uneto mail nije dobro!";
echo'uneto mail nije dobro!';
}




$mojmail="momchilo007@gmail.com";
if($greska==""){
if(mail($mojmail,$ime,$poruka,$mail)){
echo'Vaš email je poslat'.$mojmail."".$mail;
}
}
}
  
  
  ?>