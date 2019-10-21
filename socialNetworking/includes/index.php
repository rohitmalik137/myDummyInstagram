<?php
session_start();
if(!isset($_SESSION['uid']))
{
    header('location:login.inc.php');
}
?>
<?php require_once "init.inc.php" ?>
<?php include "header.inc.php" ?>
<?php include "footer.inc.php" ?>

<?php 
	
	if (isset($_POST['submit'])) {
		session_unset();
		session_destroy();
		header("Location: login.inc.php");
	}

?>