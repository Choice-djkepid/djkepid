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
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">

<!-- Mirrored from www.kepid.co.kr/kepid/stock.html by HTTrack Website Copier/3.x [XR&CO'2010], Tue, 28 Aug 2012 06:02:09 GMT -->
<head>
<!-- Mobile View 설정 -->
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-with, height=device-height" />

<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
<title>130660</title>
<script type="text/javascript" src="css/websiting.js"></script>
</head>
<body bgcolor="#ffffff" topmargin=0 leftmargin=0>
<!--무비에서 사용된 URL-->
<!--무비에서 사용된 텍스트-->
<!-- saved from url=(0013)about:internet -->
<!-- 
// z-index값먹통으로인한 재조합 원소스 ▼
//http://datamall.koscom.co.kr/cyberir/corpMainInner/ts/130660.html
-->
<div style='position:absolute;;left:0px; top:0px; z-index:999;'><a href='investment/stock.php' target='_parent'><img src='img/mblank.gif' style='width:193px; height:25px;' alt='' border='0'></a></div>
<script type="text/javascript">DocumentWrite(MakeFlashString('http://datamall.koscom.co.kr/cyberir/corpMainInner/ts/130660.swf','emb1','193','100','transparent'));</script>
</body>

<!-- Mirrored from www.kepid.co.kr/kepid/stock.html by HTTrack Website Copier/3.x [XR&CO'2010], Tue, 28 Aug 2012 06:02:10 GMT -->
</html>
