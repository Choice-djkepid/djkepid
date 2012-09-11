/************** LOCALIZABLE GLOBAL VARIABLES ****************/

var gFlsArgCountErr =	'"%%" function은 최소 4개이상의 argments가 필요합니다.'
				+	'\n파라메터는 "atttributeName", "attributeValue"의 형식을 가질 수 있습니다.';

/******************** END LOCALIZABLE **********************/

var gFlsTagAttrs				= null;

function _FLSComplain(callingFcnName, errMsg)
{
    errMsg = errMsg.replace("%%", callingFcnName);
	alert(errMsg);
}

function _FLSAddAttribute(prefix, slotName, tagName)
{
	var		value;

	value = gFlsTagAttrs[prefix + slotName];
	if ( null == value )
		value = gFlsTagAttrs[slotName];

	if ( null != value )
	{
		if ( 0 == slotName.indexOf(prefix) && (null == tagName) )
			tagName = slotName.substring(prefix.length); 
		if ( null == tagName ) 
			tagName = slotName;
		return tagName + '="' + value + '" ';
	}
	else
		return "";
}

function _FLSAddObjectAttr(slotName, tagName)
{
	// don't bother if it is only for the embed tag
	if ( 0 == slotName.indexOf("emb#") )
		return "";

	if ( 0 == slotName.indexOf("obj#") && (null == tagName) )
		tagName = slotName.substring(4); 

	return _FLSAddAttribute("obj#", slotName, tagName);
}

function _FLSAddEmbedAttr(slotName, tagName)
{
	// don't bother if it is only for the object tag
	if ( 0 == slotName.indexOf("obj#") )
		return "";

	if ( 0 == slotName.indexOf("emb#") && (null == tagName) )
		tagName = slotName.substring(4); 

	return _FLSAddAttribute("emb#", slotName, tagName);
}


function _FLSAddObjectParam(slotName)
{
	var		paramValue;
	var		paramStr = "";
	var		endTagChar = '>';

	if ( -1 == slotName.indexOf("emb#") )
	{
		// look for the OBJECT-only param first. if there is none, look for a generic one
		paramValue = gFlsTagAttrs["obj#" + slotName];
		if ( null == paramValue )
			paramValue = gFlsTagAttrs[slotName];

		if ( 0 == slotName.indexOf("obj#") )
			slotName = slotName.substring(4); 
	
		if ( null != paramValue )
			paramStr = '    <param name="' + slotName + '" value="' + paramValue + '"' + endTagChar + '\n';
	}

	return paramStr;
}

function _FLSDeleteTagAttrs()
{
	for ( var ndx = 0; ndx < arguments.length; ndx++ )
	{
		var attrName = arguments[ndx];
		delete gFlsTagAttrs[attrName];
		delete gFlsTagAttrs["emb#" + attrName];
		delete gFlsTagAttrs["obj#" + attrName];
	}
}

		

// generate an embed and object tag, return as a string
function _FLSGenerate(callingFcnName, args)
{
	// is the number of optional arguments even?
	if ( args.length < 4 || (0 != (args.length % 2)) )
	{
		_FLSComplain(callingFcnName, gFlsArgCountErr);
		return "";
	}
	
	// allocate an array, fill in the required attributes with fixed place params and defaults
	gFlsTagAttrs = new Array();
	gFlsTagAttrs["emb#src"] = args[0];
	gFlsTagAttrs["obj#movie"] = args[0];
	gFlsTagAttrs["width"] = args[1];
	gFlsTagAttrs["height"] = args[2];

	gFlsTagAttrs["obj#classid"] = "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000";
	gFlsTagAttrs["emb#pluginspage"] = "http://www.macromedia.com/go/getflashplayer";
	gFlsTagAttrs["emb#type"] = "application/x-shockwave-flash";

	// set up codebase attribute with specified or default version before parsing args so
	//  anything passed in will override
	var activexVers = args[3]
	if ( (null == activexVers) || ("" == activexVers) )
		activexVers = "6,0,29,0";
	gFlsTagAttrs["codebase"] = "http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=" + activexVers;

	var	attrName, attrValue;

	// add all of the optional attributes to the array
	for ( var ndx = 4; ndx < args.length; ndx += 2)
	{
		attrName = args[ndx].toLowerCase();
		attrValue = args[ndx + 1];
		gFlsTagAttrs[attrName] = attrValue;
	}

	// init both tags with the required and "special" attributes
	var objTag =  '<object '
					+ _FLSAddObjectAttr("classid")
					+ _FLSAddObjectAttr("codebase")
					+ _FLSAddObjectAttr("width")
					+ _FLSAddObjectAttr("height")
					+ '>\n'
					+ _FLSAddObjectParam("movie")
					+ _FLSAddObjectParam("quality");
	var embedTag = '    <embed '
					+ _FLSAddEmbedAttr("src")
					+ _FLSAddEmbedAttr("quality")
					+ _FLSAddEmbedAttr("pluginspage")
					+ _FLSAddEmbedAttr("type")
					+ _FLSAddEmbedAttr("width")
					+ _FLSAddEmbedAttr("height");


	// delete the attributes/params we have already added
	_FLSDeleteTagAttrs("emb#src","classid","codebase", "obj#movie", "width","height","quality","pluginspage","type");

	// and finally, add all of the remaining attributes to the embed and object
	for ( var attrName in gFlsTagAttrs )
	{
		attrValue = gFlsTagAttrs[attrName];
		if ( null != attrValue )
		{
			objTag += _FLSAddObjectParam(attrName);
		}
	} 



	// end both tags, we're done
	return objTag + embedTag + '>\n    </em' + 'bed>\n</ob' + 'ject' + '>';
}

// return the object/embed as a string
function FLS_GenerateOBJECTText()
{
	return _FLSGenerate("FLS_GenerateOBJECTText", arguments);
}


function FLS_WriteOBJECT()
{
	document.writeln(_FLSGenerate("FLS_WriteOBJECT", arguments));
}

function FLS_ShowOBJECT()
{
	alert(_FLSGenerate("SHOW_OBJECT", arguments));
}

