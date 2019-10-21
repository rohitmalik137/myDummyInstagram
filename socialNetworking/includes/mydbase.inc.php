<?php 
require_once "dbcon.inc.php";
class myDBase{
	public $connection;

	function __construct(){
		$this->dbcon_setup();
	}
	public function dbcon_setup(){
		$this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		if ($this->connection->connect_errno) {
			die("Database connection failed" . $this->connection->connect_errno);
		}
	}
	public function query($sql){
		$result = $this->connection->query($sql);
		return $result;
	}
	public function escape_string($string){
		$escaped_string = $this->connection->real_escape_string($string);
		return $escaped_string;
	}
}
$database = new myDBase();
?>