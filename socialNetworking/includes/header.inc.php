<?php require_once "init.inc.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
</head>
<body>
	<div style="display: flex; justify-content: space-between;">
		<h1 id="title">myInsta</h1>
	<h1></h1><h1><?php echo Users::my_username(); ?></h1>
	</div>
	<?php $show_followers = Users::show_followers();
		  $show_following = Users::show_following();
		  ?><form action="" method="POST"><?php
		if ($show_followers && $show_following) {
			$data = mysqli_fetch_assoc($show_followers);
			$data2 = mysqli_fetch_assoc($show_following);
			?><button type="submit" name="followers">followers:<?php echo $data['followers'] ?></button>
			  <button type="submit" name="following">following:<?php echo $data2['following'] ?></button><br><br><?php
		}else{
			echo "Error Occured!!!";
		}
	?>
	</form>
	<form action="" method="POST">
		<input type="submit" value="Log Out" name="submit">
	</form>
	<form action="" method="POST" enctype="multipart/form-data">
			Select Image to Upload:
			<input type="file" name="mypost" id="mypost">
			<input type="submit" name="submitt" value="Upload Image">
		</form>
	<hr>

<?php 
	if (isset($_POST['submitt'])) {
		$imagename=$_FILES["mypost"]["name"];
		$imagetmp=$_FILES['mypost']['tmp_name'];
		Users::upload_image($imagename, $imagetmp);
	}
?>
<?php 
	if (isset($_POST['followers'])) {
		$followers_list = Users::followers_list();
		echo "<h2>Your Followers list</h2>";
		if ($followers_list) {
			while($data = mysqli_fetch_assoc($followers_list)){
				echo $data['followers']."<br>";
			}
		}else{
			echo "No one follows you!!!";
		}
	}
	if (isset($_POST['following'])) {
		$following_list = Users::following_list();
		echo "<h2>Your Following list</h2>";
		if ($following_list) {
			while($data = mysqli_fetch_assoc($following_list)){
				echo $data['following']."<br>";
			}
		}else{
			echo "you follow no one!!!";
		}
	}
?>