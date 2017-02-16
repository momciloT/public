<script src="js/jquery.min.js"></script>
<script src="js/jquery.mousewheel.js"></script>
<script src="js/jquery.gridnav.js"></script>
<script src="js/easing/jquery.easing.1.3.js"></script>

<script src="js/lightbox.min.js"></script>
<link rel="stylesheet" type="text/css" href="gridNavigation.css"/>
<link href="css/lightbox.css" rel="stylesheet" />
<script>
$(function () {
    $('#tj_container').gridnav({
        type: {
            mode: 'seqfade', 
            speed: 500,
            easing: '', 	
            factor: 100, 
            reverse: '' 
        }
    });
});
</script>

  <div id="tj_container" class="tj_container">
   <div class="heading_bg">
    <h2>Galerija</h2>
</div>
    <div class="tj_wrapper">
      <ul class="tj_gallery" style="margin:0; padding:0">
     

<?php
include("konekcija.php");
$upit="SELECT * FROM slike WHERE Galerija=1";
$rezultat=mysql_query($upit,$konekcija)or die('Upit nije izvrsen!!'.mysql_error());
while($array=mysql_fetch_array($rezultat))
{
echo' <li><a href="'.$array['Putanja'].'" data-lightbox="roadtrip"><img src="'.$array['Putanja'].'" alt=""></a></li>';

}

?>
  </ul>
    </div>
	 <div class="tj_nav"><div id="tj_prev" class="tj_prev">Previous</div><div id="tj_next" class="tj_next">Next</div> </div>
  </div>
