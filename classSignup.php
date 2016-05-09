<?php
session_start();

if(!isset($_SESSION['username'])) {
	header("Location: userLogin.php");
}

include_once('header.php');
?>
<div align=right>
<?php
echo "Welcome " . $_SESSION['name'];
?> - <a href="userLogout.php">Sign Out</a>
	  </div>
      Select class to sign up for:<br>
	  Lorem ipsum more goes here.
      </center>
<?php
	include_once('footer.php');
?>
