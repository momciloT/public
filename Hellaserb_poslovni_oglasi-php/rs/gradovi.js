var xmlHttp=null;
function vratiGradove(value)
{
		xmlHttp=GetXmlHttpObject();
		if (xmlHttp==null)
	{
	alert ("Browser does not support HTTP Request")
	return;
	}
	var url="listagradova.php";
	url=url+"?rec="+value;
	xmlHttp.onreadystatechange=popuniListu;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}

function popuniListu()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
			var lista=document.getElementById("grad");
			isprazniListu(lista);
	
			var gradovi=eval("("+xmlHttp.responseText+")");
			for(var g in gradovi)
			{
				if(gradovi.hasOwnProperty(g))
				{
					ubaciListu(lista,gradovi[g],g);
				}
			}
	}
}


function ubaciListu(lista, tekst, vrednost)
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

function isprazniListu(lista)
{
	var brojElemenata=lista.length;
	for(var i=brojElemenata;i!=0;i--)
	{
		lista.remove(i);
	}
}