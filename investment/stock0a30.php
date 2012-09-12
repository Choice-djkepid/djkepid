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

$MM_restrictGoTo = "../login.php";
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

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<!-- Mirrored from www.kepid.co.kr/kepid/investment/stock.asp?stock=stock1 by HTTrack Website Copier/3.x [XR&CO'2010], Tue, 28 Aug 2012 08:17:20 GMT -->
<head>
<title>:: 한전산업개발(주) 에 오신 것을 환영합니다. ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<META HTTP-EQUIV="imagetoolbar" CONTENT="no"> 
<!-- Mobile View 설정 -->
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-with, height=device-height" />

<link href="../css/main.css" rel="stylesheet" type="text/css">
<link href="../css/websiting.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../css/websiting.js"></script>
<script type="text/javascript" src="../flash/topmenu_link.js"></script>
</head>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<body background="img/bg.gif" leftmargin="0" topmargin="0">
<script src="../css/flash.js" type="text/javascript"></script>
<div class='allmenu' id='am2' style='display:none;'>

	<div class='allmenu1 mg0a'>
	



		<div class='allmenublock am1'>

			  <a href="../company/ceo_01.html">CEO</a>
			  <a href="../company/vision.html">비전  </a>
			  <a href="../company/history.html"> 회사연혁 </a>
			  <a href="../company/info_01.html"> 회사현황 </a>
			  <a href="../company/quality_01.html">품질경영  </a>
			  <a href="../company/tong_01.html"> 경영통계 </a>
			  <a href="../company/recruit.html"> 채용안내 </a>
			  <a href="../company/contact.html"> Contact us </a>

		</div>

		<div class='allmenublock am2'>

			  <a href="../business/powerstation01.html">발전설비  </a>
			  <a href="../business/metering01.html">검침ㆍ전력IT  </a>
			  <a href="../business/energy01.html">신재생에너지  </a>
			  <a href="../business/resources01.html">자원개발  </a>

		</div>

		<div class='allmenublock am3'>

			  <a href="../news/noticeed2a.html?tb_name=news_board">한산소식  </a>
			  <a href="../news/noticeac6f.html?tb_name=n_insa_board">인사동정  </a>
			  <a href="../news/notice376d.html?tb_name=notice_board">공지사항  </a>

		</div>

		<div class='allmenublock am4'>

			  <a href="../cyber/press.html">홍보자료실  </a>
			  <a href="../cyber/history_01.html">한산발자취  </a>
			  <a href="../cyber/relation.html">관계회사  </a>
			  <a href="../cyber/brochure.html">브로셔  </a>

		</div>

		<div class='allmenublock am5'>

			  <a href="regulation.html">공시자료  </a>
			  <a href="financial_balance.html">재무정보  </a>
			  <a href="stock.php">주식정보  </a>
			  <a href="materials.html">IR  </a>

		</div>

		<div class='allmenublock am6'>

			  <a href="../administration/info_manage.html">윤리경영  </a>
			  <a href="../administration/sinmoongo.html">신문고  </a>
			  <a href="../administration/service_info.html">사회공헌활동  </a>
			  <a href="../administration/sustain.html">관련보고서  </a>
		</div>

		<div class='allmenublock am7'>

			  <a href="../customer/support.html">고객문의  </a>
			  <a href="../customer/faq.html">FAQ  </a>
			  <a href="http://cyber.kepco.co.kr/kepco_new/elec_info/info/statistical_data.jsp" target='_blank'>전력정보  </a>
			  <a href="http://cyber.kepco.co.kr/" target='_blank'>전기상식  </a>

		</div>
		<div class='clearb'></div>









	</div>
	<div class='allmenuclose mg0a'>
		<a href='#' onClick="Allmenu(1)"><img src='../img/ico_x.png' alt='전체메뉴 닫기' border='0' align='absmiddle'> 전체메뉴 닫기</a>
	</div>






</div>

<!-- 상단메뉴영역 --><!-- 상단메뉴영역 --><!-- top menu table end -->
<!-- top visual table start --><!-- top visual table end -->
<table width="610" border="0" cellspacing="0" cellpadding="0" style="background:url(img/right_img.gif) no-repeat top right">
  <tr>
    <td width="610" valign="top"><!-- Contents  table start -->

      <table width="610" height="29" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="14" background="../company/img/title_bg.gif"><img src="img/title06.gif"></td>
        </tr>
      </table>
      <table width="100" height="35" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td></td>
        </tr>
      </table>
       
<table width="590" height="27" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td background="img/img09.gif"><table border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="img/tab01on.gif" name="Image8" width="93" height="27" border="0"></td>
          <td><a href="stockb236.php?stock=stock2" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image9','','img/tab02on.gif',1)"><img src="img/tab02.gif" name="Image9" width="90" height="27" border="0"></a></td>
        </tr>
      </table></td>
  </tr>
</table>
<table width="100" height="25" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td></td>
  </tr>
</table>
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><iframe name="datamall" src="http://datamall.koscom.co.kr/servlet/cyberir/CyberIrCurrentServlet?screenId=301001&amp;simplecode=130660" width="640" height="600" marginwidth="0" marginheight="0" frameborder="0" scrolling="no" title="한전산업개발 현재가"></iframe></td>
  </tr>
</table>


      </td>
  </tr>
</table>
<SCRIPT LANGUAGE="JavaScript">
<!--
function go_url(url){
	window.open(url, "_kepid_site");
}
//-->
</SCRIPT>
</body>

<!-- Mirrored from www.kepid.co.kr/kepid/investment/stock.asp?stock=stock1 by HTTrack Website Copier/3.x [XR&CO'2010], Tue, 28 Aug 2012 08:17:20 GMT -->
</html>
