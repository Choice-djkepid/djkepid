<!DOCTYPE HTML>
<html>
<head>
<title>PhoneGap</title>
<script type="text/javascript" charset="utf-8" src="css/jquery-1.6.4.min.js"></script>
<script src="css/jquery.mobile-1.0.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8" src="css/main.js"></script>
<script type="text/javascript" charset="utf-8" src="css/pdfviewer.js"></script>
<script type="text/javascript" charset="utf-8" src="css/downloader.js"></script>

</head>
<body>
<h1>Hello World</h1>
<a href="#" onclick="window.plugins.downloader.downloadFile('http://www.cataniaperte.com/sport/articoli/Kitesurf.pdf','/sdcard/download/', 'Kitesurf.pdf', true, downloadOkCallbak, downloadErCallbak);">Download pdf</a><br>
<a href="#" onclick="window.plugins.pdfViewer.showPdf('/sdcard/download/Kitesurf.pdf');">open</a>
</body>
</html>