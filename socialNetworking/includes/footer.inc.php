	<?php 
	if (isset($_POST['users_posts'])) {
		echo "Hey there im users posts<br>";
	}
	?>
	<?php 
	if (isset($_POST['search'])) {
		echo "Search<br>";
	}
	?>
	<?php 
	if (isset($_POST['users_list'])) {
		$users_list = Users::users_list();
		if ($users_list) {
			while ($data = mysqli_fetch_assoc($users_list)) {
				$uname = Users::my_username();
				if ($data['uname'] == $uname) {}
				else{
					?><form action="" method="POST"><input type="submit" name="user" value="<?php echo $data['uname'];?>">........follow-><input type="submit" name="follow" value="<?php echo $data['uname'];?>"><br><br></form><?php
				}
			}
		}else{
			echo "No Users Found";
		}
	}
	?>
	<?php 
	#other user's posts
		if (isset($_POST['user'])) {
			echo "<h1>".$_POST['user']."</h1>";
			$fetch_images_for_users = Users::fetch_images_for_users($_POST['user']);
			if ($fetch_images_for_users) {
					while ($data = mysqli_fetch_assoc($fetch_images_for_users)) {
						?><img src="images/<?php echo($data['image_name']) ?>" width="250px" height="350px">..........<?php
					}
			}else{
				echo "No POsts Available";
			}
		}
	?>
	<?php 
	#follow users
		if (isset($_POST['follow'])) {
			Users::followers_name($_POST['follow']);
		}
	?>
	<?php 
	#my posts
		if (isset($_POST['my_profile'])) {
			$fetch_images = Users::fetch_images();
			if ($fetch_images) {
				?><form action="" method="POST"><?php
				while ($data = mysqli_fetch_assoc($fetch_images)) {
					?><button type="submit" name="delimage" value="<?php echo($data['image_name']) ?>"><img type="submit" name="delimage" src="images/<?php echo($data['image_name']) ?>" width="250px" height="350px"></button>..........<?php
				}
				?></form><?php
			}
		}
	?>
	<?php if (isset($_POST['delimage'])) {
		$path = "images/".$_POST['delimage'];
		Users::delete_image($path,$_POST['delimage']);
	} ?>
	<form method="POST" name="myForm" action="">
		<div style="display: flex;justify-content: center;">
			<div><input type="submit" name="users_posts" value="Others' Posts"></div>
			<div><input type="submit" name="search" value="Search"></div>
			<div><input type="submit" name="users_list" value="See All users:"></div>
			<div><input type="submit" name="my_profile" value="My Profile"></div>
		</div>
	</form>
</body>
</html>