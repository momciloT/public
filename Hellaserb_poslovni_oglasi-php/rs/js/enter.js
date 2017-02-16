jQuery(document).ready(function() {
$("#log_navbar").hide();
    $(".nav > li:nth-child(8) > a:nth-child(1)").click(function(){
        $("#log_navbar").toggle('slow')
});
})