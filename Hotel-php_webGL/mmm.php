<script type="text/javascript">
$(document).ready(function(){
$('#green').hide();
$('#ulazbtn').click(function() {
    $('#green').show();
	$('#ulazbtn').hide();
});
$('#nazad').click(function() {
$('#ulazbtn').show();
$('#green').hide();
});
});
