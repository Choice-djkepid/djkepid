<?php require_once('Connections/conn_login.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['userID'])) {
  $loginUsername=$_POST['userID'];
  $password=$_POST['pwd'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "membershome.php";
  $MM_redirectLoginFailed = "Loginno.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_conn_login, $conn_login);
  
  $LoginRS__query=sprintf("SELECT userID, pwd FROM login WHERE userID=%s AND pwd=%s",
    GetSQLValueString($loginUsername, "int"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $conn_login) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-with, height=device-height" />
<title>jQuery Mobile Web App</title>
<link href="css/jquery.mobile-1.0.min.css" rel="stylesheet" type="text/css"/>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<script src="css/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="css/jquery.mobile-1.0.min.js" type="text/javascript"></script>
<!-- <link href="css/main.css" rel="stylesheet" type="text/css"> -->
<script src="css/flash.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<!-- <script language="JavaScript" type="text/JavaScript"> -->
</head> 
<body> 

<div data-role="page" id="page">
	<div data-role="header">
	  <h1><img src="img/kepid-logo.png" width="32" height="24" alt="" longdesc="http://www.kepid.co.kr">DJ KEPID</h1>
  </div>
  <div data-role="content">
    <form ACTION="<?php echo $loginFormAction; ?>" name="form1" method="POST">
<p><span id="sprytextfield1">
  <label for="userID">user</label>
  <input type="text" name="userID" id="userID">
  <span class="textfieldRequiredMsg">값을 반드시 입력해야 합니다.</span></span></p>
<p><span id="sprytextfield2">
  <label for="pwd">Password</label>
  <input type="text" name="pwd" id="pwd">
  <span class="textfieldRequiredMsg">값을 반드시 입력해야 합니다.</span></span></p>
<p>
  <input type="submit" name="sign" id="sign" value="Sign">
</p>
    </form>
  </div>
  </p>
  
  <div data-role="footer">
    <h4>Ver. 120828 1711</h4></div></div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
</script>
</body>
</html>