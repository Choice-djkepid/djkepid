function MakeFlashString(source,id,width,height,wmode, otherParam)
{	
	return "<embed src="+source+" quality=high wmode="+wmode+" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/shockwave/download/index.cgi?p1_prod_version=shockwaveflash\" width="+width+" height="+height+"></embed>";
}

function MakeObjectString(classid, codebase, name, id, width,height, param)
{
	return "<object classid="+classid+" codebase="+codebase+" name="+name+" width="+width+" height="+height+" id="+id+"><param name=wmode value="+wmode+" />"+param+"</object>";
}


// innerHTML Type
function SetInnerHTML(target, code)
{ 
	target.innerHTML = code; 
}

// Direct Write Type
function DocumentWrite(src)
{
	document.write(src);
}


// websiting.co.kr TABbutton style

function Tabbutton(index) {
  for (i=1; i<=3; i++)
  if (index == i) {
  thisMenu = eval("Tabid" + index + ".style");
  thisMenu.display = "";
  } 
  else {
  otherMenu = eval("Tabid" + i + ".style"); 
  otherMenu.display = "none"; 
  }
  }
function Allmenu(index) {
  for (i=1; i<=2; i++)
  if (index == i) {
  thisMenu = eval("am" + index + ".style");
  thisMenu.display = "";
  } 
  else {
  otherMenu = eval("am" + i + ".style"); 
  otherMenu.display = "none"; 
  }
  }

function mban(index) {
  for (i=1; i<=4; i++)
  if (index == i) {
  thisMenu = eval("mb" + index + ".style");
  thisMenu.display = "";
  } 
  else {
  otherMenu = eval("mb" + i + ".style"); 
  otherMenu.display = "none"; 
  }
  }




function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
