<?php
	require_once "init.inc.php";
	class Users{
		public $id;
		public $username;
		public $password;

		public static function verify_user($uname, $password){
			global $database;
			$uname = $database->escape_string($uname);
			$password = $database->escape_string($password);
			$sql = "SELECT * FROM `users` WHERE uname = '{$uname}' AND upassword = '{$password}'";
			$result = $database->query($sql);
			if ($result) {
				$rows_count = mysqli_num_rows($result);
				$fresult = ($rows_count == 1) ? $result : false;
				return $fresult;
			}
			return false;
		}
		public static function new_user($uname, $password){
			global $database;
			$uname = $database->escape_string($uname);
			$password = $database->escape_string($password);
			$sql = "INSERT INTO `users` (`uname`, `upassword`) VALUES ('{$uname}','{$password}')";
			$result = $database->query($sql);
			if ($result) {
				return true;
			}else{
				return false;
			}
		}
		public static function user_followers($uname){
			global $database;
			$uname = $database->escape_string($uname);
			$sql = "INSERT INTO `followers`(`uname`, `followers`, `following`) VALUES ('{$uname}',0,0)";
			$result = $database->query($sql);
		}
		public static function show_followers(){		//#followers count
			global $database;
			$my_username = self::my_username();
			$sql = "SELECT * FROM `followers` WHERE uname = '{$my_username}'";
			$result = $database->query($sql);
			if ($result) {
				return $result;
			}else{
				return false;
			}
		}
		public static function show_following(){		//#following count
			global $database;
			$my_username = self::my_username();
			$sql = "SELECT * FROM `following` WHERE uname = '{$my_username}'";
			$result = $database->query($sql);
			if ($result) {
				return $result;
			}else{
				return false;
			}
		}
		public static function my_username(){
			global $database;
			$session_id = $_SESSION['uid'];
			$sql = "SELECT uname FROM users WHERE id='$session_id'";
			$result = $database->query($sql);
			if (mysqli_num_rows($result) == 1) {
			$data = mysqli_fetch_assoc($result);
				return $data['uname'];
			}
		}
		public static function users_list(){
			global $database;
			$sql = "SELECT * FROM `users`";
			$result = $database->query($sql);
			if (mysqli_num_rows($result) > 0) {
				return $result;
			}else{
				return false;
			}
		}
		public static function upload_image($imagename, $imagetmp){
			global $database;
			$imagename = $imagename;
			$imagetmp = $imagetmp;
			$uname = self::my_username();
			move_uploaded_file($imagetmp, "images/$imagename");
			$sql = "INSERT INTO `user_images`(`image_name`, `uname`)
			 VALUES ('{$imagename}','{$uname}')";
			$database->query($sql);
		}
		public static function fetch_images(){
			global $database;
			$uname = self::my_username();
			$sql = "SELECT * FROM `user_images` WHERE uname = '{$uname}'";
			$result = $database->query($sql);
			if ($result) {
				return $result;
			}else{
				return false;
			}
		}
		public static function fetch_images_for_users($uname){
			global $database;
			$uname = $uname;
			$sql = "SELECT * FROM `user_images` WHERE uname = '{$uname}'";
			$result = $database->query($sql);
			if ($result) {
				return $result;
			}else{
				return false;
			}
		}
		public static function delete_image($path,$image_name){
			global $database;
			$path = $path;
			$image_name = $image_name;
			$sql = "DELETE FROM `user_images` WHERE image_name = '{$image_name}'";
			$database->query($sql);
			unlink($path);
		}
		public static function followers_name($following){
			global $database;
			$following = $database->escape_string($following);
			$follower = self::my_username();
			$sql = "INSERT INTO `followers_name`(`uname`, `followers`) VALUES ('{$following}','{$follower}')";
			$result = $database->query($sql);
			$sql2 = "INSERT INTO `following_name`(`uname`, `following`) VALUES ('{$follower}','{$following}')";
			$result2 = $database->query($sql2);
			$sql3 = "UPDATE `followers` SET followers=followers+1 WHERE `uname`='{$following}'";
			$result3 = $database->query($sql3);
			$sql4 = "UPDATE `following` SET following=following+1 WHERE `uname`='{$follower}'";
			$result4 = $database->query($sql4);
			if ($result && $result2 && $result3 && $result4) {
				echo "success";
			}else{
				echo "failure";
			}
		}
		public static function followers_list(){
			global $database;
			$uname = self::my_username();
			$sql = "SELECT * FROM `followers_name` WHERE uname = '{$uname}'";
			$result = $database->query($sql);
			if (mysqli_num_rows($result) >=1) {
				return $result;
			}else{
				return false;
			}
		}
		public static function following_list(){
			global $database;
			$uname = self::my_username();
			$sql = "SELECT * FROM `following_name` WHERE uname = '{$uname}'";
			$result = $database->query($sql);
			if (mysqli_num_rows($result) >=1) {
				return $result;
			}else{
				return false;
			}
		}
	}

	$users = new Users();
?>