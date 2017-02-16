var selDiv = "";
        
    document.addEventListener("DOMContentLoaded", init, false);
    
    function init() {
        document.querySelector('#files').addEventListener('change', handleFileSelect, false);
        selDiv = document.querySelector("#selectedFiles");
    }
        
    function handleFileSelect(e) {

        if (!e.target.files || !window.FileReader) return;

        var files = e.target.files;
        var filesArr = Array.prototype.slice.call(files);
        var brojac2 = 0;
        var element = document.getElementById('selectedFiles');
        var fileSelect = document.getElementById('files');
        var files1 = fileSelect.files.length;
        var formData = new FormData();
        var numberOfChildren = element.getElementsByTagName('img').length;
        if ((files1<= 5) && (numberOfChildren+files1<=5)) {
           for(var i=0;i<files1;i++){
                var fileup = fileSelect.files[brojac2];
                formData.append('file[]', fileup, fileup.name);
                brojac2++;
            }
            obradi();


         }
         else{
            document.getElementById("files").value = "";
            alert("Maksimalan broj slika je 5!");
         }


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

        var json = JSON.stringify( files );

        function obradi() {
            xmlHttp = GetXmlHttpObject();
            if (xmlHttp != null) {
                xmlHttp.open("POST","handler.php", true);
                xmlHttp.send(formData);
               xmlHttp.onreadystatechange=rezultat;
selDiv.innerHTML +="<img src='rs/images/spinner.gif' id='loading'/>";

            }
        }

        function rezultat(){
            if(xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
                var foo =xmlHttp.responseText,
                obj = JSON.parse(foo);
                filesArr.forEach(function (f) {
                    if (!f.type.match("image.*")) {
                        return;
                    }
                    var reader = new FileReader();
    
                    reader.onloadend = function (e) {
                        var loading = document.getElementById('loading');
                        loading.remove();
                        var html = "<div class='box' style='display: inline-block; padding: 5px;'><img alt='"+obj[0]+"' src=\"" + e.target.result + "\"><p style='text-align: center;'><a href='#'  id=0 alt='"+obj[0]+"' class='delete'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></p></div>";
                        selDiv.innerHTML += html;
                            av();
                    }
                    reader.readAsDataURL(f);

                    });

                 document.getElementById("files").value = "";

                function av(){
                    var brojslika = element.getElementsByTagName('img').length;
                    document.getElementById("slikeniz").value = "";
                    var element1 = document.getElementById('selectedFiles');
                    for(var w=0;w<brojslika;w++){
                        var ss = element1.getElementsByTagName('img')[w];
                        document.getElementById("slikeniz").value+=ss.alt+";";

                    }
                }
            }
        }
    }

    function broj1(){
        var element2 = document.getElementById('selectedFiles');
        var brojslika2 = element2.getElementsByTagName('img').length;
        document.getElementById("slikeniz").value = "";

        for(var w2=0;w2<brojslika2;w2++){
            var ss2 = element2.getElementsByTagName('img')[w2];
            document.getElementById("slikeniz").value+=ss2.alt+";";

        }
    }


    $(document).ready(function() {
$("body").on('click','a.delete',function() {
var commentContainer = $(this).parent().parent();
    var obrisi=$(this).attr("alt");
var id = $(this).attr("id");
var string = {
    id:id,
    brisi:obrisi
};
    
$.ajax({
   type: "POST",
   url: "delete.php",
   data: string,
   cache: false,
   success: function(data){
    commentContainer.remove();
  }
 }).done(function(){
    broj1();
 });

return false;
    });
});