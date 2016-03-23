<?php
session_start();

if(!isset($_SESSION['username'])) {
	header("Location: userLogin.php");
}
?>

<html>
<head>
  <meta content="text/html; charset=utf-8" http-equiv="content-type">
  <title>Diablo Firearms Training - Class Signup</title>
  <style type="text/css">
		html,
		body {
			width: 100%;
			height: 100%;
			margin: 0px;
		}
		body {
			background-color: transparent;
			color: white;
			-webkit-transform: perspective(1400px) matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
			-webkit-transform-style: preserve-3d;
			background-image: none;
			text-shadow: black 3px 3px 3px;
			background-color: black;
		}
		a {
			color: white;
		}
		a:hover {
			color: hotpink;
			text-decoration: underline;
		}
		.gwd-center-mlcc {
			-webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
			-webkit-transform-style: preserve-3d;
			background-image: none;
			background-color: rgb(0, 0, 0);
		}
		.gwd-table-j4a0 {
			-webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
			-webkit-transform-style: preserve-3d;
		}
	</style>
  <link rel="shortcut icon" href="favicon.ico">
</head>

<body topmargin="0" marginheight="0" vlink="white">
<center class="gwd-center-mlcc active-element-outline">
<table class="gwd-table-j4a0" background="media/background.png" border="0" height="100%" width="1000">
  <tbody>
    <tr>
      <td valign="top">
      <center>
      <table background="media/header.png" border="0" width="100%">
        <tbody>
          <tr>
            <td> <a href="http://www.diablofirearmstraining.com" target="_top"> <img src="media/logo.png" align="left" border="0"> </a>
            <center>
            <h1><em><font size="8">Diablo Firearms Training</font></em></h1>
            <h2><em><a href="index.html">Home</a> - <a href="classDescriptions.html">Class Descriptions</a> - <a href="classSchedule.php">Class Schedule</a> - <a href="contactUs.html">Contact
Us</a></em></h2>
            </center>
            </td>
          </tr>
        </tbody>
      </table>
	  <div align=right>
<?php
echo "Welcome " . $_SESSION['name'];
?> - <a href="userLogout.php">Sign Out</a>
	  </div>
      Select class to sign up for:<br>
	  Lorem ipsum more goes here.
      </center>

      <h2 align="center"><em><a href="index.html">Home</a> - <a href="classDescriptions.html">Class Descriptions</a> - <a href="classSchedule.php">Class Schedule</a> 
- <a href="contactUs.html">Contact Us</a></em></h2>
      <div align="center"> ©2016 <a href="http://www.diablofirearmtraining.com/contactUs.html" target="_top">Diablo Safety Training</a> </div>
      </td>
    </tr>
  </tbody>
</table>
<!-- Facebook Badge START --> <a href="https://www.facebook.com/DiabloFirearms" target="_TOP" title="Diablo Firearms Training"> <img src="https://badge.facebook.com/badge/572707706096242.3223.1308922374.png" style="border: 0px none ; position: absolute; float: right; right: 0px; bottom: 0px; z-index: 2;">
</a><!-- Facebook Badge END --> </center>

</body></html>