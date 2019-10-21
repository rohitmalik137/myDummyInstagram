<?php
session_start();
if(isset($_SESSION['uid']))
{
    header('location:index.php');
}
?>

<?php require_once "init.inc.php" ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
</head>
<body>
	<div class="flex">
		<div></div>
		<div>
			<form action="" method="POST">
				<fieldset>
					<legend><h1 id="title">signUp</h1></legend>
					<input type="text" name="uname" placeholder="username"><br><br>
					<input type="password" name="password" placeholder="Password"><br><br>
					<input type="submit" value="Sign Up" name="submit">
				</fieldset>	
			</form>
		</div>
		<div></div>
	</div>
</body>
</html>
<?php 
	global $users;
	global $database;
	if(isset($_POST['submit'])){
		$uname = stripslashes(trim(htmlspecialchars($_POST['uname'])));
		$password = stripslashes(trim(htmlspecialchars($_POST['password'])));
		$user_added = Users::new_user($uname, $password);
		Users::user_followers($uname);
		if ($user_added) {
			$user_found = Users::verify_user($uname, $password);
			if ($user_found) {
				$user_data = mysqli_fetch_assoc($user_found);
				$uid = $user_data['id'];
				$_SESSION['uid'] = $uid;
				header('location:./index.php');
			}
		}else{
			?><script>alert('Error Occured!!!');</script><?php
		}
	}
?>