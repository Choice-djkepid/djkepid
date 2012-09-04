<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-with, height=device-height" />
<title>jQuery Mobile Web App</title>
<link href="css/jquery.mobile-1.0.min.css" rel="stylesheet" type="text/css"/>
<script src="css/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="css/jquery.mobile-1.0.min.js" type="text/javascript"></script>
<!-- <link href="css/main.css" rel="stylesheet" type="text/css"> -->
<script src="css/flash.js" type="text/javascript"></script>
<!-- <script language="JavaScript" type="text/JavaScript"> -->
</head> 
<body> 

<div data-role="page" id="page">
	<div data-role="header">
	  <h1><img src="img/kepid-logo.png" width="32" height="24" alt="" longdesc="http://www.kepid.co.kr">DJ KEPID</h1>
  </div>
  <div data-role="content">	
	  <ul data-role="listview">
			<li><a href="#page2">회사공지사항(예정)</a></li>
            <li><a href="#page3">사내공지사항(예정)</a></li>
            <li><a href="http://datamall.koscom.co.kr/cyberir/corpMainInner/ts/130660.html" title="stock" target="_top">회사주식정보</a></li>
            <li><a href="/stock.html" title="stock" target="_top">회사주식정보2</a></li>

			<li><a href="#page4">절차서</a></li>
	  </ul>
  </div>
  
<div>
        <p align="center">
    <iframe src="http://datamall.koscom.co.kr/cyberir/corpMainInner/ts/130660.html
"  style="width:193px; height:100px;" frameborder="0" scrolling="no" title="한전산업개발 주가정보"></iframe>
</div>
</p>
  
  <div data-role="footer">
    <h4>Ver. 120828 1711</h4>
  </div>
</div>

<div data-role="page" id="page2">
	<div data-role="header">
		<h1>회사공지사항</h1>
	</div>
	<div class='mainct01'>
	  <!-- 공지사항 최신글 --------------------------------------------------------------------------------- -->
	  <div class='mainct011' id='Tabid1'>
	    <div class='mtab'>
	      <ul>
	        <li class='mtabon'><a href='http://www.kepid.co.kr/kepid/news/notice.asp?tb_name=notice_board' onMouseover="Tabbutton(1)">공지사항</a></li>
          </ul>
	      <div class='clearb'></div>
        </div>
	<p>&nbsp;</p>
	<div data-role="content">	
		Content		
	</div>
	<div data-role="footer">
		<h4>-</h4>
	</div>
</div>

<div data-role="page" id="page3">
	<div data-role="header">
		<h1>사내공지사항</h1>
	</div>
	<div data-role="content">	
		Content		
	</div>
	<div data-role="footer">
		<h4>-</h4>
	</div>
</div>

<div data-role="page" id="page4">
	<div data-role="header">
		<h1>절차서</h1>
	</div>
	<div data-role="content">
		품질, 환경, 안전·보건 매뉴얼[발전(화력)-QESHM01, Rev.8]		
    
	</div>

	<div data-role="footer">
		<h4>-</h4>
	</div>
</div>

</body>
</html>