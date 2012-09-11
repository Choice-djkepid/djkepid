<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "login.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-with, height=device-height" />
<title>DJKEPID Mobile Web App</title>
<link href="css/jquery.mobile-1.0.min.css" rel="stylesheet" type="text/css"/>
<script src="css/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="css/jquery.mobile-1.0.min.js" type="text/javascript"></script>
<!-- <link href="css/main.css" rel="stylesheet" type="text/css">
<script src="css/flash.js" type="text/javascript"></script>
<script language="JavaScript" type="text/JavaScript"> -->
<!-- <script language="javascript"> location.href="membershome.html";</script>
<meta http-equiv="refresh" content="1;URL=/membershome.html"> -->

</head> 
<body> 

<div data-role="page" id="page">
	<div data-role="header">
	  <h1><img src="img/kepid-logo.png" width="32" height="24" alt="" longdesc="http://www.kepid.co.kr">DJ KEPID</h1>
  </div>
  <div data-role="content">
    <p align="center">로그인에 성공하였습니다.</p>
    <p>&nbsp;
    <div data-role="content">
    <form name="form1" method="post" action="/membershome.php">
    <input name="다음" type="submit" id="다음" value="다음">
    </form>
    </div>
    </p>
  </div>
  </p>
  
  <div data-role="footer">
    <h4>Ver. 120828 1711</h4></div></div>
</body>
</html>
