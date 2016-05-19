// JavaScript Document
window.onload = function hideSec()
{
	if((document.getElementById('branch').value == 'MCA' || document.getElementById('branch').value == 'MBA'
|| document.getElementById('branch').value == 'SCS' || document.getElementById('branch').value == 'SCN' || 
document.getElementById('branch').value == 'LDE' || 
document.getElementById('branch').value == 'MTP' || 
document.getElementById('branch').value == 'LVS' ||
document.getElementById('branch').value == 'MAR') && document.getElementById('sem').value < 3)
	{
		document.getElementById('a').hidden=false;
			document.getElementById('b').hidden=false;
			document.getElementById('c').hidden=false;
			document.getElementById('d').hidden=true;
			document.getElementById('e').hidden=true;
			document.getElementById('f').hidden=true;
			document.getElementById('a2nd').hidden=true;
			document.getElementById('b2nd').hidden=true;
			document.getElementById('c2nd').hidden=true;
			
			document.getElementById('a1').hidden=true;
			document.getElementById('a2').hidden=true;
			document.getElementById('a3').hidden=true;
			document.getElementById('a4').hidden=true;
			document.getElementById('a5').hidden=true;
			document.getElementById('a6').hidden=true;
			
			document.getElementById('b1').hidden=true;
			document.getElementById('b2').hidden=true;
			document.getElementById('b3').hidden=true;
			document.getElementById('b4').hidden=true;
			document.getElementById('b5').hidden=true;
			document.getElementById('b6').hidden=true;
	}
	else if(document.getElementById('sem').value >= 3)
	{
			document.getElementById('a').hidden=false;
			document.getElementById('b').hidden=false;
			document.getElementById('c').hidden=false;
			document.getElementById('d').hidden=true;
			document.getElementById('e').hidden=true;
			document.getElementById('f').hidden=true;
			document.getElementById('a2nd').hidden=false;
			document.getElementById('b2nd').hidden=false;
			document.getElementById('c2nd').hidden=true;
			
			document.getElementById('a1').hidden=true;
			document.getElementById('a2').hidden=true;
			document.getElementById('a3').hidden=true;
			document.getElementById('a4').hidden=true;
			document.getElementById('a5').hidden=true;
			document.getElementById('a6').hidden=true;
			
			document.getElementById('b1').hidden=true;
			document.getElementById('b2').hidden=true;
			document.getElementById('b3').hidden=true;
			document.getElementById('b4').hidden=true;
			document.getElementById('b5').hidden=true;
			document.getElementById('b6').hidden=true;
	}
	else if(document.getElementById('branch').value == 'C')
	{
			document.getElementById('a').hidden=true;
			document.getElementById('b').hidden=true;
			document.getElementById('c').hidden=true;
			document.getElementById('d').hidden=true;
			document.getElementById('e').hidden=true;
			document.getElementById('f').hidden=true;
			document.getElementById('a2nd').hidden=true;
			document.getElementById('b2nd').hidden=true;
			document.getElementById('c2nd').hidden=true;
			
			document.getElementById('a1').hidden=true;
			document.getElementById('a2').hidden=true;
			document.getElementById('a3').hidden=true;
			document.getElementById('a4').hidden=true;
			document.getElementById('a5').hidden=true;
			document.getElementById('a6').hidden=true;
			
			document.getElementById('b1').hidden=false;
			document.getElementById('b2').hidden=false;
			document.getElementById('b3').hidden=false;
			document.getElementById('b4').hidden=false;
			document.getElementById('b5').hidden=false;
			document.getElementById('b6').hidden=false;
	}
	else if(document.getElementById('branch').value == 'BA')
	{
			document.getElementById('a').hidden=false;
			document.getElementById('b').hidden=false;
			document.getElementById('c').hidden=false;
			document.getElementById('d').hidden=true;
			document.getElementById('e').hidden=true;
			document.getElementById('f').hidden=true;
			document.getElementById('a2nd').hidden=true;
			document.getElementById('b2nd').hidden=true;
			document.getElementById('c2nd').hidden=true;
			
			document.getElementById('a1').hidden=true;
			document.getElementById('a2').hidden=true;
			document.getElementById('a3').hidden=true;
			document.getElementById('a4').hidden=true;
			document.getElementById('a5').hidden=true;
			document.getElementById('a6').hidden=true;
			
			document.getElementById('b1').hidden=true;
			document.getElementById('b2').hidden=true;
			document.getElementById('b3').hidden=true;
			document.getElementById('b4').hidden=true;
			document.getElementById('b5').hidden=true;
			document.getElementById('b6').hidden=true;
	}
	else if(document.getElementById('branch').value == 'P')
	{
		document.getElementById('a').hidden=true;
			document.getElementById('b').hidden=true;
			document.getElementById('c').hidden=true;
			document.getElementById('d').hidden=true;
			document.getElementById('e').hidden=true;
			document.getElementById('f').hidden=true;
			document.getElementById('a2nd').hidden=true;
			document.getElementById('b2nd').hidden=true;
			document.getElementById('c2nd').hidden=true;
			
			document.getElementById('a1').hidden=false;
			document.getElementById('a2').hidden=false;
			document.getElementById('a3').hidden=false;
			document.getElementById('a4').hidden=false;
			document.getElementById('a5').hidden=false;
			document.getElementById('a6').hidden=false;
			
			document.getElementById('b1').hidden=true;
			document.getElementById('b2').hidden=true;
			document.getElementById('b3').hidden=true;
			document.getElementById('b4').hidden=true;
			document.getElementById('b5').hidden=true;
			document.getElementById('b6').hidden=true;	
	}
	
}

window.onload = function hideSecOnload()
{
	
//	if(document.getElementById('sem').value >= 3)
	//{
			document.getElementById('a').hidden=true;
			document.getElementById('b').hidden=true;
			document.getElementById('c').hidden=true;
			document.getElementById('d').hidden=true;
			document.getElementById('e').hidden=true;
			document.getElementById('f').hidden=true;
			document.getElementById('a2nd').hidden=true;
			document.getElementById('b2nd').hidden=true;
			document.getElementById('c2nd').hidden=true;
			
			document.getElementById('a1').hidden=true;
			document.getElementById('a2').hidden=true;
			document.getElementById('a3').hidden=true;
			document.getElementById('a4').hidden=true;
			document.getElementById('a5').hidden=true;
			document.getElementById('a6').hidden=true;
			
			document.getElementById('b1').hidden=true;
			document.getElementById('b2').hidden=true;
			document.getElementById('b3').hidden=true;
			document.getElementById('b4').hidden=true;
			document.getElementById('b5').hidden=true;
			document.getElementById('b6').hidden=true;
	//}
}
