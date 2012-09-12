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
<!-- pdf viewer
<script type="text/javascript" charset="utf-8" src="css/main.js"></script>
<script type="text/javascript" charset="utf-8" src="css/downloader.js"></script> -->
<script type="text/javascript" charset="utf-8" src="css/pdfviewer.js"></script>

</head> 
<body>
<div data-role="page" id="page4">
	<div data-role="header">
	  <h1>품질, 환경, 안전·보건 매뉴얼</h1>
	</div>
	<div data-role="content">
	  <ul data-role="listview">
	    <li><a href="manual/QEH-manual(All,110815)/QESHM01-I.pdf">[I편] 목차 & 인증표준 대조표</a></li>
	    <li><a href="manual/QEH-manual(All,110815)/QESHM01-II.pdf">[II편] 제·개정 이력</a></li>
	    <li><a href="manual/QEH-manual(All,110815)/QESHM01-III.pdf">[III편] 품질, 환경, 안전보건 방침</a></li>
	    <li><a href="manual/QEH-manual(All,110815)/QESHM01-NO01.pdf">제1장 『적용범위』</a></li>
	    <li><a href="manual/QEH-manual(All,110815)/QESHM01-NO01.mht">제1장 『적용범위』(mht)</a></li>
	    <li><a href="manual/QEH-manual(All,110815)/제1장(All).htm">제1장 『적용범위』(html)</a></li>
      </ul>
	</div>
	<div data-role="footer">
	  <h4>Ver. 120910 1402</h4>
  </div>
</div>


</body>
</html>
