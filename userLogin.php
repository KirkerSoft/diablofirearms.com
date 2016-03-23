<?php
session_start();

if (isset($_POST['loginname'])) {
	require 'db_connection.php';

	$sql = "SELECT *
	FROM students
	WHERE username = :username
	AND password = :password";

	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute(array(":username" => $_POST['loginname'], ":password" => hash("sha1", $_POST['password'])));
	$record = $stmt -> fetch();
	if (!empty($record)) {
		$_SESSION['username'] = $record['username'];
		$_SESSION['name'] = $record['name'];
		header("Location: classSignup.php");
	}
}
?>
<html>
<head>
  <meta content="text/html; charset=utf-8" http-equiv="content-type">
  <title>Diablo Firearms Training - Student Login</title>
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
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>  
  <link rel="shortcut icon" href="favicon.ico">
</head>
<body topmargin="0" marginheight="0" vlink="white"
<?php
	if ((isset($_POST['loginname'])) && empty($record)) {
		echo "onLoad=\"alert('Invalid Username or Password');\">";
	}
	else {
		echo ">";
	}
?>
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
      <u><font color="red" size="5"><strong>Account Log In</strong></font></u>
      <form method=post>
        <table border="0">
          <tbody>
            <tr>
              <td style="text-align: right;">Username: </td>
              <td><input tabindex="1" name="loginname"></td>
            </tr>
            <tr>
              <td style="text-align: right;">Password: </td>
              <td><input tabindex="2" name="password" type="password"></td>
            </tr>
            <tr>
              <td style="text-align: center;" colspan="2"><input tabindex="3" value="Log In" type="submit"><input value="Reset" type="reset"></td>
            </tr>
          </tbody>
        </table>
      </form>

      <div align="center"><u><font color="red" size="5"><strong>New Account
Creation</strong></font></u></div>
      <form method=post>
        <table border="0">
          <tbody>
            <tr>
              <td style="text-align: right;">New Username: </td>
              <td><input id="username" name="username" type=text required><span id="checkUsername"></span></td>
            </tr>
            <tr>
              <td style="text-align: right;">Password: </td>
              <td><input id=newPassword name="newPassword" type="password" required><span id="checkPassword"></span></td>
            </tr>
            <tr>
              <td style="text-align: right;">Repeat Password: <br>
              </td>
              <td><input id=newPasswordRepeat name="newPasswordRepeat" type="password" required></td>
            </tr>
            <tr>
              <td style="text-align: right;">Full Name: <br>
              </td>
              <td><input type=text name="realName" required><br>
              </td>
            </tr>
            <tr>
              <td style="text-align: right;">Email: <br>
              </td>
              <td><input type=text name="email" required><br>
              </td>
            </tr>
<tr>
              <td style="text-align: center;" colspan="2"><input value="Create Account" type="submit"><input value="Reset" type="reset"></td>
            </tr>
          </tbody>
        </table>
      </form>
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

<script>
	$("#username").change( function newUser() {
		$.ajax({
			type: "post",
			url: "userLookup.php",
			dataType: "json",
			data: { "username": $("#username").val() },
			success: function(data,status) {
				if (data['exists'] == "true")  {
					$("#checkUsername").html("<br>Username is already taken.");
					$("#checkUsername").css("color","red");
					$("#username").css("background-color","LightCoral");
					$("#username").focus();
				} else if (document.getElementById("username").value.length < 5) {
					$("#checkUsername").html("<br>Username is too short.");
					$("#checkUsername").css("color","red");
					$("#username").css("background-color","LightCoral");
					$("#username").focus();
				} else {
					$("#checkUsername").html("");
					$("#username").css("background-color","White");
				}
			},
		});
	});
	$("#newPassword").change( function newPass() {
		if (document.getElementById("newPassword").value.length < 7) {
			$("#checkPassword").html("<br>Password is too short.");
			$("#checkPassword").css("color","red");
			$("#newPassword").css("background-color","LightCoral");
			$("#newPassword").focus();
		} else {
			$("#checkPassword").html("");
			$("#newPassword").css("background-color","White");
		}
	});
	$("#newPasswordRepeat").change( function newPassRepeat() {
		if (document.getElementById("newPasswordRepeat").value.length < 7) {
			$("#checkPassword").html("<br>Password is still too short.");
			$("#checkPassword").css("color","red");
			$("#newPasswordRepeat").css("background-color","LightCoral");
			$("#newPassword").focus();
		} else if (document.getElementById("newPassword").value != document.getElementById("newPasswordRepeat").value) {
			$("#checkPassword").html("<br>Passwords do not match");
			$("#checkPassword").css("color","red");
			$("#newPassword").css("background-color","LightCoral");
			$("#newPasswordRepeat").css("background-color","LightCoral");
			$("#newPasswordRepeat").focus();
		} else {
			$("#checkPassword").html("");
			$("#newPassword").css("background-color","White");
			$("#newPasswordRepeat").css("background-color","White");
		}
	});
</script>
</body>
</html>