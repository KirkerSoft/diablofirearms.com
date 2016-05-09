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

include_once('header.php');
?>
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
<?php
	include_once('footer.php');
?>
