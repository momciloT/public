var xmlHttp=null;
function vratiPodKategorije(value)
{
		xmlHttp=GetXmlHttpObject();
		if (xmlHttp==null)
	{
	alert ("Browser does not support HTTP Request")
	return;
	}
	var url="listapodKategorija.php";
	url=url+"?rec="+value;
	xmlHttp.onreadystatechange=popuniListuPodKategorija;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}

function popuniListuPodKategorija()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
			var lista=document.getElementById("podKategorije");
			isprazniListuPodKategorija(lista);
	
			var podKategorije=eval("("+xmlHttp.responseText+")");
			for(var g in podKategorije)
			{
				if(podKategorije.hasOwnProperty(g))
				{
					ubaciListuPodKategorija(lista,podKategorije[g],g);
				}
			}
	}
}


function ubaciListuPodKategorija(lista, tekst, vrednost)
{
	var element=document.createElement('option');
	element.text=tekst;
	element.value=vrednost;
	
	try
	{
		lista.add(element,null);
	}
	catch(ex){
		lista.add(element);
	}
}

function isprazniListuPodKategorija(lista)
{
	var brojElemenata=lista.length;
	for(var i=brojElemenata;i!=0;i--)
	{
		lista.remove(i);
	}
}